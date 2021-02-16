
<?php
include("include/settings.php");
$msg="";
if(isset($_POST["btnsubmit"]))
{
	if(trim($_POST["txtUserName"])!=null && trim($_POST["txtPassword"])!=null)
{
	$sql=$mysqli->prepare("select * from login_detail where user_name=?");
	$sql->bind_param("s",$_POST["txtUserName"]);
	$sql->execute();
	$sql->bind_result($user_name,$password,$email);
	if($sql->fetch()>0 && $_POST["txtPassword"]==$password)
{
   
   $_SESSION["UserName"]=$user_name;
   header("location:".baseurl()."admin/manage_profile.php");
   }
}
   else
   {
   	$msg="Invalid Username and password";
   }
}
else
{
	$msg="Enter Username and password";
}

?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="add_new_user.php">
   <style type="text/css">
      body
      {
         background-image:url(img/aa3.jpg);
         background-size: cover;
      }
      .div1
      {
         height: 350px;
         width: 400px;
         background-color: black;
         border:2px transparent solid;
         border-radius: 5px;
         opacity: 0.6;
         margin-left: 400px;
         margin-top: 180px;
         padding-top: 50px;
      }
      .btn
      {
         background: blue;

      }
   </style>
</head>
<body>
   <div class="col-md-12">
   <div class="col-md-5 div1">
      <form method="POST">
         <h1 style="color:white;">Login</h1>
         <span style="color:white; font-size:20px;">UserName</span><input type="text" name="txtUserName" class="form-control"/>
         <span style="color:white; font-size:20px;">Password</span><input type="password" name="txtPassword" class="form-control"/>
         <span style="color: blue; font-size: 20px;"></span><input type="submit" name="btnsubmit" value="LOGIN" class="form-control"/>
      	<a href="forgotpassword.php" name="InkForgotPassword" style="font-size: 22px;">Forget Password </a><br>
<!--       	<a href="change_password.php" name="InkChangePassword">Change Password </a><br> -->
      </form>  
   </div>
</div>
</body>
</html>