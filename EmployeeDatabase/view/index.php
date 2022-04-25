<?php


//connect to the database
require 'database.php';

//query employees order by last name
$query = 'SELECT * FROM employees ORDER BY lastName';


try{
$statement = $db->prepare($query);
//bind parameters - none for this query
//execute the query

$statement->execute();
//retrieve the data from the data set

$employees = $statement->fetchAll();
//close connection

$statement->closeCursor();
} catch (Execption $e) {
	$error_message = $e->getMessage();
	echo "Error Message " . $error_message;
}


//query to retrieve employee from employee number
$queryByEmpNum = 'SELECT * FROM employees WHERE employee_number = :emp_num';

$employee_num = 002;



try{
$statement1 = $db->prepare($queryByEmpNum);

$statement1->bindValue(':emp_num', $employee_num);




$statement1->execute();
//retrieve data



$theEmployee = $statement1->fetch();



$statement1->closeCursor();
} catch (Execption $e) {
	$error_message = $e->getMessage();
	echo "Error Message " . $error_message;
}


?>
<html>
	<head>
		<title>Classic Model Database </title>
		<link rel="stylesheet" type=text/css" href="main.css" >
	</head>
	
	<body>
		<main>
			<h1>Employees</h1>
			<!--display table of employees in the database -->
			<table>
				<thead>
					<tr>
						<th>Employee Number </th>
						<th>Last Name </th>
						<th>First Name </th>
						<th>Extension </th>
						<th>Email </th>
						<th>Office Code </th>
						<th>Job Title </th>
					</tr>
				</thead>
				<tbody>
				
					<!--query the database-->
					<!--loop array display employees-->
					
					<?php foreach ($employees as $employee) : ?>
					<tr>
						<td><?php echo $employee['employeeNumber']; ?> </td>
						<td><?php echo $employee['lastName']; ?> </td>
						<td><?php echo $employee['firstName']; ?> </td>
						<td><?php echo $employee['extension']; ?> </td>
						<td><?php echo $employee['email']; ?> </td>
						<td><?php echo $employee['officeCode']; ?> </td>
						<td><?php echo $employee['jobTitle']; ?> </td>
						<!--the delete function for every employee-->
						<td><form action="delete_employee.php" method="post">
							<input type="hidden" name="employeeNumber"
								value="<?php echo $employee['employeeNumber']; ?>">
							<input type="submit" value="Delete">
							</form></td>
					</tr>
					<?php endforeach; ?>
					
					
				</tbody>
			</table>
			
			
			<!--link to Add Employee Form-->
			<p><a href='add_employee_form.php'>Add Employee</a></p>
			
		</main>
	</body>
	
	
</html>