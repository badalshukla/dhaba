<?php 

include_once 'conn.php';
$form_name= mysqli_real_escape_string($conn,$_POST['form_name']);
$customeremail= mysqli_real_escape_string($conn,$_POST['email']);
$phone= mysqli_real_escape_string($conn,$_POST['phone']);
$noofpersons= mysqli_real_escape_string($conn,$_POST['no_of_persons']);
$preferredfood= mysqli_real_escape_string($conn,$_POST['preferred_food']);
$occasion= mysqli_real_escape_string($conn,$_POST['occasion']);
$ownermail="akashish908@gmail.com";
$otp=rand(10000000,99999999);
$secno=$otp;

$sql="INSERT INTO `booking`(`name`, `email`, `phone`, `noofpeople`, `typefood`, `occa`, `otp`) VALUES ($form_name,$customeremail,$phone,$noofpersons,$preferredfood,$occasion,$secno);";
mysqli_query($conn,$sql);


$subject1="Email Form Customer ! (admin)";
$subject2="Email For Confermation  from Dhabawala.com! (Customer)";
$header="From: Dhabawala@techrain.ml";
$message1="HEY ! \n This Mail is Regarding Confermation of Order . Having Secret Code = \n <br><b>".$secno."</b> \n From :".$form_name."\n phone no:".$phone."\n Thank You !";
$message2="HEY ! \n There Is Your Otp  = \n <br><b>".$secno."</b> \n Name : ".$form_name." \n Phone no: ".$phone."\n for any Problem mail us ! \n Thank You !";
if(mail($ownermail,$subject1,$message1,$header)||mail($customeremail,$subject2,$message2,$header))
	{
		echo "Successfully Booked !";
	}
else
	{
		echo "Failed to Book!";
	}

 ?>