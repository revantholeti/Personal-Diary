<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>style/profilestyle.css">
<link rel="stylesheet" href="<?php echo base_url();?>style/navstyle.css">
</head>
<body style="height:100%;">

<?php include("nav.php"); ?>

<div class="main">
    <div id="background"></div>
    <div id="image_div">
        <?php foreach($details as $d){
             $base=base_url()."images"; echo '<img id="profile_pic" src="'.$base.'/'.$d->profileimage.'" alt="Image Not Found" name="profile_pic"/>';
        ?>
    </div>
    <div id="username">
        <label id="username_label">Username:</label><span id="username_display"><?php echo $d->username;?><span>
    </div>
    <div id="username">
        <label id="count_label">Number of Entries:</label><span id="username_display"><?php foreach($total as $t){echo $t->total;}?><span>
    </div>
    <div id="quote">
        <label id="quote_label">Quote:</label>
        <div id="quote_data">
            <p><?php echo $d->quote;}?>
            </p>
        </div>
    </div>
</div>
    

</body>
</html>