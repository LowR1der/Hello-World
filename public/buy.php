<?php

//configuration
require ("../includes/config.php");

//if user reached page via GET (as by clicing a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	//else render form
	render ("buy_form.php", ["title" => "Buy"]);
}
//else if user reached page via POST (as submiting a form via POST) 
else if ($_SERVER ["REQUEST_METHOD"]=="POST")
{
	//When user input incorrect data - show message about error
	if (empty($_POST ["shares"] || $_POST["symbol"])) {apologize("You must specify a stock to buy!");}

	if (preg_match("/^\d+$/",$_POST["shares"])==false) {apologize ("Invalid number of shares!");}	
	
	if ($_POST["shares"]<0) {apologize ("Invalid number of shares");}

	if (lookup($_POST["symbol"]===false)) {apolozige ("Please enter a correct symbol!");}	
	
	
	$stock = lookup($_POST["symbol"]);
	
	//get price of shares
	$price = $stock["price"]* $_POST["shares"];

	//get avaliable cash 
	$cash = query ("SELECT cash FROM users WHERE id =?", $_SESSION ["id"]);

	if ($price>$cash[0]["cash"])
	{
		apologize ("You have not enough money");
	}
	
	else 
	{
		$transaction = 'Buy';		
		//make uppercase for db insert			
		$stock["symbol"] = mb_strtoupper($stock["symbol"]);
		
		//insert to db
		query ("INSERT INTO shares (symbol, id, shares) VALUES (?,?,?) 
		ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",  $stock["symbol"], $_SESSION["id"], $_POST["shares"]);
		
		//substract total price from cash
		query("UPDATE users SET cash=cash - ? WHERE id=?", $price, $_SESSION["id"]); 		
		//insert data to history db
		query ("INSERT INTO history (id, transaction, symbol, shares, price) VALUES(?,?,?,?,?)", $_SESSION["id"], $transaction, $stock["symbol"], $_POST["shares"], $stock["price"]);		
		// redirect to portfolio
       		redirect ("../index.php");	
			
	}    
	
}		


?>
