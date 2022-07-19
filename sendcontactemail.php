<?PHP
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );

    $inject = join('|', $injections);
    $inject = "/$inject/i";

    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

$name = $_POST['demo-name'];
$email = $_POST['demo-email'];
$message = $_POST['demo-message'];


$to = "myemail@gmail.com";
$subject = "New Email Address for Mailing List";
$headers = "From: $email\n";

Email Address: $email";
$user = "$email";
$usersubject = "Thank You";
$userheaders = "From: you@youremailaddress.com\n";
$usermessage = "Thank you for submitting this form. I will reply as soon as possible. Here are the values you submitted: Name:$name Message:$message";


if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}
if(IsInjected($name))
{
    echo "Bad name value!";
    exit;
}

mail($to,$subject,$message,$headers);
//mail($user,$usersubject,$usermessage,$userheaders);
?>
