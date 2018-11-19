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
                <form action="<?php echo base_url();?>Login/verify" method="post">
                        <h2>Forget password</h2>
                        <span class="text-danger"><?php if($this->session->flashdata('error')){
                            echo $this->session->flashdata('error');
                        } ?></span><br>
                         <input type="email" id="email" placeholder="Registered Email" name="email"><br>
                        <input type="text" id="text" placeholder="Code sent to your mail" name="code"><br>
                        <input type="submit" value="verify">
                </form>
            </div>
        </div>
    </body>
</html>