<?php
	$data=array(
		array("Volvo",22,18),
		array("BWM",15,13),
		array("Saab",5,2),
		array("Land Rover",17,15)
	);
?>
<html>
	<head>
		<style>
			table,th,td{
				border:1px hidden;
                border-bottom: 1px solid black;
				text-align:center;
			}
			td,th{
				width:150px;
			}
		</style>
	</head>
	<body>
    <!-- for -->
		<table>
			<tr>
				<th>Name</th>
				<th>Stock</th>
				<th>Sold</th>
			</tr>
			<?php
				for($i=0;$i<4;$i++){
					echo "<tr>";
					for($j=0;$j<3;$j++)
						echo "<td>".$data[$i][$j]."</td>";
					echo "</tr>";
				}
			?>
		</table><br />
        
    <!-- foreach -->
		<table>
			<tr>
				<th>Name</th>
				<th>Stock</th>
				<th>Sold</th>
			</tr>
			<?php
				foreach($data as $value){
					echo "<tr>";
					foreach($value as $key){
						echo "<td>".$key."</td>";
					}
					echo "</tr>";
				}
			?>
		</table><br />

    <!-- array_map -->
		<table>
			<tr>
				<th>Name</th>
				<th>Stock</th>
				<th>Sold</th>
			</tr>
			<?php
				function Row($row){
					$r = join("", array_map("Col",$row));
					return "<tr>$r</tr>";
				}
				function Col($col){
					return "<td>$col</td>";
				}
				$table = join("",array_map("Row", $data));
				echo $table;
			?>
		</table>
	</body>
</html>