<!DOCTYPE html>
<?	 
	include_once($cl_path."/sess.php");
?>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>KakaoStory for Web</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<style type="text/css">
	.bs-example{
    	margin: 20px;
	font-family: "나눔고딕";
    }
</style>
</head>
<body>
<div class="bs-example">
    <nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://rainc.crplab.kr/oauth/">KakaoStory For Web</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="http://rainc.crplab.kr/oauth/index.php">홈</a></li>
                    <li><a href="http://rainc.crplab.kr/oauth/introduce/index.php">소개</a>
		    <li><a href="http://rainc.crplab.kr/oauth/support.php">지원</a>
	       	</li> </ul>

                
		    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">카카오계정<b class="caret"></b></a>
                    <ul class="dropdown-menu">
		    <? if (isset($_SESSION['token'])) {?>
                    <li><a href="http://rainc.crplab.kr/oauth/logout.php">로그아웃</a></li>
                        </ul>
                    </li>





		    <? } else { ?>
			<li><a href="https://kauth.kakao.com/oauth/authorize?client_id=190c739551be1cdacf4c41a318d2d79a&redirect_uri=http://rainc.crplab.kr/oauth/oauth.php&response_type=code">로그인</a></li>
                        </ul>
                    </li>
		<? } ?>
                </ul>           
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>
</body>
</html>                                		
