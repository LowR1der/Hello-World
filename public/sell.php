<?php

require ("../includes/config.php");

//if user reached page via GET (as by clicing a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	//select data from users id	
	$rows = query ("SELECT symbol, shares FROM shares WHERE id=?", $_SESSION["id"]);	
	// render form
	render("sell_form.php", ["title" => "Sell", "rows"=> $rows]);        
}

else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($_POST["Shares"] == "empty")
	{
		apologize ("You don't have any shares to sell");
	}
	else 
	{
		$transaction = 'Sell';	
		//Get the price of symbol	
		$stock = lookup($_POST["Shares"]);	
		//select user shares 	
		$rows = query ("SELECT shares FROM shares WHERE id=? AND symbol=?" , $_SESSION["id"], $_POST["Shares"]);
	
		//calculate how money user earned 
		$money_back = $rows[0]["shares"] * $stock["price"];
	
		//delete "sell" shares	
		query ("DELETE FROM shares WHERE id=? AND symbol=?", $_SESSION["id"], $_POST["Shares"]); 	
	
		//update user money	
		query("UPDATE users SET cash=cash + ? WHERE id=?", $money_back, $_SESSION["id"]); 
	
		//insert data to history db
		query ("INSERT INTO history (id, transaction, symbol, shares, price) VALUES(?,?,?,?,?)", $_SESSION["id"], $transaction, $stock["symbol"], $rows[0]["shares"], $stock["price"]);	
	
		//redirect to portfolio
		redirect ("/index.php");
	}
}




?>
