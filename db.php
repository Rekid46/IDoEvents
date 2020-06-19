<!DOCTYPE html>
<html lang="zxx">
<head>
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&display=swap" rel="stylesheet">

   
    <link rel="stylesheet" href="css/fog.css" type="text/css" media="all" />
    

  
    <link rel="stylesheet" href="css/fontAwesome.css" type="text/css" media="all" />
    
</head>

<body>
    

        <div class="page">
            <div class="content">
                <div class="logo">
                    <a class="brand-logo" href="thank.html"></a>
                    <!-- if logo is image enable this   
                <a class="brand-logo" href="#index.html">
                    <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                </a> 
            -->
                </div>
                <div class="w3l-error-grid">
                    <h1>Thank You</h1>
                    <h2>For Showing Interst In Us</h2>

                    <a href="index.html" class="home">Back to Home</a>
                </div>

                
            </div>
            <img src="images/fog.jpg" class="img-responsive" alt="error image" />
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            var lFollowX = 0,
                lFollowY = 0,
                x = 0,
                y = 0,
                friction = 1 / 30;

            function animate() {
                x += (lFollowX - x) * friction;
                y += (lFollowY - y) * friction;

                translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

                $('img').css({
                    '-webit-transform': translate,
                    '-moz-transform': translate,
                    'transform': translate
                });

                window.requestAnimationFrame(animate);
            }

            $(window).on('mousemove click', function (e) {

                var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
                var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
                lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
                lFollowY = (10 * lMouseY) / 100;

            });

            animate();
        </script>
    </div>


<?php

$host="localhost";
$user="root";
$password="hillside123";
$con=mysqli_connect($host,$user,$password);
$dbname=mysqli_select_db($con,"idoevents");
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$fname ="";
$lname ="";
$email="";
$mob="";
$msg="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mob=$_POST['mob'];
    $msg=$_POST['msg'];
}
function filterName($fname){
  $a=$fname;
  if($a[0]==strtolower($a[0])){
      $a[0]=strtoupper($a[0]);
      $fname=$a;
      return $fname;
  }else{
    return $fname;
  }
}
function filterName2($lname){
  $a=$lname;
  if($a[0]==strtolower($a[0])){
      $a[0]=strtoupper($a[0]);
      $lname=$a;
      return $lname;
  }else{
    return $lname;
  }
}




$sql="insert into contact(fname,lname,email,mob,msg) values ('$fname','$lname','$email','$mob','$msg')";
if(mysqli_query($con, $sql)){
    echo "Successfully Got Your data";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


 ?>
</body>
</html>
