<html>
    <head>
        <title>Register</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="<?php echo base_url();?>style/loginstyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container container-body">
            <div id="form_login" align="center">
                <form action="<?php echo base_url();?>Login/register_insert" method="post">
                        <h2 style="text-decoration:underline;">Register</h2>
                        <span class="text-danger"><?php if($this->session->flashdata('error')){
                            echo $this->session->flashdata('error');
                        } ?>
                        </span><br>
                        <input type="email" id="email" placeholder="Email" name="email"><br>
                        <input type="text" id="username" placeholder="Username" name="username"><br>
                        <input type="password" id="password" placeholder="Password" name="password"><br>
                        <input type="password" id="confirm_password" placeholder="Confirm Password" name="confirm_password"><br>
                        <input type="submit" value="Register" style="margin-bottom:10px;"><br>
                        <a href="<?php echo base_url();?>" >already a user</a>
                </form>
            </div>
        </div>
    </body>
</html>