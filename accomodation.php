<?php
$msg="";
include("include/settings.php");
// include("check_session.php");
if(isset($_POST['BOOKbtn']))
{	
	if(($_POST["txtName"]!=null)&& ($_POST["txtEmail"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtBooking_Date"]!=null)&& ($_POST["txtNumber_Of_Guest"]!=null)&& ($_POST["txtMeal"]!=null)&& ($_POST["txtBalcony"]!=null))
	{

	
				//	echo $id;
					$sql=$mysqli->prepare("insert into booking(Username,Email,Phone,Booking_Date,Number_Of_Guest,Meal,Balcony)values(?,?,?,?,?,?,?)");
					$sql->bind_param("sssssss",$_POST["txtName"],$_POST["txtEmail"],$_POST["txtPhone"],$_POST["txtBooking_Date"],$_POST["txtNumber_Of_Guest"],$_POST["txtMeal"],$_POST["txtBalcony"]);
					$sql->execute();
					$sql->close();
					$msg="Record inserted Successfully";
				}
			else
			{
				$msg="fields should not be empty";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ACCOMODATION</title>
</head>
<style type="text/css">
	.headingimg
	{
		height: 400px;
		width: 90%;
		/*background-image: url(img/bed1.jpg); */
		/*background-repeat: no-repeat;*/
		/*margin-left: 20%;*/
	}
	.headingtxt
	{
		height: 150px;
		width: 90%;
		font-size: 40px;
	}
	.image
	{
		height: 500px;
		width: 80%;
		margin-top: -20px;
	}
	.text
	{
		height: 300px;
		width: 70%;
	}
	.button
	{
		background-color: orange;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
	}
</style>
<body>
	<div class="container" align="center">
		<div class="headingimg">
			 <img  class="headingimg" src="img/accomodation.jpg" > 
			</div>
		<div class="headingtxt">
			<b><i><h1>ACCOMODATION</h1></i></b>
			<a href="offer.html" name="offer">
			<button class="button">OFFER</button></a>
		</div>
		<div class="image">
			<img  class="image" src="img/royal.jpg" ><BR>
			<a href="booking_system.php?id=ROYAL">
			<button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>ROYAL SUITE</h1></i>
			<i><h2>This is a royal suite with a generous entertaining area:<ul>Royal Suite of Mardan Palace contains<br><li>Two Bedroom</li>
				<li>Private Office</li>
				<li>Sea View</li>
				<li>Mountain View</li></ul></h2></i>
				<!-- <h3>This is a palatial suite with a generous entertaining area,two bedroom,private office.Twin terrace overlook the sea with the sun deck on one side and looks across the Mountains on the other side.</h3> -->
		</div>
		<div>
			<img class="image" src="img/PRESIDENTIAL.jpg"><br>
			<a href="booking_system.php?id=PRESIDENTIAL">
			<button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>PRESIDENTIAL SUITE</h1>
			<h2>The Presidential suite is designed to suite defferent style and luxury.Whilst some suites are equipped with a billard and game tables.<br><ul>The Presidential Suite of Mardan Palace consist of:
				<li>Private Bar</li>
				<li>Private Terrace</li>
				<li>Large Dinning Hall</li>
				<!-- <li>Game Tables</li> --></ul></h2></i>
		</div>
		<div class="image">
			<img  class="image" src="img/garden.jpg"><br>
			<a href="booking_system.php?id=GARDEN"><button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>GARDEN SUITE</h1>
			<h2>Our Garden Suite are housed within villa consisting of two floor ,with each floor having two Garden Suite that can be connected. 
				<ul><li>Private Terrace</li>
					<li>Private Garden</li>
					<li>Personal Swimming Pool</li>
					<li>Private Balcony</li>
				</ul></h2></i>
		</div>
		<div class="image">
			<img  class="image" src="img/grand.jpg"><br>
			<a href="booking_system.php?id=GRAND">
			<button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>GRAND DOUBLE DELUX</h1>
			<h2>This luxurious appointed two story suite has its small kitchen and generious enetertaining area.
				<ul><li>Small Kitchen</li>
					<li>Generous Entertaining Area</li>
					<li>Family Environment</li>
					<li>Easy Access To Pool</li>
				</ul></h2></i>
		</div>
		<div class="image">
			<img  class="image" src="img/executive.jpg"><br>
			<a href="booking_system.php?id=EXECUTIVE">
			<button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>EXECUTIVE SUITE</h1>
			<h2>Experience the indulgent life style and sufosticated pleasure of suite situated in Mardan Palace.
				<ul><li>Special Layout Of Room</li>
					<li>Corner Ladies Makeup Area</li>
					<li>Impressing Bathroom</li>
				</ul></h2></i>
		</div>
		<div class="image">
			<img  class="image" src="img/supirior.jpg"><br>
			<a href="booking_system.php?id=SUPERIOR">
			<button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>SUPERIOR ROOM</h1>
			<h2>With sweeping view a large entrance and luxuariosly marble bathroom.
				<ul><li>Sweeping View</li>
					<li>Small Kitchen</li>
					<li>Marble Bathroom</li>
					<li>Seprate Bathtub</li>
				</ul></h2></i>
		</div>
		<div class="image">
			<img  class="image" src="img/premium.jpg"><br>
			<a href="booking_system.php?id=PREMIUM">
			<button class="button">BOOK NOW</button></a>
		</div><br>
		<div class="text">
			<i><h1>PREMIUM ROOM</h1>
			<h2>Our Premium Room consist of two beds,stylish chaise longue and velvety beds
				<ul><li>Two Beds
					<li>Chaise Longue</li>
					<li>Marble Bathtub</li>
					<li>Seprate Rain Shower</li>
				</ul></h2></i>
				<a href="index.html" name="Inkindex">
			<button class="button">BACK</button></a> 
		</div>
	</div>

</body>
</html>