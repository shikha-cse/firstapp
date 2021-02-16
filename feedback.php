<?php
$msg="";
include("include/settings.php");
// include("check_session.php");
if(isset($_POST['FEEDBACKbtn']))
{	
	if(($_POST["txtName"]!=null)&& ($_POST["txtMessage"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtEmail"]!=null))
	{

	
				//	echo $id;
					$sql=$mysqli->prepare("insert into feedback(FULL_NAME,EMAIL,PHONE_NUMBER,MESSAGES)values(?,?,?,?)");
					$sql->bind_param("ssss",$_POST["txtName"],$_POST["txtEmail"],$_POST["txtPhone"],$_POST["txtMessage"]);
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
	<title></title>
	<link rel="stylesheet" href="style.css">
	<style type="text/css" media="screen">
	body{
		margin:0;
		padding:0;
		background:url(img/aa7.jpg);
		background-size:cover;
	}
	.feedback-form{
		color:bold black;
       width:85%;
       max-width:600px;
       background:light brown;
       position:absolute;
       top:50%;
       left:50%;
       transform:translate(-50%,-50%);
       padding:30px 40px;
       box-sizing: border-box;
       border-radius: 8px;
       text-align: center;
       box-shadow: 0 0 20px   black;
       font-family: "montserrat",sans-serif;

	}
	.feedback-form h1{
		margin-top: 0;
		font-weight: 200;
		color:solid black;
		font-size: 50px;
	}
	.txtb{
		border: 1px solid white;
		margin: 8px 0;
		padding: 12px 18px;
		border-radius: 8px;
	}
	.txtb label{
		display: block;
		text-align: left;
		color: black;
		text-transform: uppercase;
		font-size: 14px;
	}
	.txtb input, .txtb textarea{
		width: 100%;
		border: none;
		background: none;
		outline: none;
		font-size: 18px;
		margin-top: 6px;
	}
	.btn{
		display: inline-block;
		background:blue;
		padding: 14px 0;
		color: blue;
		text-transform: uppercase;
		cursor: pointer;
		margin-top: 8px;
		width:100%;
    }

</style>

</style>
</head>
<body>
	<form method="POST">
	<div class="feedback-form">
		<h1>Feedback Form</h1>
		<div class="txtb">
			<label>  Name :</label>
			<input type="text" name="txtName" value="" placeholder="Enter Your Name">
		</div>
		<div class="txtb">
			<label> Email Address :</label>
			<input type="text" name="txtEmail" value="" placeholder="Enter Your Email Address">
		</div>
		<div class="txtb">
		<label> Phone Number :</label>
			<input type="text" name="txtPhone" value="" placeholder="Enter Your Phone Number">
		</div>
		<div class="txtb">
		<label> messages :</label>
			<textarea name="txtMessage"></textarea>
		</div>
		 
		<button type="submit" name="FEEDBACKbtn" style="background-color:skyblue; font-size: 20px;">FEEDBACK</button>
	     


	</div>
</form>
</body>
</html>
