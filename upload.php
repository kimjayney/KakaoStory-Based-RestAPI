<?
	include_once("./sess.php");
	
	header("Content-Type: text/html; charset= UTF-8 ");
	ob_start();
	if (isset($_POST['upload_check'])) {				
		exit("error");
	
	}
	

	if($_FILES['upload']['size'] > 5242880) {
		exit("업로드 최대용량 초과");
	}

//	echo "result" .$_FILES['userfile']['name'];
	$ableExt = array('jpg','jpeg','gif','png','bmp');
	$path = pathinfo($_FILES['userfile']['name']);
	$ext = strtolower($path['extension']);
	
	if(!in_array($ext, $ableExt)) {
		exit("허용되지 않는 확장자입니다.");
		
	}//if
	
	$time = explode(' ',microtime());
//	$fileName = $time[1].substr($time[0],2,6).'_'.strtoupper($ext);
	$filepath="./upload/";
	$original_filename=basename($_FILES['userfile']['name']);
	$sha1_filename=$filepath.sha1($original_filename);
		//중요 이미지의 경우 웹루트(www) 밖에 위치할 것을 권장(예제 편의상 아래와 같이 설정)

 	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $sha1_filename.".".$ext)) {
		
		?> <script>alert("Upload Success");</script><?
		
	
	} else { 
		echo "upload error";
		print_r($_FILES);
	}
	
?>

