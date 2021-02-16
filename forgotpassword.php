<?php
	$msg="";
	include("include/settings.php");
      include "classes/class.phpmailer.php";
	// include("include/check_session.php");
	// $User_Id=$_SESSION["UserId"];
	if(isset($_POST["btnSend"]))
	{
		if($_POST["txtEmail"]!=null)
		{
			$sql=$mysqli->prepare("select email from login_detail where email=?");
			$sql->bind_param("s",$_POST['txtEmail']);
			$sql->execute();
			$sql->bind_result($email);
			$sql->fetch();
			// echo $email;
			// $sql->close();
		// }
			if($_POST["txtEmail"]== $email)
			{
				$sql->close();
			$sql=$mysqli->prepare("select password from login_detail where email=?");
				$sql->bind_param("s",$_POST["txtEmail"]);
				$sql->execute();
                $sql->bind_result($password);
				// $sql->close();
                $sql->fetch();
				// $sql->bind_result($password);
				
				echo $password;

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
$mail->Subject = "Your Password for the account";
$mail->Body = "<b>password is". $password;


$mail->AddAddress($_POST['txtEmail']);        //mail address of sender

if(!$mail->Send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}

                
					}
					else
					{
						$msg= "Email is incorrect";
					}
				}
			else
			{
				$msg= "Please fill an email id";
			}
		}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Forget Password</title>
<style type="text/css">
    .back
    {
        background-image: url(img/aa8.jpg);
        background-repeat: no-repeat;
         width: 100%;
        height: 700px;
       /* margin-left: 200px;*/
        background-size: cover;
    }
</style>
</head>
<body>
     <div class="back">
<table align="center">

	<tr>
    	<td>
            <fieldset style="margin-top: 200px; height: 150px; width: 300px;">
           		 <legend align="center" style="font-size: 22px;"><b>FORGET PASSWORD</b></legend>
                	<form action="" method="POST">
                        <table align="center">
                        <tr>
                              <td colspan="2" align="center">
                                    <font size="+2" color="#FF0000">
											<?php 
                                                echo $msg; 
                                            ?>
                                    </font>
                              </td>
               			 </tr>
                         <tr>
                                <td>
                                    <b>Email:</b>
                                </td>
                                <td>
                                    <input type="email" name="txtEmail" title="Enter Email" />
                                </td>
                            </tr>
                              <tr>
                                <td>
                                  <b>  User Name:</b>
                                </td>
                                <td>
                                    <input type="text" name="txtUserName" title="Enter Username" />
                                </td>
                            </tr>
                            <!-- <tr> -->
                                <!-- <td> -->
                                    <!-- Password: -->
                                <!-- </td> -->
                                <!-- <td> -->
                                    <!-- <input type="password" name="txtPassword" required title="Enter the Password"/> -->
                                <!-- </td> -->
                            <!-- </tr> -->
                             <!-- <tr> -->
                                <!-- <td> -->
                                    <!-- New Password: -->
                                <!-- </td> -->
                                <!-- <td> -->
                                    <!-- <input type="password" name="txtNewPassword" required title="Enter the New Password"/> -->
                                <!-- </td> -->
                            <!-- </tr> -->
<!--                              <tr>
                                <td>
                                    Forget Password:
                                </td>
                                <td>
                                    <input type="password" name="txtConfirmPassword" required title="Enter the Password to be confirmed"/>
                                </td>
                            </tr> -->
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="SEND" name="btnSend" style="background-color: skyblue; font-size: 15px;"  /> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
                                    <input type="button" value="Cancel" name="btnCancel" style="background-color:skyblue; font-size: 15px;"  onClick="window.location.replace('manage_profile.php')" />		
                                    <!--for onclick , input type must be button-->
                          
                                </td>
                            </tr>        
                        </table>
                   </form>
            </fieldset>
		</td>
	</tr>
</table>
</div>	
</body>
</html>
