<?php
include("db.php");
$id=$_GET['id'];
$conn->query("DELETE FROM cases WHERE id=$id");
header("Location:view_cases.php");
?>