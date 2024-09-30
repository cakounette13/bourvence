<?php
session_start();
require('../connect.php');
require('../class/Contact.php');
require('../class/ContactManager.php');

$contacts = new ContactManager($db);

if(isset($_POST['submitContactForm'])) {
	if(isset($_POST['contact_name']) AND !empty($_POST['contact_name']) AND isset($_POST['contact_prenom']) AND !empty($_POST['contact_prenom']) AND isset($_POST['contact_email']) AND !empty($_POST['contact_email']) AND isset($_POST['contact_msg']) AND !empty($_POST['contact_msg']) AND !is_null($_POST['date_msg'] AND !empty($_POST['date_msg']))) {
		// récupération des informations du formulaire
		$nb =  $contacts->getNbContact();
		$data['contact_id'] = $nb['nb_contact'] + 1;
		$data['contact_name'] = trim(htmlspecialchars($_POST['contact_name']));
		$data['contact_prenom'] = trim(htmlspecialchars($_POST['contact_prenom']));
		$data['contact_email'] = trim(htmlspecialchars($_POST['contact_email']));
		$data['contact_msg'] = trim(htmlspecialchars($_POST['contact_msg']));
		$data['date_msg'] = $_POST['date_msg'];
		// Construction envoi mail en html
		$to = WEB_DIR_MAIL;
		$subject = "Envoi Message Contact du Site";
		$message = $_POST['contact_msg'];
		$headers = "Content-type: text/plain; charset=utf-8\r\n";
		$headers .= "From: cavebourvence@gmail.com";
		$contactData = new Contact($data);
		$result = $contacts->insertContact($contactData);
		if(mail($to, $subject , $message , $headers)) {
			$_SESSION['success'] = "Le message a bien été envoyé";
			header('location:../index.php');
		} else {
			$_SESSION['error'] = "Le message n'a pu aboutir. Veuillez réessayer";
			header('location:../views/contact.php');
		}
	} else {
		$_SESSION['error'] = "Le message est incomplet";
		header('location:../views/contact.php');
	}
}