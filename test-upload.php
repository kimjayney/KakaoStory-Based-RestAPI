<html>
<body>
<?php
	if($_FILES['userfile']['error'] > 0) //오류코드 검사. 0이면 오류없음
	​{
	 echo '에러 : ';
	 switch($_FILES['userfile']['error'])
	 {
	  case 1: echo '서버 문제로 업로드가 불가능합니다. 관리자에게 문의하세요. (에러코드 PIMF)';
	   break;
	  case 2: echo '정해진 용량보다 파일이 큽니다.';
	   break; 
	  case 3: echo '업로드가 다 되지 않았습니다. 다시 시도하여 주세요.';
	  case 4: echo '업로드에 실패하였습니다. 다시 시도하여 주세요.';
	   break;
	  case 6: echo '서버 문제로 업로드가 불가능합니다. 관리자에게 문의하세요. (에러코드 PITF)';
	   break;
	  case 7: echo '서버 문제로 업로드가 불가능합니다. 관리자에게 문의하세요. (에러코드 PEM)';
	   break;
	 }
	 exit;
	}
	​
	​
	if ($_FILES['userfile']['type'] != 'image/*'){ 
	 echo '이미지 파일만 업로드 가능합니다.';
	 exit;
	}
	$upfile = './upload/'.$_FILES['userfile']['name'];
	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
	 if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
	 {
	  echo '에러가 발생했습니다. 재업로드하세요.';
	  exit;
	 }
	}
	else
	{
	 echo '파일 업로드 공격이 감지되었습니다.';
	 echo $_FILES['userfile']['name'];
	 exit;
	}
	echo '파일 업로드 성공.<br><br>';
	$contents = file_get_contents($upfile);
	$contents = strip_tags($contents);
	file_put_contents($_FILES['userfile']['name'], $contents);
	//업로드한 내용을 보여준다.
	echo '업로드 한 파일 : : <br />';
	echo nl2br($contents);
	echo '<br />'
?>
</body>
</html>​
