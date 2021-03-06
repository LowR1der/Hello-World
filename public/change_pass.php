<?php

//configuration
require ("../includes/config.php");

//if user reached page via GET (as by clicing a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	//else render form
	render ("change_pass_form.php", ["title" => "Change password"]);
}
//else if user reached page via POST (as submiting a form via POST) 
else if ($_SERVER ["REQUEST_METHOD"]=="POST")
{
	if (!empty($_POST ["password"]))	
	{
		$pass = query("SELECT hash FROM users WHERE id=?" , $_SESSION["id"]);
		// if we found user, check password
        	if (count($pass) == 1)
        	{
            		// first (and only) row
            		$pass = $pass[0];

            		// compare hash of user's input against hash that's in database
            		if (crypt($_POST["password"], $pass["hash"]) != $pass["hash"])
            		{
             			apologize  ("Please enter a correct password");	
            		}   
				
		 } 

		//When user input incorrect data - show message about error
		if (empty($_POST["confirmation"])||empty($_POST["new_password"])) {apologize("Please enter a new password!");}
	
		else if (($_POST ["confirmation"]) != ($_POST ["new_password"])) {apologize ("Please confirm a password");}	
	}
	
	//input new pas to db
	query ("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["confirmation"]), $_SESSION["id"]);
	// redirect to portfolio
        redirect("../index.php");
	
}

?>
