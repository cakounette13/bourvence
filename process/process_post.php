<?php
session_start();
require('../connect.php');
require('../class/Post.php');
require('../class/PostManager.php');

$post = new PostManager($db);

if(isset($_POST['submitInsertPost'])) {
	if(isset($_POST['post_id']) AND isset($_POST['post_title']) AND isset($_POST['post_text']) AND isset($_POST['post_publie']) AND isset($_POST['post_date']) AND isset($_POST['user_id']) AND isset($_FILES['new_img'])) {
	$data['post_id'] = (int) trim(htmlspecialchars($_POST['post_id']));
	$data['post_title'] = trim(htmlspecialchars($_POST['post_title']));
	$data['post_text'] = trim(htmlspecialchars($_POST['post_text']));
	$data['post_publie'] = (int) trim(htmlspecialchars($_POST['post_publie']));
	$data['post_date'] = trim(htmlspecialchars($_POST['post_date']));
	$data['user_id'] = (int) trim(htmlspecialchars($_POST['user_id']));
	$data['post_img'] = $_FILES['new_img']['name'];
	$postData = new Post($data);
	$post->insertPost($postData);
	$_SESSION['success'] = "Le post a bien été créé";
	if($post->uploadImgPost($data['post_img']) === True) {
		$_SESSION['success'] .= " et l'image a bien été téléchargée";
	} else {
		$_SESSION['error'] .= " mais l'image n'a pas été téléchargée";
	}
	header('location:../admin/post/insertPost.php');
	} else {
	$_SESSION['error'] = "Le Post est incomplet";
	header('location:../admin/post/insertPost.php');
	}
}

if(isset($_POST['submitUpdatePost'])) {
	if(isset($_POST['post_id']) AND isset($_POST['post_title']) AND isset($_POST['post_text']) AND isset($_POST['post_publie']) AND isset($_POST['post_date']) AND isset($_POST['user_id']) AND isset($_POST['old_img'])) {
		// Récupération des données du formulaire
		$data['post_id'] = (int) trim(htmlspecialchars($_POST['post_id']));
		$data['post_title'] = trim(htmlspecialchars($_POST['post_title']));
		$data['post_text'] = trim(htmlspecialchars($_POST['post_text']));
		$data['post_publie'] = (int) trim(htmlspecialchars($_POST['post_publie']));
		$data['post_date'] = trim(htmlspecialchars($_POST['post_date']));
		$data['user_id'] = (int) trim(htmlspecialchars($_POST['user_id']));
		$old_img= $_POST['old_img'];
		$new_img = $_FILES['new_img']['name'];
		$post_img = "";
		if($new_img != null) {
			$data['post_img'] = $new_img;
		} else {
			$data['post_img'] = $old_img;
		}
		$postData = new Post($data);
		$post->updatePost($postData);
		$_SESSION['success'] = "Le post a bien été modifié";
		if($post->uploadImgPost($data['post_img']) === True) {
			$data['post_img'] = $_FILES['new_img']['name'];
			$_SESSION['success'] .= " et l'image a bien été téléchargée";
		} else {
			$_SESSION['error'] .= " mais l'image n'a pas été téléchargée";
		}
		header('location:../admin/post/updatePost.php?post_id='. $data['post_id']);
	} else {
		$_SESSION['error'] = "Le post n'a pas été modifié, une erreur est survenue !";
		header('location:../admin/post/updatePost.php?post_id='. $data['post_id']);
	}
}