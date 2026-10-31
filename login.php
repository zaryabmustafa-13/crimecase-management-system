<?php
session_start();
include("db.php");

$message = "";

if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // EMPTY FIELD CHECK
    if(empty($email) || empty($password)){

        $message = "Please fill all fields";
    }

    else{

        // CHECK EMAIL
        $sql = "SELECT * FROM officers WHERE email='$email'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){

            $row = $result->fetch_assoc();

            // CHECK PASSWORD
            if($password == $row['password']){

                // CHECK ROLE

                // ADMIN
                if($row['role'] == "admin"){

                    $_SESSION['admin'] = $row['name'];

                    header("Location: admin_dashboard.php");
                    exit;
                }

                // OFFICER
                else if($row['role'] == "officer"){

                    $_SESSION['officer_name'] = $row['name'];

                    header("Location: dashboard.php");
                    exit;
                }

                else{
                    $message = "Invalid Role";
                }

            }

            else{
                $message = "Wrong Password";
            }

        }

        else{
            $message = "Email Not Found";
        }

    }
}
?>
<div style="background: darkred; padding: 15px;">
    <a href="home.html" style="color:white; margin:10px;">Home</a>
</div>
<!DOCTYPE html>
<html>
<head>
<title>Officer Login</title>
<style>
body{
front-family: Arial;
background-color: #f4f4f4;
text-align: center:}
.login-box{
width: 300px:
background: white:
padding: 20px:
margin: 100ox auto;
box-shadow: 0 0 10px gray:
}
input{ 
width: 90%;
padding: 10px;
margin: 10px;
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
function validateForm() {

  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  if (email == "" || password == "") {
    alert("All fields are required");
    return false;
  }

  return true;
}
</script>
</head>
<body>
<div class="login-box">
<?php  
if($message != ""){
echo "<p style='color:red; font=weight:bold;'>$message</p>";
}
?>
<h2>OFFICER LOGIN</h2>
<form method="POST" action="" onsubmit="return validateForm()">
<input type="email" id="email" name="email" placeholder="ENTER OFFICIER EMAIL"><br>
<input type="password" id="password" name="password" placeholder="ENTER PASSWORD"><br>
<button type="submit" name="login_btn">LOGIN</button><br>
<a href="register.php">No account? CREATE</a>
</form>
</div>
</body>
</html>