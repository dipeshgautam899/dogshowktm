<?php
include 'database.php';
if(isset($_POST['submit']))
{
    $dogname = $_POST['dogname'];
	$breedname = $_POST['breedname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$file = $_FILES['file1'];
	$file1 = $_FILES['file2'];
	$file2 = $_FILES['file3'];
	$file3 = $_FILES['file4'];
	
	


	$filename = $file['name'];
	$filename2 = $file1['name'];
	$filename3 = $file2['name'];
	$filename4 = $file3['name'];

	$filepath = $file['tmp_name'];
	$filepath2 = $file1['tmp_name'];
	$filepath3 = $file2['tmp_name'];
	$filepath4 = $file3['tmp_name'];

	$fileerror = $file['error'];
	$fileerror = $file1['error'];
	$fileerror = $file2['error'];
	$fileerror = $file3['error'];

	if($fileerror == 0){
		$destfile = 'upload/'.$filename;
		$destfile2 = 'upload/'.$filename2;
		$destfile3 = 'upload/'.$filename3;
		$destfile4 = 'upload/'.$filename4;

		// echo "$destfile";
		move_uploaded_file($filepath, $destfile);

		$insertquery = "insert into booking(dogname, breedname, age, gender, firstname, lastname, email, number, file, file1, file2, file3) values('$dogname', '$breedname', '$age', '$gender', '$firstname', '$lastname', '$email', '$number', '$destfile', '$destfile2', '$destfile3', '$destfile4')";

		$query = mysqli_query($con, $insertquery);

		if($query){
			echo "Registered Sucessfully";
		}else{
			echo "Not Inserted";
		}
	}


	
}
?>