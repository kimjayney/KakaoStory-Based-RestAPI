<?
	include_once("sess.php");
	$token=$_SESSION['access_token'];
	$ch = curl_init('https://kapi.kakao.com/v1/user/logout');
	 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//      curl_setopt($ch, CURLOPT_HTTPHEADER, "Authorization: Bearer $token");
        curl_setopt($ch,CURLOPT_HTTPHEADER,array("Authorization: Bearer $token"));
	


	$result=curl_exec($ch);
//	echo $result;
	session_destroy();
?>
<script>location.href="login.php"</script>
