<?php

require ("../includes/config.php");

//if user reached page via GET (as by clicing a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	// render form
	render("quote_form.php", ["title" => "Quote"]);        
	
}
else if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST ["symbol"])) 
	{
		apologize("Please enter a symbol!"); 
	}
	
	$stock = lookup($_POST["symbol"]);		
		
	if ($stock === false)
	{ 
		apologize("Please input correct symbol!");  
	}
	
	render ("quote_output.php", ["title" => "Quote", "stock" => $stock]);
}	

?> 
