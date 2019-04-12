<?php require_once("connect.php"); ?>
<?php session_start(); ?>
<?php
	
	if(isset($_SESSION["session_username"])){
	header("Location: index.php");
	}
	if(isset($_POST["login"])){
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$username=htmlspecialchars($_POST['username']);
			$password=htmlspecialchars($_POST['password']);
			$permission="SELECT * FROM usertbl WHERE username = '".$username."'";
			$query =$pdo->query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
			$res = $pdo->query("SELECT * FROM usertbl WHERE username='".$username."'");
			$rows = $res->fetchColumn();
			$query->execute(array('username' => $username , ':password' => $password , ':permission' => $permission));
			if($rows!=0) {
				while($row = $query->fetch(PDO::FETCH_ASSOC)) {
					$dbusername=$row['username'];
  					$dbpassword=$row['password'];
  					$dbpermission=$row['permission'];
  				}
  				if($username == $dbusername && $password == $dbpassword) {
  					if ($dbpermission==1) {
  						$_SESSION['session_username']=$username;
  						$_SESSION['root']=1;	 
						header("Location: index.php");
  					}
  					else{
						$_SESSION['session_username']=$username;	 
						header("Location: index.php");
					}
				} }
			else {
				echo  "Неправильный логин или пароль";
			} } 
		else {
    		$message = "Что-то не то";
		} }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<form action="" id="loginform" method="post" name="logform">
			<input name="username" placeholder="Логин" type="text">
 			<input name="password" placeholder="Пароль" type="password">
			<input name="login" type= "submit" value="Log In"></p>
		</form>
		<a href="reg.php">регистрация</a>
	</body>
</html>
