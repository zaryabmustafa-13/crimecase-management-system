<?php
include("db.php");

if ($conn->connect_error) {
    die("Connection Failed");
}

$sql = "SELECT * FROM cases";
$result = $conn->query($sql);
?>
<div style="background: darkred; padding: 15px;">
    <a href="home.html" style="color:white; margin:10px;">Home</a>
</div>

<!DOCTYPE html>
<html>
<head>
    <title>View Cases</title>
<style>
body{
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
}

table{
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
}

th, td{
    padding: 12px;
    border: 1px solid #ccc;
}

thead{
    background: darkred;
    color: white;
}

tbody tr:nth-child(even){
    background: #f2f2f2;
}

tbody tr:hover{
    background: #ddd;
}
</style>
</head>
<body>

<h2>All Cases</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Officer</th>
        <th>Action</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['case_title']."</td>
                <td>".$row['description']."</td>
                <td>".$row['status']."</td>
                <td>".$row['officer_name']."</td>
                <td>
                    <a href='update_case.php?id=".$row['id']."'>update</a><br>                 
                    <a href='delete_case.php?id=".$row['id']."'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No Data</td></tr>";
}
?>

</table>

</body>
</html>