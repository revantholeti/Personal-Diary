<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>style/aboutstyle.css">
<link rel="stylesheet" href="<?php echo base_url();?>style/navstyle.css">
</head>
<body style="height:100%;">

    <?php include("nav.php"); ?>

    <div class="main">

    </div>
    <div class="bg-text">
        <div class="row">
            <div class="col-sm-4">
                <img src="<?php echo base_url('images/rev.jpg');?>">
                <br>
                <div id="phone_contact"><i class="fa fa-mobile fa-2x" aria-hidden="true"></i><label id="num">8056101266</label></div>
                <div id="email_contact"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></i><label id="email">oletirevanth.6@gmail.com</label></div>
            </div>
            <div class="col-sm-8">
                <h1>contact me</h1><br>
                <form action="<?php echo base_url();?>Home/send_mail" method="post">
                    <span class="text-danger"><?php if($this->session->flashdata('error')){
                        echo $this->session->flashdata('error');
                    } ?></span><br>
                    <input type="email" placeholder="Email" name="email" requied><br>
                    <textarea id="quote" cols="50" rows="3" name="content" required></textarea><br>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>

</body>
</html>