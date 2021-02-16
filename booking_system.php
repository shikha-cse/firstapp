<?php
$msg="";
// $room_type=$_GET['id'];
include("include/settings.php");
// include("check_session.php");
if(isset($_POST['bookbtn']))
{
		if(($_POST["txtUsername"]!=null)&& ($_POST["txtEmail"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtBooking_Date"]!=null)&& ($_POST["txtNumber_Of_Guest"]!=null)&& ($_POST["txtMeal"]!=null)&& ($_POST["txtBalcony"]!=null))

			{

	
				//	echo $id;
					$sql=$mysqli->prepare("insert  into booking (Username,Email,Phone,Booking_Date,Number_Of_Guest,Meal,Balcony,type)values(?,?,?,?,?,?,?,?)");
					$sql->bind_param("ssssssss",$_POST["txtUsername"],$_POST["txtEmail"],$_POST["txtPhone"],$_POST["txtBooking_Date"],$_POST["txtNumber_Of_Guest"],$_POST["txtMeal"],$_POST["txtBalcony"],$_GET['id']);
					$sql->execute();
					$sql->close();
					$msg="Record inserted Successfully";
					header('location:payment.php');
				}
				else
				{
					$msg="fields should be kept filled";
				}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> hotel booking form</title>
	<style type="text/css" media="screen">
	body{
		margin:0;
		padding:0;
		background:url(img/aa9.jpg);
		background-size:cover;
	}
</style>
</head>
<body>
	<div class="HOTEL BOOKING-FORM">
		
	<form action="" method="POST">
		 <!-- <fieldset> --> -->
			<h1 style="color:black;font-size:40px;">HOTEL BOOKING-FORM FOR <?php echo $_GET['id']; ?> SUITE</h1></div>
			 <fieldset> 
			<legend style="color:black;font-size:20px;"align="center"><b> Personal Details:</b></legend>
			<label for="name"><b>Name:</b></label><input type="text" name="txtUsername" id="name" required autofocus placeholder="your username"title="please enter in more than three letters">&nbsp;&nbsp;&nbsp;
			<label for="email"><b>Email:</b></label><input type="text" name="txtEmail" id="email" required autofocus placeholder="your email"  title="please enter in valid email address">&nbsp;&nbsp;&nbsp;
			<label for="phone"><b>Phone:</b></label><input type="tel" name="txtPhone" id="phone" required placeholder="please enter in your phone number">
      
			
		</fieldset>
		<br>
		<fieldset>
			<legend style="color:black;font-size:20px;"align="center"><b> Booking Details:</b></legend>
			<label for="date"><b> Booking Date:</b></label><input id="date" type="date" name="txtBooking_Date" min="2013-12-02">&nbsp;&nbsp;&nbsp;
			<label for="number of guests"><b>Number Of Guests:</b> </label><input id="number of guests"type="number" name="txtNumber_Of_Guest" min="1" max="6">
			<p> <b>Do you require meals?</b></p>
			<label for="yes meals"><b>YES:</b></label><input id="yes meals" type="radio" name="txtMeal" value="yes meals">
			<label for="no meals"><b>NO:</b></label><input id="no meals" type="radio" name="txtMeal" value="no meals">
              <br>
             <label for="balcony"><b>Do you require a balcony?</b></label> <input id="balcony" type="checkbox" name="txtBalcony" value="yes" checked>
              <br>
              <button class="btn btn-default" name="bookbtn" type="submit"><b>SUBMIT</b></button>
              <!-- <button class="btn btn-default" name="paymentbtn" type="payment"><a href="payment.html" name="lnkPayment"></a><b>PAYMENT</b></button> -->
		</fieldset>
	</form>

</body>
</html>