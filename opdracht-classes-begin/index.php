<?php 
	function __autoload($className) {
	  require_once('classes/'.$className .'.php');
	}

	$percent = new Percent(150,100);
?>
<!doctype html>
<html>
<head>
	<title>Opdracht Classes Begin</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Manier</th>
				<th>Waarde</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Absoluut</td>
				<td> <?= $percent->absolute ?></td>
			</tr>
			<tr>
				<td>Relatief</td>
				<td> <?= $percent->relative ?></td>
			</tr>
			<tr>
				<td>Geheel Getal</td>
				<td> <?= $percent->hundred ?></td>
			</tr>
			<tr>
				<td>Nominaal</td>
				<td> <?= $percent->nominal ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>