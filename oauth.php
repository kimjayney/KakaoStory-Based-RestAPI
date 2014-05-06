
<?
	include_once("sess.php");
	$token=$_GET['code'];
	$_SESSION['token']=$token;
	$_SESSION['test2']=$token;
//	echo $token;
?>
<script>location.href="index.php"</script>

