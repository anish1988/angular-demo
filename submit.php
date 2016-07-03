<?php
$errors = array();
$data = array();
// Getting posted data and decodeing json
$_POST = json_decode(file_get_contents('php://input'), true);

// checking for blank values.
if (empty($_POST['name']))
  $errors['name'] = 'Name is required.';

if (empty($_POST['username']))
  $errors['username'] = 'Username is required.';

if (empty($_POST['email']))
  $errors['email'] = 'Email is required.';

if (!empty($errors)) {
  $data['errors']  = $errors;
} else {
  $data['message'] = 'Form data is going well';
}
// response back.

print_r($_POST);
$data['post']=$_POST;
echo json_encode($data);
?>