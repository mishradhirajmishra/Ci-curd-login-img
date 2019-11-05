<?php include "header.php"?>
    <link rel="stylesheet" href="<?php echo  base_url()?>assets/theme/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo  base_url()?>assets/theme/jquery.js"></script>
<style>
    .alert{
        width: 300px;
        position: absolute;
        right: 20px;
        top: 75px;
    }
</style>
    <body>
    <?php include "sidebar.php"?>
    <main class="content-wrapper">
        <div class="container-fluid" id="main_container">
       <?php $msg= $this->session->flashdata('item');
        if($msg){
            ?>
            <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>  <?php echo $msg ?><div>
            <?php
        }
       ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <span>Coded by <a href="https://si-dev.com/ru">Dhiraj</a>, 2019</span>
            </div>
        </div>
    </footer>
    </body>
<script>
    function  loadview(page) {
        var url='<?php echo base_url() ?>index.php/admin/'+page;
        $("#main_container").load(url);
    }
    loadview('user')
</script>
<?php include "footer.php"?>