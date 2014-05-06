<!-- Head -->
<head>
<link rel="stylesheet" type="text/css" href="font.css">
<title>KakaoStory in Web - Thinkwork</title>
<link rel="shortcut icon" href="img/favicon.ico"> 
</head>
<?
// Domain Checking (Made By Seven)

// Login Check (Made By RainC)
	
	include_once("sess.php");
	include_once("menu.php");	
	if (isset($_SESSION['token'])) {
		?> <script>location.href="index.php"</script><?
	} else {
		session_destroy();
	} 
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
<br>
<br>
<br>
로그인이 필요합니다.
<br>
<br>
<br>
<br>
<br>
<br>

<a href="https://kauth.kakao.com/oauth/authorize?client_id=190c739551be1cdacf4c41a318d2d79a&redirect_uri=http://rainc.crplab.kr/oauth/oauth.php&response_type=code"><img src="https://developers.kakao.com/assets/img/about/logos/login/kr/login_btn_kr_01_medium.png"></a>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<font size=2>
Rain Studio 에서는 개인의 KakaoStory 의 Token을 수집하지 않습니다.<br>
Kakao Developers 등록 애플리케이션 명 : Rain Studio's Story Web Posting<br>Service By <a href="https://www.facebook.com/rainstudio.rs" target="_blank">Rain Studio</a>, Hosting By <a href="http://www.ipfuse.net/" target="_blank">IpFuse</a><br>해당 서비스는 (주)카카오에서 개발한 카카오 API를 활용하여 개발되었습니다.<br>해당 페이지는 크롬 및 나눔고딕에 최적화 되어있습니다. <a href="http://hangeul.naver.com/font" target="_blank">나눔고딕 다운로드</a>, <a href="https://www.google.com/intl/ko/chrome/" target="_blank">크롬 다운로드</a>
</font>
</font>
</center>
</html>
