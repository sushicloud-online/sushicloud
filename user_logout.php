<?php
	//includes session info
	session_start();

	//deletes session info
	session_unset();
	session_destroy();

	//redirects user to index page
	header('Location: ./index.php');
?>