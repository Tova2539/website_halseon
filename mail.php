<? php
  $firstName = $_POST['firstName'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $business = $_POST['business'];
  $message = $_POST['message'];
  header('Content-Type: application/json');
  if ($firstName === '') {
    print json_encode(array('message' => 'First name cannot be empty', 'code' => 0));
    exit();
  }
  if ($surname === '') {
    print json_encode(array('message' => 'Surname cannot be empty', 'code' => 0));
    exit();
  }
  if ($email === '') {
    print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
    exit();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
      exit();
    }
  }
  if ($phone === '') {
    print json_encode(array('message' => 'Phone cannot be empty', 'code' => 0));
    exit();
  }
  if ($business === '') {
    print json_encode(array('message' => 'Business cannot be empty', 'code' => 0));
    exit();
  }
  $content = "From: $firstName $surname \nEmail: $email \nPhone: $phone \nBusiness: $business \nMessage: $message";
  $recipient = "zack@halseon.com";
  $mailheader = "From: [HALSEON WEBSITE]$email \r\n";
  mail($recipient, '[WEBSITE] Halseon Inquiry', $content, $mailheader) or die("Error!");
  print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
  exit();
?>