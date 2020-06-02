<?php
// Load in mailchimp library
include('./MailChimp.php');

// Namespace defined in MailChimp.php
use \DrewM\MailChimp\MailChimp;

// Connect to MailChimp
$MailChimp = new MailChimp('INSERT_API_KEY'); // API Key
$list = 'INSERT_LIST_ID'; // List ID
$email = $_GET['EMAIL']; // Get email address from FORM
$id = md5(strtolower($email)); // Encrypt the email address
$interest = $_GET['NAME']; // Get ID specific for groups from the form.

// Setup Interests
$mergeInterest = array(
   $interest => true,
);

// Remove empty interests
$mergeInterest = array_filter($mergeInterest);

$result = $MailChimp->put("lists/$list/members/$id", array(
   'email_address'     => $email,
   'status'            => 'subscribed',
   'interests'         => $mergeInterest,
   'update_existing'   => true, // YES, update old subscribers!
));

echo json_encode($result);