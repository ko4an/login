<?php
session_start();
if(!isset($_SESSION["session_username"])){
	header("location:login.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
<?php }; ?>
<a href="logout.php">Выйти</a>
</body>
</html>
