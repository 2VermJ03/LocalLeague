<?php
/*
	Jay Verma
	Q12027103
	PHP logout script
*/
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
?>