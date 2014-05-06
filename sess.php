<?	
	if(session_status()!=PHP_SESSION_ACTIVE) { 
		session_start();
	} else {
		?> <script>alert("already");</script><?
	} 
?>

