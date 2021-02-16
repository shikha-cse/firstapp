<?php
$msg="";
include("include/settings.php");
include "classes/class.phpmailer.php";
// include("check_session.php");
if(isset($_POST['CONTACTbtn']))
{	
	if(($_POST["txtName"]!=null)&& ($_POST["txtMessage"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtEmail"]!=null))
	{

	
				//	echo $id;
					$sql=$mysqli->prepare("insert into contact(FULL_NAME,EMAIL,PHONE_NUMBER,MESSAGES)values(?,?,?,?)");
					$sql->bind_param("ssss",$_POST["txtName"],$_POST["txtEmail"],$_POST["txtPhone"],$_POST["txtMessage"]);
					$sql->execute();
					$sql->close();

					$msg="Record inserted Successfully";
				}
			else
			{
				$msg="fields should not be empty";
			}

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "yadavshikha49428@gmail.com";
$mail->Password = "shikha88";
$mail->SetFrom("yadavshikha49428@gmail.com");
$mail->Subject = "Your Message from contact us";
$mail->Body = $_POST["txtMessage"] ;


$mail->AddAddress($_POST['txtEmail']);        //mail address of sender

if(!$mail->Send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
	else
		{
			$msg= "Email is incorrect";
		}
				
			// else
			// {
			// 	$msg= "Please fill an email id";
			// }
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
		background:url(img/aa9.jpg);
		background-size:cover;
	}
	.contact-form{
    
       width:85%;
       max-width:600px;
       background:light brown;
       position:absolute;
       top:50%;
       left:50%;
       opacity: 0.8;
       transform:translate(-50%,-50%);
       padding:30px 40px;
       box-sizing: border-box;
       border-radius: 8px;
       text-align: center;
       box-shadow: 0 0 20px black;
       font-family: "montserrat",sans-serif;

	}
	.contact-form h1{
		margin-top: 0;
		font-weight: 200;
		font-size: 50px;
	}
	.txtb{
		border: 1px solid grey;
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
		background: violet;
		padding: 14px 0;
		color: black;
		text-transform: uppercase;
		cursor: pointer;
		margin-top: 8px;
		width:100%;
    }
    .arrow
    {
    	background-color: violet;
    	border-width: 0 3px 3px;
    	/*display: inline-block;*/
    	/*padding: 3px;*/
    	margin-top: 10px;
    	size: 50px;
    	color:solid black;
    	font-size: 20px;
    }

</style>
</head>
<body>
	<form method="POST">
	<div class="contact-form">
		<h1>Contact Us</h1>
		<div class="txtb">
			<label> Full Name :</label>
			<input type="text" name="txtName" value="" placeholder="Enter Your Name">
		</div>
		<div class="txtb">
			<label> Email :</label>
			<input type="text" name="txtEmail" value="" placeholder="Enter Your Email">
		</div>
		<div class="txtb">
		<label> Phone Number :</label>
			<input type="text" name="txtPhone" value="" placeholder="Enter Your Phone Number">
		</div>
		<div class="txtb">
		<label> messages :</label>
			<textarea name="txtMessage"></textarea>
		</div>
		<button type="submit" class="arrow" name="CONTACTbtn">SUBMIT</button>&nbsp;&nbsp;&nbsp;
		<B><a href="feedback.php" name="lnkFeedback" style="font-size: 24px;">FEEDBACK</a></B>
		
	</div>
</form>
</body>
</html>
