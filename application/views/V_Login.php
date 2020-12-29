<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href=<?php echo base_url('/assets/img/favico.png') ?>>
    <link rel="stylesheet" type="text/css" href=<?php echo base_url('/assets/css/bootstrap.css') ?>>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/popper.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.js') ?>"></script>
</head>
<body>

    <div class="jumbotron d-flex align-items-center justify-content-center">
        <img src="<?php echo base_url('/assets/img/informatika.png') ?>" class="mr-3" width="100px" alt="">
        <div>
            <h3>AKREDITASI</h3>
            <h3>PROGRAM STUDI</h3>
            <h3>TEKNIK INFORMATIKA</h3>
        </div>
    </div>

    <div class="container text-center">
    <h2>LOGIN</h2>
        <div class="p-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md">
                <?php echo form_open('C_Login/login'); ?>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="mb-2">
                        <input type="checkbox" name="" id="pass-check" onChange="seePass()">
                        <label for="pass-check" class="ml-1">Lihat Kata Sandi</label>
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                </form>
            </div>

            <div class="col-md-3"></div>
        </div>
            <p class="text-danger"><?php echo $this->session->flashdata('error'); ?></p>
        </div>
    </div>
    
</body>

<script defer>
    function seePass(){
        var x = document.getElementById('password');
        x.type === "password" ? x.type = "text" : x.type = "password";
    }
</script>
</html>