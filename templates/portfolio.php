
	<table id = "my_table", class= "table table-striped", cellspasing = "0" >
	    	<thead>
			<tr>
				<th>Symbol</span></th>
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
			print ("</tr>");}?> 	
			<tr align = "left">	
				<td colspan = 4> CASH </td>
				<td>$ <?= print $cash= money_format("%.2n", $cash); ?></td>
			</tr>		
		</tbody>	
	
	
	</table>	


