<div id="subsmsg"> </div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 ">
<!--            --><?php //print_r($users )?>
            <div class="card bg-custom-1 mt">
                <h3 class="card-header">Register User</h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <?php echo form_open_multipart('admin/add_user',array('id'=>'frm')) ?>
                            <input type="hidden" class="form-control" id="id"   name="id">
                            <div class="form-group">
                                <label for="user">User Name</label>
                                <input  type="text" class="form-control" id="user"  placeholder="Enter User Name" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" onkeyup="chk_email(this.value)" class="form-control" id="email"  placeholder="Enter email" name="email" required>
                                <span id="emailmsg"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" onkeyup="validatepass()" class="form-control" id="password" name="password" placeholder="Password" >
                            </div>
                            <div class="form-group">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" onkeyup="validatepass()" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                 <span id="valmsg"></span>

                            </div>
                            <div class="form-group">
                                <img id="user_image" src=""  alt="your image"/>
                                <input type="file"  name="image" size="20" id="inputFile"/><br>

                            </div>

                            <button disabled="true" id="submit" type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-8">
        <table class="table table-dark">
            <thead>
            <tr>
                <th>Sn</th>
                <th>Image</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $sn=0; foreach ($users as $user){ ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><img style="width: 100px;" src="<?php echo base_url()."uploads/".$user['image']; ?>"></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>

                    <button  class="btn btn-primary" onclick="edit(<?php echo $user['id']; ?>)">Edit</button>
                    <button class="btn btn-danger" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                </td>

            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>


</div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#user_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });
</script>
<script>
    $("input").blur(function () {
        var username=$('#user').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        var ivalidPass = $('#valmsg').text();
        var invalidEmail = $('#emailmsg').text();
        if((!username || !email || !password || !cpassword) || ivalidPass || invalidEmail){
            $('#submit').attr('disabled','true');
        }else{
            $('#submit').removeAttr("disabled");
        }
    });
    // =========================================== Delate  Form ========================================
      function deleteUser(id) {

         var ans= confirm('Are you sure');
         if(ans){
             $.ajax({
                 url: '<?php echo base_url()?>index.php/admin/delete',
                 type: "POST",
                 datatype: "json",
                 data: {id:id},
                 success: function (msg) {

                     $('#subsmsg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> "+msg+"<div>");
                     loadview('user')
                 }
             });
         }

      }
    // =========================================== Validate  Form ========================================
    function validatepass(){
       var password = $('#password').val();
       var cpassword = $('#cpassword').val();
       if(cpassword && (password !== cpassword)){
           $('#valmsg').html(' password does not match');
        }else {
           $('#valmsg').html('');
       }
    }
//    =========================================== Edit Form ========================================
    function chk_email(email){

        $.ajax({
            url: '<?php echo base_url()?>index.php/admin/chk_email',
            type: "POST",
            datatype: "json",
            data: {email:email},
            success: function (msg) {
                $('#emailmsg').html(msg);
            }
        });

    }
      function edit(id){

          $.ajax({
              url: '<?php echo base_url()?>index.php/admin/edit',
              type: "POST",
              datatype: "json",
              data: {id:id},
              success: function (msg) {
                  msg = JSON.parse( msg )
                  $('#id').val( msg['id']);
                  $('#user').val( msg['username']);
                  $('#email').val( msg['email']);

              }
          });

      }
//    =========================================== Submit Form ========================================
    $(document).ready(function(e){

        $("#frm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>index.php/admin/add_user',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){
                    // alert(msg)
                    if(msg=='ok'){
                        $('#subsmsg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Added Successfully<div>");
                       loadview('user')
                    }else{
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Unable to Add <div>");

                    }
                },
                error: function(){
                    $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Something went wrong <span style='color: red'> Try again</span><div>");
                },

            });
        });
    });
</script>