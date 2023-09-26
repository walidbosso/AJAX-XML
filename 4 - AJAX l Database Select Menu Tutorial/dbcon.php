<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 500px;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 10px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','testdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"testdb");
$sql="SELECT * FROM students WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Mark</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['fname'] . "</td>";
    echo "<td>" . $row['lname'] . "</td>";
    echo "<td>" . $row['mark'] . "</td>";

    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>