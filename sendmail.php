<?php
$studentemail = htmlspecialchars($_POST['to']);
$subject = "Data webserver";
// $subject = htmlspecialchars($_POST['subject']);
$naam = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>DataWebsite</p>
<table border=\"5\" cellspacing=\"5\" cellpadding=\"5\">
<col width=\"100\" />
<col width=\"100\" />
<col width=\"100\" />
<tr>
<th>Name</th>
<th>Email</th>
<th>reactie</th>
</tr>
<tr>
<td>";
$naam .= htmlspecialchars($_POST['Naam']);
$naam .= "</td>
<td>";
$naam .= htmlspecialchars($_POST['Emailadres']);
$naam .= "</td>
<td>";
$naam .= htmlspecialchars($_POST['reactie']);
$naam .= "
</td>
</tr>
</table>
</body>
</html>
";

// $message= htmlspecialchars($_POST['message']);
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: <info@casper-tm.be>';
$headers[] = 'Cc: info@casper-tm.be';
// using mail function and returns boolean
$send = mail($studentemail, $subject, $naam, implode("\r\n", $headers));
if ($send) {
$response = "Mail sent successfully";
} else {
$response = "Mail not sent";
}
echo json_encode($response);
?>