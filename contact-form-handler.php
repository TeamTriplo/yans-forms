<?php

function validate_form($firstname, $lastname, $email_from, $phone, $comments) {
  $errors = [];
  if (!$firstname || strlen($firstname) < 2 || strlen($firstname) > 40) {
    $errors['Invalid first name'];
  }
  if (!$lastname || strlen($lastname) < 2 || strlen($lastname) > 40) {
    $errors['Invalid last name'];
  }
  if (!$email_from) {
    $errors[] = 'Invalid email address';
  }
  if ($phone && (strlen($phone) < 7 || strlen($phone) > 20)) {
    $errors[] = 'Invalid phone number';
  }
  if ($comments) {
    if (strlen($comments) < 2) {
      $errors[] = 'Comments missing or too short.';
    }
    else {
      if (strlen($comments) > 2000) {
        $errors[] = 'Comments too long.';
      }
    }
  }
  return $errors;
}

function send_contact_form($firstname, $lastname, $email_from, $phone, $comments) {
  // $email_to = "help@yansplace.com";// your email address
  $email_to = "dradcliffe@gmail.com";
  $email_subject = "Yan's Place Contact Form";// email subject line
  $email_message = "Form details below.\r\n";

  $email_message .= "First Name: $firstname).\r\n";
  $email_message .= "Last Name: $lastname.\r\n";
  $email_message .= "Email: $email_from.\r\n";
  $email_message .= "Phone: $phone.\r\n";
  $email_message .= "Comments: $comments.\r\n";

  $headers = 'From: ' . $email_from."\r\n".
    'Reply-To: '.$email_from."\r\n".
    'X-Mailer: PHP/'.phpversion();

  mail($email_to, $email_subject, $email_message, $headers);
}

function sanitize_string($string) {
  return filter_var(trim($string), FILTER_SANITIZE_STRING,
    FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['url']) && $_POST['url'] != '') {
    $firstname = sanitize_string($_POST['firstname']);
    $lastname = sanitize_string($_POST['lastname']);
    $email_from = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = sanitize_string($_POST['phone']);
    $comments = sanitize_string($_POST['comments']);
    $errors = validate_form($firstname, $lastname, $email_from, $phone, $comments);

    if (count($errors) === 0) {
      send_contact_form($firstname, $lastname, $email_from, $phone, $comments);
    } else {
      http_response_code(400);
      die();
    }
  }
}