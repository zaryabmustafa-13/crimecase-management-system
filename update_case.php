<?php
include("db.php");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM cases WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $desc = $_POST['description'];
$status = $_POST['status'];
    $officer = $_POST['officer'];

    $sql = "UPDATE cases SET 
            case_title='$title',
            description='$desc',
            status='$status',
            officer_name='$officer'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: view_cases.php");
    } else {
        echo "Error updating";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Case</title>
</head>
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


</style>
</head>
<body>

<h2>Update Case</h2>

<form method="POST">
    <input type="text" name="title" value="<?php echo $row['case_title']; ?>"><br><br>
    <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>
    <input type="text" name="status" value="<?php echo $row['status']; ?>"><br><br>
    <input type="text" name="officer" value="<?php echo $row['officer_name']; ?>"><br><br>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>