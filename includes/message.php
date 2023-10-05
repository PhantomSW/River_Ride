<?php 
	if (isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type']) && !empty($_GET['type'])){
		echo '<div role="alert" class=" alert-dismissible fade show alert alert-' . htmlspecialchars($_GET['type']) . '">' . htmlspecialchars($_GET['message']) . '</div>';
	}
?>