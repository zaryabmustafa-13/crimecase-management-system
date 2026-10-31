<?php

include("db.php");

if ($conn->connect_error) {
    die("Connection Failed");
}

$sql = "SELECT * FROM officers";
$result = $conn->query($sql);

?>
<div style="background: darkred; padding: 15px;">
    <a href="home.html" style="color:white; margin:10px;">Home</a>
</div>

<!DOCTYPE html>
<html>
<head>
    <title>View Officers</title>

    <style>

        body{
            font-family: Arial;
            background: #f4f4f4;
            text-align: center;
        }

        table{
            width: 70%;
            margin: 50px auto;
            border-collapse: collapse;
            background: white;
        }

        th, td{
            border: 1px solid black;
            padding: 10px;
        }

        th{
            background: darkred;
            color: white;
        }

    </style>

</head>

<body>

<h2>Registered Officers</h2>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</tr>

<?php

while($row = $result->fetch_assoc()) {

?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>