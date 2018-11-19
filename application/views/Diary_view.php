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
    <?php 
    if($details){
        foreach($details as $d){
            echo '<h1>'.$d->today_date.'</h1>';?>
            <div class="row">
                <div class="col-sm-9">
                    <?php echo '<textarea id="myTextarea" rows="20" cols="100" style="width:100%;" readonly name="this_day">'.$d->data.'</textarea>';?>
                </div>
                <div class="col-sm-3">
                    <div id="image_div">
                    <?php $base=base_url()."images"; echo '<img id="uploaded_image" src="'.$base.'/'.$d->image.'" alt="Image Not Found"/>';
        }
    }
    else{
        echo '<h1>Your Diary List</h1>';
        echo 'Empty';}?>
                </div>
            </div>
        </div>
</div>
</body>
</html> 
