<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php if(!isset($_SESSION["session_username"])){
	echo "Вы еще не авторизованный пользователь";
	?><br><a href="log.php"><button>Вход</button></a>
	<a href="reg.php"><button>Регистрация</button></a><?php
}
else{ ?>
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username']; ?>!
 </span></h2><br>
 <h2><?php if ($_SESSION['root']==1) {
	echo "<h2>У вас привилегия админа</h2>"; 	
 } ?></h2>
<a href="logout.php">Выйти</a>
<?php } ?>
<br>
</body>
</html>
