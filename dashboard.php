<?php
session_start();
include("db.php");

if(!isset($_SESSION['officer_name'])){
    header("Location: login.php");
    exit;
}

$officer = $_SESSION['officer_name'];

$sql = "SELECT * FROM cases";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Officer Dashboard</title>

<style>

body{
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
}

h1{
    color: darkred;
}

table{
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
}

th, td{
    border: 1px solid #ccc;
    padding: 12px;
}

th{
    background: darkred;
    color: white;
}

tr:nth-child(even){
    background: #f2f2f2;
}

tr:hover{
    background: #ddd;
}

a{
    text-decoration: none;
    color: darkred;
    font-weight: bold;
}

</style>

</head>

<body>

<div style="margin:15px;">
    <a href="home.html">← Back to Home</a>
</div>

<h1>WELCOME <?php echo $officer; ?></h1>

<h2>Your Assigned Cases</h2>

<table>

<tr>
    <th>Case ID</th>
    <th>Case Title</th>
    <th>Description</th>
    <th>Status</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['case_title']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>

<?php
}
?>

</table>

<br>


</body>
</html>