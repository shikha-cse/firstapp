<?php
$msg="";
include("include/settings.php");
// include("include/check_session.php");
if(isset($_POST['btnRegister']))
{   
    if(($_POST["txtUsername"]!=null)&& ($_POST["txtPassword"]!=null)&& ($_POST["txtConfirm_Password"]!=null)&& ($_POST["txtuser_type"]!=null)&& ($_POST["txtName"]!=null)&& ($_POST["txtAddress"]!=null)&& ($_POST["txtCity"]!=null)&& ($_POST["txtState"]!=null)&& ($_POST["txtCountry"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtEmail"]!=null))
    {
            if($_POST["txtPassword"]==$_POST["txtConfirm_Password"])
            {
                $sql=$mysqli->prepare("select count(*) from registration where Username=?");
                $sql->bind_param("s",$_POST["txtUsername"]);
                $sql->execute();
                $sql->bind_result($check);
                $sql->fetch();
                $sql->close();
                if($check==0)
                {
                    $sql=$mysqli->prepare("insert into registration(Username,Password,user_type,Name,Address,City,State,Country,Phone,Email)values(?,?,?,?,?,?,?,?,?,?)");
                    $sql->bind_param("ssssssssss",$_POST["txtUsername"],$_POST["txtPassword"],$_POST["txtuser_type"],$_POST["txtName"],$_POST["txtAddress"],$_POST["txtCity"],$_POST["txtState"],$_POST["txtCountry"],$_POST["txtPhone"],$_POST["txtEmail"]);
                    $sql->execute();
                    $sql->close();
                    // $sql=$mysqli->prepare("select max(user_id) from registration");
                    // $sql->execute();
                    // $sql->bind_result($id);
                    // $sql->fetch();
                    // $sql->close();  
                //  echo $id;
                    // $sql=$mysqli->prepare("insert into registration(Name,Address,City,State,Country,Phone,Email)values(?,?,?,?,?,?,?)");
                    // $sql->bind_param("isssssss",$id,$_POST["txtuser_id"],$_POST["txtName"],$_POST["txtAddress"],$_POST["txtCity"],$_POST["txtState"],$_POST["txtCountry"],$_POST["txtPhone"],$_POST["txtEmail"]);
                    // $sql->execute();
                    // $sql->close();
                    $msg="Record inserted Successfully";
                }
                else
                {
                    $msg="User Already exist";
                }
            }
            else
            {
                $msg="Passwords don't match";
            }
    }
    else
    {
        $msg="Fields can't be left empty";
    }
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registration</title>
<style type="text/css">
    .body
    {
        background-image: url(img/aa13.jpeg);
        background-repeat: no-repeat;
        width: 100%;
        height: 700px;
       /* margin-left: 200px;*/
        background-size: cover;
      }
</style>
</head>

<body>
    <div class="body">
<form action="" method="post">
	<table cellpadding="10" cellspacing="0" border="1" align="center">
    	<tr>
        	<td align="center">
            	<b>Registration</b>
            </td>
        </tr>
       <!--  <tr>
        	<td>
            	&nbsp;&nbsp; <a href="manage_users.php" name="lnkManageUsers" >Manage Users</a> -->
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <!--  <a href="view_profile.php" name="lnkProfile" >Profile</a>&nbsp;&nbsp;
                <a href="logout.php" name="lnkLogout" >Logout</a>&nbsp;&nbsp;
                <a href="change_password.php" name="InkChangePassword">Change Password</a>
            </td> -->
      <!--   </tr>  -->
        <tr>
        	<td>
            	<fieldset>
                	<legend align="center"><b> Account Information</b></legend>
                 <table cellspacing="0">
                 	 <tr>
                          <td colspan="2" align="center">
                            <font size="+2" color="#FF0000">
                                <?php 
                                    echo $msg; 
                                ?>
                            </font>
                          </td>
                    </tr>
                   <!--  <tr>
                    	<td width="120">
                        	<b>ID</b>
                        </td>
                        <td>
                        	<input type="text" name="txtuser_id" title="Enter user_id" required />
                        </td>
                    </tr> -->
                <tr>
                    	<td width="120">
                        	<b>Username:</b>
                        </td>
                        <td>
                        	<input type="text" name="txtUsername" title="Enter Username" required />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>Password:</b>
                        </td>
                        <td>
                        	<input type="password" name="txtPassword" title="Enter Password" required  />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>Confirm Password:</b>
                        </td>
                        <td>
                        	<input type="password" name="txtConfirm_Password" title="Enter password" required  />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>User Type:</b>
                        </td>
                        <td>
                        	<select name="txtuser_type">
                            	<option><b>Admin</b></option>
                                <option><b>Employee</b></option>
                            </select>
                        </td>
                    </tr>
                 </table>   
                </fieldset>
                
                <fieldset>
                	<legend align="center"><b> Personal Information</b> </legend>
                 <table cellspacing="0">
                 	<tr>
                    	<td width="120">
                        	<b>Name:</b>
                        </td>
                        <td>
                        	<input type="text" name="txtName" title="Enter Name" required  />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>Address:</b>
                        </td>
                        <td>
                       		<textarea rows="4" cols="16" name="txtAddress" title="Enter Address" required ></textarea> 	
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        <b>	City:</b>
                        </td>
                        <td>
                        	<input type="text" name="txtCity" title="Enter City" required />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        <b>	State:</b>
                        </td>
                        <td>
                        	<input type="text" name="txtState" title="Enter State" required  />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>Country:</b>
                        </td>
                        <td>
                        	<input type="text" name="txtCountry" title="Enter Country" required />
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	<b>Phone:</b>
                        </td>
                        <td>
                        	<input type="text" name="txtPhone" title="Enter Phone Number" required  />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>Email Id:</b>
                        </td>
                        <td>
                        	<input type="email" name="txtEmail" title="Enter Email id" required />
                        </td>
                    </tr>
                     <tr>
                    	<td  align="center" colspan="2">
                        	<input type="submit" value="Register" style="font-size:15px; background-color:lightgrey;" name="btnRegister"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" value="Reset" style="font-size:15px; background-color:lightgrey;"name="btnReset"/>
                        </td>
                    </tr>
                    
                </table>   
                </fieldset>
            </td> 
        </tr>
    </table>
    </form>
</div>
</body>
</html>