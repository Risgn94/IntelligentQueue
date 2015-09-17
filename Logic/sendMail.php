<?php
$to = "asger.thyregod@gmail.com";
$subject = "Request fra rarepepe.org";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Email</th>
<td>" .$_REQUEST['Email']. "</th>
</tr>
<tr>
<th>Navn</td>
<td>" .$_REQUEST['Name']. "</td>
</tr>
<tr>
<th>Subject</td>
<td>" .$_REQUEST['Subject'] . "</td>
</tr>
<tr>
<th>Description</td>
<td>" . $_REQUEST['Description'] . "</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Info@Rarepepe.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
mail($to,$subject,$message,$headers);
echo "<h1>".$_SESSION["last_question"]."</h1>";
?>