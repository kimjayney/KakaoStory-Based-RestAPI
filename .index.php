<head>
<!-- Head -->
<link rel="stylesheet" type="text/css" href="font.css">
<title>KakaoStory in Web - Rain Studio</title>
<link rel="shortcut icon" href="img/favicon.ico">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8;" />
</head>
<?
// Domain Checking (Made By Seven) 


	include_once("sess.php");
	//ob_start();
	if (isset($_SESSION['token'])) {
	} else {
		echo $_SESSION['token'];
	        session_destroy();	
	}	
	echo $_SESSION['token'];
	//include_once("../oauth/index.php");
	function refreshtoken($accesstoken)
	{
	$param2="grant_type=refresh_token&client_id=190c739551be1cdacf4c41a318d2d79a&refresh_token=$accesstoken";
        $ch2 = curl_init('https://kauth.kakao.com/oauth/token');
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch2, CURLOPT_POSTFIELDS ,$param2);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        $server_output2 = curl_exec($ch2);

        $json_data2=json_decode($server_output2);
        $last_token=$json_data2->access_token; // last token, used to login and anything
	return $last_token;
	}
	
	
	$token = $_SESSION['token'];
	//echo $_SESSION['token'];
	$param ="grant_type=authorization_code&client_id=190c739551be1cdacf4c41a318d2d79a&redirect_uri=http://rainc.crplab.kr/oauth/oauth.php&code=$token";
	//echo "logined";
	$param1="";
	$ch = curl_init('https://kauth.kakao.com/oauth/token');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");	
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$param");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$server_output = curl_exec($ch); // json data	
	// json parsing
//	echo $server_output;
	$json_data=json_decode($server_output);
	if ($json_data->error_description =="No such authorization_code.") {     //토큰 자동 갱신 
		$access_token=refreshtoken($_SESSION['refresh_token']);
		$_SESSION['access_token'] = $access_token;
		
	//	echo "refreshed(result) : $access_token	//";
		// refresh token
	} else {
		$access_token=$json_data->access_token; // access_token
		$refresh_token=$json_data->refresh_token;
		$_SESSION['refresh_token'] = $refresh_token;
		$_SESSION['access_token'] = $access_token;
	}
	//	echo $server_output;
	//echo "refresh : $refresh_token";
	
	$ch = curl_init('https://kapi.kakao.com/v1/api/story/profile');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//	curl_setopt($ch, CURLOPT_HTTPHEADER, "Authorization: Bearer $token");
	curl_setopt($ch,CURLOPT_HTTPHEADER,array("Authorization: Bearer $access_token"));	
//	curl_setopt($ch, CURLOPT_HTTPHEADER,array("Authorization: Bearer $token"));
	$result = curl_exec($ch);
	//echo $result;	
	$json_print = json_decode($result);
		
	$nickname = $json_print->nickName;
	$profileurl = $json_print->profileImageURL;
	$birthday = $json_print->birthday;
	if ($nickname=="") {
		echo $server_output;  echo $_SESSION['token'];?> <?
	}
	
//	echo "<br> Nickname : $nickname";
	echo "<br>"; ?><center><img src="<?=$profileurl?>" width="200" height="200"><?
//	echo "<br> birthday : $birthday";

	//echo $result;	

	
//	echo $token;
//}

?>
<html>

<center>
<!-- Nanum Godic -->
<font class="nanum">
<br>
<a href="http://rainc.crplab.kr/oauth/"><img src=img/kslogo.png></a>

<body bgcolor=yellow>
<!-- Body -->
<br>
BETA 1.1.0a
<br>
현재 가능한 기능은 포스팅, 친구공개/전체공개 여부, 사진 업로드입니다.
<br>
<br>
너무 많은양의 포스팅을 한꺼번에 하실 경우, 차단당하실 수 있습니다.
<br>
이 페이지는 테스트 개발용 페이지입니다! 정식 페이지는 rainc.crplab.kr/oauth입니다.
<br>
<?=$nickname ?> 님 스토리 페이지입니다.      
<a href="./logout.php"><input type="button" name="logout" value="로그아웃"></a>
<br>
<br>
<!-- upload Form -->
<form name="upload" action="./post/post.php" method="POST" enctype="multipart/form-data">
<!-- TextBox -->
<textarea name="cont" cols="100" rows="20" maxlength="200" onclick="this.select()" onfocus="this.select()">
최대 200자까지 작성할 수 있습니다.
</textarea>
<br>
<br>
<!-- Friend Setting -->
<input type="checkbox" name="friend"> 친구공개로 설정
<br>
<br>
<!-- Button -->
<input type="button" name="tbreset" value="초기화" onclick="tbresets()">
<input type="submit" name="posting" value="포스팅하기" >
<br>
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<br>
사진 업로드하기 <br> <input type="file" name="userfile" id="usefile" accept="image/*" />
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Infomation -->
<font size=2>
Rain Studio 에서는 개인의 KakaoStory 의 Token을 수집하지 않습니다.<br>
Kakao Developers 등록 애플리케이션 명 : Rain Studio's Story Web Posting<br>Service By <a href="https://www.facebook.com/rainstudio.rs" target="_blank">Rain Studio</a>, Hosting By <a href="http://www.ipfuse.net/" target="_blank">IpFuse</a><br>해당 서비스는 (주)카카오에서 개발한 카카오 API를 활용하여 개발되었습니다.<br>해당 페이지는 크롬 및 나눔고딕에 최적화 되어있습니다. <a href="http://hangeul.naver.com/font" target="_blank">나눔고딕 다운로드</a>, <a href="https://www.google.com/intl/ko/chrome/" target="_blank">크롬 다운로드</a>
</font>
</font>
</body>
</center>
</html>
<script type="text/javascript">
	
	function developers()
	{	
		if(upload.cont.value == "")
		{
			alert("보낼 내용이 없습니다!");
		}
	}
	
	function tbresets()
	{
		upload.cont.value = "";
		upload.friend.checked = false;
	}
</script>
/seven

