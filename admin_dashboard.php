<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

body{
    font-family: Arial;
    background: #f4f4f4;
    text-align: center;
}

.container{
    margin-top: 100px;
}

button{
    padding: 12px 20px;
    margin: 10px;
    border: none;
    background: darkred;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

button:hover{
    background: black;
}
.slider{
    width: 500px;
    height: 250px;
    margin: 20px auto;
}

.slider img{
    width: 100%;
    height: 100%;
    border-radius: 10px;
    transition: opacity 1s ease-in-out;
    opacity: 1;
}
</style>
</head>

<body>

<div class="container">

<h1>ADMIN DASHBOARD</h1>

<a href="view.php">
<button>View Officers</button>
</a>

<a href="add_case.php">
<button>Add Case</button>
</a>

<a href="view_cases.php">
<button>View Cases</button>
</a>

<a href="logout.php">
<button>Logout</button>
</a>

</div>
<div class="slider">
    <img id="slide" src="/crimecase_system/images/crime2.jpg">
</div>
<script>

let images = [

"/crimecase_system/images/crime2.jpg",
"/crimecase_system/images/crime3.jpg",
"/crimecase_system/images/crime4.jpg",
"/crimecase_system/images/crime5.jpg",
"/crimecase_system/images/crime6.jpg",

];

let index = 0;
let img = document.getElementById("slide");

function changeImage() {
    img.style.opacity = 0;   // fade out

    setTimeout(() => {
        index++;
        if (index == images.length) {
            index = 0;
        }

        img.src = images[index];
        img.style.opacity = 1; // fade in
    }, 500);
}

setInterval(changeImage, 2000);

</script>

</body>
</html>