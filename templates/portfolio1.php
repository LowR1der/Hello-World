<link href="/css/bootstrap.min.css" rel="stylesheet"/>
<link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
<link href="/css/styles.css" rel="stylesheet"/>

<div id ="top" align = "center">
<ul class ="nav nav-tabs">
<li class = "active"><a href = quote.php>Quote</a></li>
<li><a href = buy.php>Buy</a></li>
<li><a href = sell.php>Sell</a></li>
<li><a href = history.php>History</a></li>

</ul>

</div>
<table id = "my_table", cellspasing = "0" >
    	<thead>
		<tr>
			<th>Symbol</th>
			<th>Name</th>
			<th>Shares</th>
			<th>Price</th>
			<th>TOTAL</th>
		</tr>
	</thead>
	<tbody align= "left", class = "even">
			
		<?php foreach ($positions as $position){ 

	        print ("<tr>");
		print ("<td> {$position["symbol"]}</td>");
		print ("<td> {$position["name"]}</td>");
		print ("<td> {$position["shares"]}</td>");
		print ("<td>$ {$position["price"]}</td>");
		print ("<td>$ {$position["total"]}</td>");		
		print ("</tr>");}


?> 	
		
	</tbody>	
	<tfoot align = "left">	
	<tr class="even">	
	<td colspan = 4> CASH </td>
	<td><?= print $cash= money_format("%.2n", $cash); ?></td>
	</tr>	
	</tfoot>
	
</table>	

<div>
    <a href="logout.php">Log Out</a>
</div>
