<html>
    <head>
        <link rel="shortcut icon" href="<?php echo base_url('images/icon.jpg');?>" />
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="<?php echo base_url();?>style/loginstyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container container-body">
            <div id="form_login" align="center">
                <form action="<?php echo base_url();?>Login/login" method="post">
                        <h2>LOGIN</h2>
                        <span class="text-danger"><?php if($this->session->flashdata('error')){
                            echo $this->session->flashdata('error');
                        } ?></span><br>
                        <input type="text" id="username" placeholder="Username" name="username"><br>
                        <input type="password" id="password" placeholder="Password" name="password"><br>
                        <button type="button" class="btn"><a href="<?php echo base_url();?>Login/register">Regsiter</a></button> <input type="submit" value="Login"><br>
                        <div style="margin-top:20px;text-decoration:underline;"><a href="<?php echo base_url();?>Login/forget_page" >forget password</a></div>
                </form>
            </div>
        </div>
    </body>
</html>