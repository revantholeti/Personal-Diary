<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>style/homestyle.css">
<link rel="stylesheet" href="<?php echo base_url();?>style/navstyle.css">
</head>
<body style="height:100%;">

<?php include("nav.php"); ?>

<div class="main">
  <h1>Your Dairy</h1>
  <div id="show_diary">
    <ul>
      <?php 
        $base=base_url().'Home/display/';
        if($data){
          foreach($data as $d){
            echo '<a href="'.$base.''.$d->today_date.'"><li>'.$d->today_date.'</li></a>';
          
          }
        }
        else{
          echo '<a href=""><li>Empty</li></a>';
        }
      ?>
    </ul>
  </div>
</div>

</body>
</html> 
