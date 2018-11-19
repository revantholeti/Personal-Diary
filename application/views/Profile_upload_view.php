<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>style/profileuploadstyle.css">
<link rel="stylesheet" href="<?php echo base_url();?>style/navstyle.css">
</head>
<body>

<?php include("nav.php"); ?>


<div class="main">
  <h1>Update Your Profile</h1>
  <form action="<?php echo base_url();?>Home/upload_profile" method="post" enctype="multipart/form-data">
    <div class="row" id="row_id">
      <div id="image_div" class="col-sm-4">
        <img id="uploaded_image" src="#" alt="Profile image" style="width:10px"/>
      </div>
      <div id="quote_and_textarea" class="col-sm-8">
        <label>Quote</label><br> <textarea name="quote" id="quote" cols="100" rows="10"></textarea>
      </div>
    </div>
    <div id="second">
    <div class="row">
      <div id="image_file_button" class="col-sm-4">
          <input type="file" id="image_file" name="userfile" onchange="readURL(this);">
      </div>
      <div class="col-sm-5"><p style="text-decoration:none;color:red;font-size:15px;text-align:right;">(Insert image and Type quote to save the changes)</p></div>
      <div id="submit_div" class="col-sm-3" >
        <input type="submit" value="SAVE">
      </div>
    </div>
</div>
  </form>
  <span class="text-danger"><?php if($this->session->flashdata('error')){
      echo $this->session->flashdata('error');
  } ?></span><br>
  <hr style="margin-top:0px;">

  <div id="settings">
  
    <div class="row">
        <div class="col-sm-6" id="left">
            <label>Change Username</label><br>
            <form action="<?php echo base_url();?>Home/changeusername" method="post">
              <input type="text" placeholder="New Username" id="new_username" name="new_username"><br>
              <input type="text" placeholder="Confirm New Username" id="confirm_new_username" name="confirm_new_username"><br>
              <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-sm-6" id="right">
            <label>Change Password</label><br>
            <form action="<?php echo base_url();?>Home/changepassword" method="post">
              <input type="text" placeholder="New Password" id="new_password" name="new_password"><br>
              <input type="text" placeholder="Confirm New Password" id="confirm_new_password" name="confirm_new_password"><br>
              <input type="submit" value="Submit">
            </form>
        </div>
    </div>
  </div>
</div>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploaded_image')
                .attr('src', e.target.result)
                .width(290)
                .height(290);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
</body>
</html> 
