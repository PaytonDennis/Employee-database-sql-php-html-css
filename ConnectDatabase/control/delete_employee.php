<?php 

require_once('database.php');

$employeeNumber = filter_input(INPUT_POST, 'employeeNumber', FILTER_VALIDATE_INT);



//Delete employee from the database
if ($employeeNumber != false) {
	$query = "DELETE FROM employees
			WHERE employeeNumber = :employeeNumber";
	$statement = $db->prepare($query);
	$statement->bindValue(':employeeNumber', $employeeNumber);
	$success = $statement->execute();
	$statement->closeCursor();
}


//return to index
include('index.php');

?>