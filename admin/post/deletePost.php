<?php
session_start();
require('../../connect.php');
require('../../class/PostManager.php');
require('../../class/UserManager.php');
$dirname = dirname(__FILE__);
$basename = basename($dirname);
$filename = $basename ."/". basename(__FILE__);
require('../../process/process_user.php');
require('../../process/process_permiss.php');

$post = new PostManager($db);

if(isset($_GET['post_id']) AND !empty($_GET['post_id']) AND isset($_GET['post_img']) AND !empty($_GET['post_img'])) {
	// données envoyées sécurisées
	$post_id = (int) trim(htmlspecialchars($_GET['post_id']));
	$post_img = trim(htmlspecialchars($_GET['post_img']));
	$post = $post->deletePost($post_id, $post_img);
	if(!$post) {
		$_SESSION['error'] = "Erreur de suppression";
		header('location:listPost.php');
	}	
	$_SESSION['success'] = "post supprimé";
	header('location:listPost.php');
} else {
	$_SESSION['error'] = "URL invalide";
	header('location:listPost.php');
}