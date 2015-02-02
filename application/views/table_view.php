<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Table: Webapp</title>
	<meta charset="UTF-8">
</head>
<body>
	<table>
		<thead>
			<th>ID</th>
			<th>Data Text </th>
			<th>Time Stamp</th>
		</thead>
		<tbody>
			<?php foreach($table_data as $data): ?>
			<tr>
				<td><?php echo $data['id']?></td>
				<td><?php echo $data['username']?></td>
				<td><?php echo $data['last_login']?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>