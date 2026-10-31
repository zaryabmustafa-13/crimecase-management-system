<?php
include("db.php");

if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $_POST['status'];
    $officer = $_POST['officer'];

    $sql = "INSERT INTO cases (case_title, description, officer_name, status)
            VALUES ('$title', '$desc', '$officer', '$status')";

    if ($conn->query($sql)) {
        echo "<h3>Case Added Successfully</h3>";
    } else {
        echo "Error";
    }
}
?>
<div style="background: darkred; padding: 15px;">
    <a href="home.html" style="color:white; margin:10px;">Home</a>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Add Case</title>
<style>

body{
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
}

.container{
    width: 400px;
    background: white;
    margin: 80px auto;
    padding: 25px;
    box-shadow: 0 0 10px gray;
    border-radius: 10px;
}

h2{
    color: darkred;
}

input, textarea, select{
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button{
    padding: 10px 20px;
    background: darkred;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover{
    background: black;
}

.message{
    color: green;
    font-weight: bold;
}

a{
    text-decoration: none;
    color: darkred;
}

</style>
</head>
<body>

<h2>Add New Case</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Case Title" required><br><br>
    <textarea name="description" placeholder="Case Description" required></textarea><br><br>
    <input type="text" name="officer" placeholder="Officer Name" required><br><br>
<input type="text" name="status" placeholder="Case Status (Open/Closed)" required><br><br>
    <button type="submit" name="add">Add Case</button>
</form>

</body>
</html>