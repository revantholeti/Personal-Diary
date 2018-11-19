<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>style/homestyle.css">
<link rel="stylesheet" href="<?php echo base_url();?>style/navstyle.css">
</head>
<body style="height:100%;">

<?php include("nav.php"); ?>


<div class="main">
  <h1>New Day</h1><br>
  <span>(only one time in a day is accepted)<span>
  <form action="<?php echo base_url();?>Home/newdiary" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-9">
        <textarea id="myTextarea" rows="20" cols="100" style="width:100%;" name="this_day"></textarea>
      </div>
      <div class="col-sm-3">
        <div id="date">
          <label id="date_label">Date:</label><input type="date" id="present_date" name="present_date">
        </div>
        <div id="image_file_button">
          <input type="file" id="image_file" name="userfile" onchange="readURL(this);">
        </div>
        <div id="image_div">
          <img id="uploaded_image" src="#" alt="your image"/>
        </div>
        <div id="submit_div">
          <input type="submit" value="SAVE">
        </div>
      </div>
    </div>
  </form>
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
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("present_date").setAttribute("min", today);
</script>
</body>
</html> 
