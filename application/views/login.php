<?php include "header.php"?>
<style>
    .bg-custom {
        background: linear-gradient(to right, #3848A2, #007bff, #039BE6, #028BCF, #3F51B5);
    }

    .bg-custom-1 {
        background: linear-gradient(to right,  #007bff, #039BE6, #028BCF);
    }
    .mt{
        margin-top: 30%;
    }
    .alert {
        width: 300px;
        position: absolute;
        right: 20px;
        top: 20px;
    }

</style>
    <body class="bg-custom text-light">
     <div id="subsmsg"> </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="card bg-custom-1 mt">
                    <h3 class="card-header">Sign In</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <?php echo form_open('login/login',array('id'=>'frm')) ?>
                                    <div class="form-group">
                                        <label for="Email1">Email address</label>
                                        <input type="email" class="form-control" id="Email1"  placeholder="Enter email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>
    <script>
        $(document).ready(function(e){

            $("#frm").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>index.php/login/login',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(msg){
                        if(msg=='ok'){
                            $('#subsmsg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Login Successfully<div>");
                            location.replace("http://localhost/testci/admin");
                        }else{
                            $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Wrong Email or password<div>");

                        }
                    },
                    error: function(){
                        $('#subsmsg').html("<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Something went wrong <span style='color: red'> Try again</span><div>");
                    },

                });
            });
        });
    </script>
<?php include "footer.php"?>