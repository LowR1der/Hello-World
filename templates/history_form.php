



<table id = "my_table", class = "table table-striped", cellspasing = "0" >
    	<thead>
		<tr>
			<th>Transaction</th>
			<th>Date/Time</th>
			<th>Symbol</th>
			<th>Shares</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody align= "left", class = "even">
			
		<?php foreach ($positions as $position){ 
		print ("<tr>");
		print ("<td> {$position["transaction"]}</td>");
		print ("<td> {$position["time"]}</td>");
		print ("<td> {$position["symbol"]}</td>");
		print ("<td> {$position["shares"]}</td>");
		print ("<td>$ {$position["price"]}</td>");
		print ("</tr>");}
		?> 	
		
	</tbody>	
	
</table>	


