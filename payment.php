<?php
$msg="";
include("include/settings.php");
// include("check_session.php");
if(isset($_POST['PAYMENTbtn']))
{	
	if(($_POST["txtname_on_card"]!=null)&& ($_POST["txtcard_no"]!=null)&& ($_POST["txtcvc"]!=null)&& ($_POST["txtexpiration"]!=null))
	{

	
				//	echo $id;
					$sql=$mysqli->prepare("insert into payment(name_on_card,card_no,cvc,expiration)values(?,?,?,?)");
					$sql->bind_param("ssss",$_POST["txtname_on_card"],$_POST["txtcard_no"],$_POST["txtcvc"],$_POST["txtexpiration"]);
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
	<meta charset="utf-8">
	<title> hotel payment form</title>
	<style type="text/css" media="screen">
	body{
		margin:0;
		padding:0;
		background:url(img/pay.jpg);
		background-size:cover;
	}
	.b{
         margin-top: 15px;
	}

</style>
</head>
<body>
	<div class=" PAYMENTS" align="center">
		<h1 style="color:black;font-size:45px;"> PAYMENTS</h1></div>
	<form action="" method="GET">
		<fieldset>
	<legend style="color:black;font-size:20px;"align="center"> Payment Details:</legend>

    <div>
        <div class="a">
          
            <label class='control-label'>Name on Card</label>
                <input class='form-control' name="txtname_on_card" size='4' type='text'></div>
                <div class="b">

			<label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number'name="txtcard_no" size='20' type='text'></div><br>
                <div class="c">
			<label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' name="txtcvc" placeholder='ex. 311' size='4' type='text'></div><br>
                <div class="d">
			<label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
			<label class='control-label'> </label>
                <input class='form-control card-expiry-year' name="txtexpiration" placeholder='YYYY' size='4' type='text'></div><br>
                <div class="e">
            <!--  Total: -->
                  <!-- <span class='amount'>$300</span></div><br> -->
                  
                  <button class="btn btn-default" type='submit'>Pay »</button>
             </div>
             
			
		</fieldset>
	</form>

</body>
</html>