<?php

//configuration
require ("../includes/config.php");

//if user reached page via GET (as by clicing a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	//else render form
	render ("balance_form.php", ["title" => "Balance"]);
}
//else if user reached page via POST (as submiting a form via POST) 
else if ($_SERVER ["REQUEST_METHOD"]=="POST")
{
	//When user input incorrect data - show message about error
	if (empty($_POST ["cash"])) {apologize ("You must input a correct data!");}

	if (preg_match("/^\d+$/",$_POST["cash"])==false) {apologize ("Invalid data!");}	
	
	if ($_POST["cash"]<0) {apologize ("Invalid data");}

	else 
	{
		$transaction = 'Add cash';	
		
			
		//update user money	
		query("UPDATE users SET cash=cash + ? WHERE id=?", $_POST["cash"], $_SESSION["id"]); 
	
		//insert data to history db
		query ("INSERT INTO history (id, transaction, price) VALUES(?,?,?)", $_SESSION["id"], $transaction, $_POST["cash"]);	
	
		//redirect to portfolio
		redirect ("/index.php");
	}
	
}

?>
