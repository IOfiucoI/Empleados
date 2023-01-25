<?php
session_start();

if (!empty($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);

	if (session_destroy()) {
		header("Location: ../index.php");
	}
} else {
	header("Location: ../index.php");
}
