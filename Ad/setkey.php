<script type="text/javascript">
localStorage.setItem("khoa","false");
</script>
<?php
	session_start();
	$_SESSION['islogin']=0;
	unset($_SESSION['username']);
	unset($_SESSION['quyen']);
	header("location:index.php");
?>