<?php
include("db.php");
if (isset($_POST['register'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO OFFICERS (name, email, password)
VALUES ('$name', '$email', '$password')";
if ($conn->query($sql)) {
echo "<h3>Registered Successfully</h3>";
}else{
echo "Error";
}
}?>
<div style="background: darkred; padding: 15px;">
    <a href="home.html" style="color:white; margin:10px;">Home</a>
</div>
<!DOCTYPE html>
<html>
<head>
<title>Officer Registration</title>
<style>
body{
front-family: Arial;
background-color: #f4f4f4;
text-align: center:}
.register-box{
width: 320px:
background: white:
padding: 20px:
margin: 80px auto;
box-shadow: 0 0 10px gray:
}
input{ 
width: 90%;
padding: 10px;
margin: 10px;
}
#passwordError {
color:red;
font-size:14px;
}
button {
padding: 10px 20px;
background: darkred;
color: white;
border: none;
}
button:hover{
    background: darkblue;
}
</style>
<script>
function validateForm(){
let name = document.getElementById("name").value;
let email = document.getElementById("email").value;
let password = document.getElementById("password").value;
let error = document.getElementById("passwordError");

if (name==""|| email==""|| password==""){
alert("all fields are required");
return false;
}
if (password.length < 5) {
error.textContent = "Password is too short";
return false;
}
error.textContent
return true;
}
</script>
</head>
<body>
<div class="register-box">
<h2>OFFICER REGISTRATION</h2>
<form method="POST" onsubmit="return validateForm()">
<input type="text" id="name" name="name" placeholder="ENTER FULL NAME"><br>
<input type="email" id="email" name="email" placeholder="ENTER  EMAIL"><br>
<input type="password" id="password" name="password" placeholder="ENTER PASSWORD"><br>
<span id="passwordError"></span><br><br>
<button type="submit" name="register">REGISTER</button><br>
<a href="login.php"> Already have account?LOGIN</a>
</form>
</div>
</body>
</html>