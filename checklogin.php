<?php
	include_once('./connection.php');
	session_start();
	// $check = 1;
	$nameError ="";
	$emailError ="";
	$adressError ="";
	$phoneError ="";
	if(isset($_POST['email'])) {
			//header('Location: i.php');
			//session_start();
			mysql_connect("localhost","groun19w_anky","z8X+hMB6HEyp") or die(mysql_error());
			mysql_select_db('ground19w_checkout');
			$email_id = mysql_real_escape_string($_POST['email']);
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			$add = mysql_real_escape_string($_POST['address']);
			//$add = mysql_real_escape_string($_POST['address']);
			$query = "INSERT INTO `check` (fullname,phone,email,address) VALUES ('$fname','$ph_id','$email_id','$add')";
			$query_result = mysql_query($query) or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				$_SESSION['phone']  = $ph_id;
				$_SESSION['address'] = $add;
				
				header('Location: checklogin.php');
				# code...
			} else {
				$error = 1;
			}
			} else {
		$_SESSION['temp_email'] = "";
		$error = 0;
	}
	/*$headers = "From:  noreply@gmail.com" . "\r\n" .
	$body= "Email: ".$_SESSION['email']."Full name: ".$_SESSION['fname']."Phone: ".$_SESSION['phone'];
    //mail($to,"Text mail","Test message",$from);
	if(mail($to,"Text mail","Test message",$from)) {
	echo "Your message is sent";
	}else {
	echo "Fail";
	}*/
require('./PHPMailer/PHPMailerAutoload.php');
$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';
$order = [];
                        // echo "<p>".$_COOKIE['order']."</p>";
                        // $order = $_COOKIE['order'].split("", string)
                        $order = explode("|", $_COOKIE['order']);
                        // print_r($order);	
                        $total = 0;
                        //echo "Order Id: ".$order[0],"<br>";
						$list ='';
                        for ($i=1; $i < sizeof($order); $i+=3) { 
                           $list .= $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2]. "<br>";
                            $total += $order[$i+2];
                        }
                        //echo "<br>Your Total: Rs.".$total,"/-<br><br>";

$body =	"Email: " .$_SESSION['email']."<br>"."Full name: ".$_SESSION['name']."<br>"."Phone: ".$_SESSION['phone']."<br>"."Address: ".$_SESSION['address']."<br>"."Order Id: ".$order[0]."<br>"."Order: ".$list."<br>"."Total: Rs.".$total;;
		 

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';

$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 3;
$mail->Debugoutput = 'html';
$mail->SMTPAuth   = true;

$mail->Username   = "delhibasefc@gmail.com";
$mail->Password   = "khanaachahai";
$name = '';
$mail->SetFrom('me.delhibasefc@gmail.com', $name);
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
$mail->Subject    = 'subject';
$mail->MsgHTML($body);

$mail->AddAddress('www.maindhrasingh@gmail.com', 'Order');
$mail->AddAddress('', '');
$fileName = '';
$mail->AddAttachment($fileName);
$mail->send();
	
	
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Delhi Base</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style>
	body{
			background-image:url('images/bck.jpg') ;
			-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
			
		background-size: 100% auto;
		
		
		
		}
		@media only screen and (min-width: 100px) {
    body { 
       background-image: url('images/bck2.jpg'); 
    }
}
</style>

	
</head>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-nav">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						 <a class="navbar-brand" href="index.html" style="font-family:monospace;"><img src="images/rest_logo.png" style="width:30px; height:30px; display:inline-block;style="font-weight:bold;">&nbsp;&nbsp;<span style="font-size:22px;">D</span>ELHI&nbsp;<span style="font-size:22px;">B</span>ASE</a>
					    <!--a class="navbar-brand" href="index.html"><i class="glyphicon glyphicon-cutlery" aria-hidden="true"></i><span>P</span>asta</a-->
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom"><a href="locate_us.html">LOCATE US</a></li>
							<li class="hvr-bounce-to-bottom"><a href="contact_us.html">CONTACT US</a></li>
							<li class="hvr-bounce-to-bottom"><a href="terms_cond.html">TERMS & CONDITIONS</a></li>
							
						</ul>
					</div><!-- /navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
<!-- //header -->
<body>
  <div class="container-fluid">
<div class="main">
<div class="row" >
<div class="col-sm-3" ></div>
<div class="col-sm-9" style="float:center;"> 
<div  ><h1 style="font-family:monospace;font:40px;">IF YOU ARE VIEWING THIS PAGE </br></br>YOUR ORDER HAS BEEN PLACED</h1>
</div></div>

</div></div></div>

	
	
	 <footer>
<nav class="navbar navbar-inverse navbar-fixed-bottom">

  <div class="container-fluid">
   
    <br>
     <li><a style="font-family:monospace;float:right;color:#9d9d9d;">&copy;&nbsp;DELHI BASE | <p style="font-family:monospace;display:inline-block;">Design by Ankit Guddewala & Shivam Singh</p></a></li>
     
	 
   
  </div>
</nav>
</footer>
	 
</body>
</html>