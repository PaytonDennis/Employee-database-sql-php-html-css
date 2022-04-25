<?php

//get data 
$employeeNumber= filter_Input(INPUT_POST, 'employeeNumber', FILTER_VALIDATE_INT);
$lastName= filter_Input(INPUT_POST, 'lastName');
$firstName= filter_Input(INPUT_POST, 'firstName');
$extension= filter_Input(INPUT_POST, 'extension');
$email= filter_Input(INPUT_POST, 'email');
$officeCode= filter_Input(INPUT_POST, 'officeCode');
$jobTitle= filter_Input(INPUT_POST, 'jobTitle');


//validate numeric input
if ($employeeNumber == null || $employeeNumber == false || $firstName == null
|| $lastName == null || $extension == null || $email == null || $officeCode == null ||
$jobTitle == null) {
	$error_message = "Invalid Employee Information, Check Data Fields and Try Again.";
	echo $error_message;
	include('add_employee_form.php');
} else {
	require_once('database.php');
	$addQuery= 'INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, jobTitle) VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :jobTitle)';

// none of this seems to work and flags errors	
/*if ($employeeNumber === TRUE) {
	$error_message = 'Employee Number must be a valid number.';
} elseif ((empty($lastName)) || (empty($firstName)) || (empty($extension)) 
	|| (empty($email)) || (empty($officeCode)) || 
	(empty($jobTitle))) {
	$error_message = 'Invalid Employee Information, Check Data Fields and Try Again.';
} else {
	$error_message = '';
}*/



//if an error message exists - go back to index page - add later
/*if ($error_message != '') {
	include('index.php');
	exit();
}*/


//connect to database
//require_once is because we only go to add page one at a time, index runs multiple
//require_once('database.php');
//$addQuery= 'INSERT INTO employees (employeeNumber, lastName, firstName, extension, email, officeCode, jobTitle) VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :jobTitle)';

//try {
	//create statement object
	$addStatement = $db->prepare($addQuery);
	//bind parameters
	$addStatement->bindValue(':employeeNumber', $employeeNumber);
	$addStatement->bindValue(':lastName', $lastName);
	$addStatement->bindValue(':firstName', $firstName);
	$addStatement->bindValue(':extension', $extension);
	$addStatement->bindValue(':email', $email);
	$addStatement->bindValue(':officeCode', $officeCode);
	$addStatement->bindValue(':jobTitle', $jobTitle);
	//execute query
	$addStatement->execute();
	//close connection
	$addStatement->closeCursor();
/*} catch (Exception $e) {
	$error_message = $e->getMessage();
	echo 'Error Message: ' . $error_message;
//}	//end try catch*/

//return to main page
include ('index.php'); //will display all employees including new one if added
	
}

?>