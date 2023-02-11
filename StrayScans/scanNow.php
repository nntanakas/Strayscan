<?php
require 'connection.php';

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $latitude = $_POST["latitude"];
  $longitude = $_POST["longitude"];

  $query = "INSERT INTO tb_data VALUES('', '$name', '$email', '$latitude', '$longitude')";
  mysqli_query($conn, $query);

  echo
  "<script>
  alert('Data Added Successfully');
  document.location.href = 'data.php';
  </script>"
  ;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stray Scans</title>
	 <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
	
	<section class="services" id="services">

    <h1 class="heading"> Scan <span>Now</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-dog"></i>
            <h3>return back to home</h3>
			<h2></h2>
            <a href="index.html" class="btn">Click here -></a>
        </div>

</section>
 </head>
  <style>
#my_camera{
 width: 320px;
 height: 240px;
 border: 1px solid black;
}
</style>
<center><h2>Step 1: Take a picture</h2></center>
<center>
<!-- -->
<div id="my_camera"></div>
<input type=button value="Capture" onClick="take_snapshot()">
 
<div id="results" ></div>
 
<!-- Script -->
<script type="text/javascript" src="webcam.min.js"></script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">

 // Configure a few settings and attach camera
 Webcam.set({
  width: 320,
  height: 240,
  image_format: 'jpeg',
  jpeg_quality: 90
 });
 Webcam.attach( '#my_camera' );

 // preload shutter audio clip
 var shutter = new Audio();
 shutter.autoplay = true;
 shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

function take_snapshot() {
 // play sound effect
 shutter.play();
 
 // take snapshot and get image data
 Webcam.snap( function(data_uri) {
 
  Webcam.upload( data_uri, 'saveimage.php', function(code, text,Name) {
                    document.getElementById('results').innerHTML = 
                    '' + 


 // display results in page
 //document.getElementById('results').innerHTML = 
 '<img src="'+data_uri+'"/>';
    
	
		
	
 } );
  
  
 } );
}

</script>
<br>
<center><h2>Step 2: Submit your info</h2></center>
<br>
  <body onload = "getLocation();">
    <form class="myForm" action="" method="post" autocomplete="off">
      <label for=""><h2>Name</h2></label>
      <input type="text" name="name" required value=""> <br>
      <label for=""><h2>Email</h2></label>
      <input type="email" name="email" required value=""> <br>
      <input type="hidden" name="latitude" value="">
      <input type="hidden" name="longitude" value="">
      <button type="submit" name="submit">Submit</button>
    </form>
    <script>
      function getLocation(){
        if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
      }
      function showPosition(position){
        document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
      }
      function showError(error){
        switch(error.code){
          case error.PERMISSION_DENIED:
          alert("You Must Allow The Request For Geolocation To Fill Out The Form");
          location.reload();
          break;
        }
      }
    </script>
  </body>
<section class="footer">

    <img src="image/top_wave.png" alt="">

    <div class="share">
        <a href="#" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#" class="btn"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#" class="btn"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="credit"> created by <span> Strayscans </span> | all rights reserved! </div>

</section>




















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>