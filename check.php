<?php
	include_once('./connection.php');
	// $check = 1;
//order = [];
                        // echo "<p>".$_COOKIE['order']."</p>";
                        // $order = $_COOKIE['order'].split("", string)
  //                    $order = explode("|", $_COOKIE['order']);
                        // print_r($order);
    //                  $total = 0;
                        //echo "Order Id: ".$order[0],"<br>";
		//		$list = '';
          //            for ($i=1; $i < sizeof($order); $i+=3) { 
            //              $list.= $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2]. "<br>";
              //            $total += $order[$i+2];
                //      }
                        //echo "<br>Your Total: Rs.".$total,"/-<br><br>";
	$nameError ="";
	$emailError ="";
	$addressError ="";
	$phoneError ="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["number"]) || empty($_POST["address"])) {
		$nameError = "All field is required";
	} else {
		session_start();
			mysql_connect("localhost","groun19w_anky","z8X+hMB6HEyp") or die(mysql_error());
			mysql_select_db('checkout');
			$email_id = mysql_real_escape_string($_POST['email']);
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			$add = mysql_real_escape_string($_POST['address']);
			//$add = mysql_real_escape_string($_POST['address']);
			$query_result = mysql_query("INSERT INTO `check` (fullname,phone,email,address) VALUES ('$fname','$ph_id','$email_id','$add')") or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				$_SESSION['phone']  = $ph_id;
				$_SESSION['address'] = $add;
				header('Location: checklogin.php');
				# code...
			}
	//$fname = mysql_real_escape_string($_POST['name']);
// check name only contains letters and whitespace
		
	}
		/*if (empty($_POST["email"])) {
		$emailError = "Email is required";
		} else {
		test_input();
		$email_id = mysql_real_escape_string($_POST['email']);
		// check if e-mail address syntax is valid or not
		}
		if (empty($_POST["number"])) {
		$phoneError = "Number is required";
		} else {
		$ph_id = mysql_real_escape_string($_POST['number']);
		// check address syntax is valid or not(this regular expression also allows dashes in the URL)
		}
		if (empty($_POST["address"])) {
		$addressError = "Address is required";
		} else {
		$address = test_input($_POST["address"]);
		}*/
	}
	//if(isset($_POST['email'])) {
			//header('Location: i.php');
	/*function test_function(){
			session_start();
			mysql_connect(HOST,DB_USER) or die(mysql_error());
			mysql_select_db('checkout');
			$email_id = mysql_real_escape_string($_POST['email']);
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			//$add = mysql_real_escape_string($_POST['address']);
			$query_result = mysql_query("INSERT INTO `check` (fullname,phone,email) VALUES ('$fname','$ph_id','$email_id')") or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				header('Location: checklogin.php');
				# code...
			} 
			}/* else {
				$error = 1;
			}
			 else {
		$_SESSION['temp_email'] = "";
		$error = 0;
	}*/
 ?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Delhi Base | Checkout</title>
	 
  	
    <link href="menu_css/stylesheet.css" rel="stylesheet" />
    <link href="menu_css/style_menu.css" rel="stylesheet" />
	<link href="menu_css/style_css.css" rel="stylesheet" />
	<script type="text/javascript" src="menu/jquery.cookie.js"></script>
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

<body>
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
						 <a class="navbar-brand" href="index.html" style="font-family:monospace;"><img src="images/rest_logo.png" style="width:30px; height:30px; display:inline-block;style="font-weight:bold;">&nbsp;&nbsp;<span style="font-size:22px;">D</span>ELHI&nbsp;<span style="font-size:22px;">B</span>ASE</a><li style="display:inline-block;" ><a href="#210" ><i  class="fa fa-shopping-cart" id="valueheader" style="float:right;font-size:30px;margin-top:10px;"> <?php
                        			$order = [];
                        			
                      				 $order = explode("|", $_COOKIE['order']);
                        			
                        			$total = 0;
                        			
                        			for ($i=1; $i < sizeof($order); $i+=3) { 
                            		
                            			$total += $order[$i+2];
                        			}
									$total +=10;
									
                        			echo "Rs.".$total,"/-";
                    				?></i></a></li>
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

    <div class="main">
        <div class="container">
		
		
            <!-- <center> -->
           

            <!-- <i class="fa fa-inr fa-2x"></i> -->
            <div class="customer-details pull-left">
                <div class="register">
                    <a href="menu.html"> <b></b></a>
                    <br>
                    <br>
                    <p></p>
                    
                    <section class="col-md-9"></br></br><p align="center" style="font-family:monospace;font-size:28.5px;color:#000;font-weight:bold;">CHECKOUT DETAILS</p>
					<!--form method="POST" action="check1()"-->
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="register-top-grid">
                            <div>
                                <span style="font-size:20px;color:#fff;">Name<label >*</label></span>
                                <input type="text" name="name" autofocus value=>
                                <!--span class="error"><?php echo $nameError;?></span-->
                            </div>
                            <div>
                                <span style="font-size:20px;color:#fff;">Mobile Number<label>*</label></span>
                                <input type="text" name="number" >
                                <!--span class="error"><?php echo $phoneError;?></span-->
                            </div>
                            <div>
                                <span style="font-size:20px;color:#fff;">Email Address<label>*</label></span>
                                <input type="text" name="email">
                                <!--span class="error"><?php echo $emailError;?></span-->
                            </div>
                            
				<div  class="addres">
						<span style="font-size:20px;color:#fff;">Address<label>*</label></span>
						<!--span class="error"><?php echo $addressError;?></span-->
                            </div>
                            
                        
                        <textarea name="address" rows="4" cols="35"></textarea>
                        <br>
                        <span class="error"><?php echo $nameError;?></span>
                        <input type="radio" selected >
                        <label style="font-size:20px;color:#fff;">Cash on Delivery</label>
                        <br>
                        <input type="radio" disabled>
                        <label style="font-size:20px;color:#fff;">Online Payement(Coming Soon..)</label>
                        <br>
                        <br>
                        <!--?php if ($error == 1) {
						echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please check if you have entered same password in both the fields</div>';
						} 
					 ?-->
                    		<input class="btn btn-primary" name="Place Order" type="submit" value="submit">
							
                    </form></br></br></br></br></br>
                    </section>

                    <section class="col-md-3">	<section id="210"></section>
                        <!-- n fdhnfg -->
                        <div class="sidebar Orderlist" id="Orderlist">
                            <!-- hidden-xs hidden-sm -->
                            <div class="text-center shopping-cart   sh-cart" style="width:325px;height:400px">
                                <div class="cart-header1"><b>Review Order</b></div>
								<style>
								.cart-header1{
									    /* border-bottom: 1px solid #E45224; */
											color: #fff;
											/* color: #fff; */
											padding: 8px;
											font-family: "Segoe UI", sans-serif;
											font-size: 18px;
											margin-top: -135px;
											/* color: #DF5731; */
											/* opacity: .9; */
											/* color: #423225; */
											background: #333;
											opacity: 1;
											font-weight: 600;
										}	
								</style>
                                <section class="cart">
                                    <div class="cart-heading">
                                        <h1><b>Cart</b></h1>
                                    </div>
                                    <div style="color:#fff" class="cart-items">
                                    <?php
                        			$order = [];
                        			// echo "<p>".$_COOKIE['order']."</p>";
                      				  // $order = $_COOKIE['order'].split("", string)
                      				 $order = explode("|", $_COOKIE['order']);
                        			// print_r($order);
                        			$total = 0;
                        			echo "Order Id: ".$order[0],"<br>";
                        			for ($i=1; $i < sizeof($order); $i+=3) { 
                            		echo $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2], "<br>";
                            			$total += $order[$i+2];
                        			}
									$total +=10;
									//echo "Delivery Charges: Rs.10/-"
                        			echo "<br>Your Total: Rs.".$total,"/-<br><br>";
                    				?>
                                    </div><br>
									<div  class="cart-total">
									<p  id="value" style="margin-top:-50px;font-size:17px;">Delivery Charges: Rs 10/-</p></br></br></br><br>
									</div>
                                </section>
                    </section>
                    	

                    </div>
                </div>
                <!-- </center> -->
            </div>
        </div>
    </div>
    </div>
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