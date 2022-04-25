<?php

require('database.php');
$query = 'SELECT * FROM employees ORDER BY employeeNumber';
$statement = $db->prepare($query);
$statement->execute();
$employees = $statement->fetchAll();
$statement->closeCursor();
?>
	


<!-- start html -->
<! DOCTYPE html>
<html>
<head>

	<title> Classic Model Database </title>
	<link rel="stylesheet" type="text/css" href="main.css" />

</head>

<body>
	<main>
		<h1> Add Employee </h1>
		<form action='add_employee.php' method='post' id='add_employee_form'>
			<label>Employee Number: </label>
			<input type='input' name='employeeNumber' /> </br>
			
			<label>Employee Last Name: </label>
			<input type='input' name='lastName' /> </br>
			
			<label>Employee First Name: </label>
			<input type='input' name='firstName' /> </br>
			
			<label>Extension: </label>
			<input type='input' name='extension' /> </br>
			
			<label>Office Code: </label>
			<input type='input' name='officeCode' /> </br>
			
			<label>Job Title: </label>
			<input type='input' name='jobTitle' /> </br>
			
			<input type='submit' value='Add Employee' />
		</form>
			
		<p><a href='index.php'>Return to List of Employees</a> </p>
	</main>
</body>



</html>