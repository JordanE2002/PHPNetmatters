<html>


<head>

<title>Connecting to  sql</title>




<body>






<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass);
if($mysqli -> connect_errno){

    printf("Connection failed", $mysqli -> connect_error);
    exit();
}

printf("Conncted successful");

if($mysqli->query("Create database Testingguide")){
printf("Db created successfully <br/>");

}

if($mysqli->errno){
    printf("Could not make db<br/>", $mysqli->errno);
}


?>
</body>
</head>
</html>