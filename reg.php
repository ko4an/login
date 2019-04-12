<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
	</head>
	<body>
<?php require("connect.php"); ?>
<?php
if(isset($_POST["register"])){
	
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  		$full_name= $_POST['full_name'];
		$email=$_POST['email'];
 		$username=$_POST['username'];
 		$password=$_POST['password'];
  		$res = $pdo->query("SELECT * FROM usertbl WHERE username='".$username."'");
		$rows = $res->fetchColumn();
		if($rows==0) {
			$sql="INSERT INTO usertbl
  			(full_name, email, username,password)
			VALUES('$full_name','$email', '$username', '$password')";
  			$result=$pdo->query($sql);
 			if($result) {
				$message = "Аккаунт успешно создался";
			} 
			else {
 				$message = "Что то пошло не так";
  			} } 
  		else {
			$message = "Такое имя пользователя уже занято";
   		}} 
   	else {
	$message = "Заполните все поля";
	}}
if (!empty($message)) {
	echo  $message;
}
?>
		<form action="reg.php" method="post" name="regform">
			<input   name="full_name"  type="text">
			<input   name="email" type="email">
			<input   name="username" type="text">
			<input   name="password"   type="password">
			<input   name= "register" type="submit" value="Зарегистрироваться">
		</form>
		<a href="log.php">вход</a>
	</body>
</html>