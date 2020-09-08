<!-- 
    Please Use this Link to grant access from GMAIL to sent mail
    https://myaccount.google.com/lesssecureapps?pli=1     !! IF account doesn't has 2 Step Verification
    https://support.google.com/mail/answer/185833?hl=en-GB  !! For 2 Step Verification accounts follow steps
 -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Make Changes to the DB name
$connect = new PDO("mysql:host=localhost;dbname=email2", "root", "");

$message = '';

if(isset($_POST["send"]))
{
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
	
	$mail = new PHPMailer;
	
	$mail->IsSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '587';
	$mail->SMTPAuth = true;
	$mail->Username = 'your-email-address@gmail.com'; //Add Your Email Address here
	$mail->Password = 'your-password'; // Add your password Here
	$mail->SMTPSecure = 'tls';
	$mail->SetFrom('no-reply@akash.com');
	$mail->FromName = 'No-Reply xyz company';
	$mail->AddAddress($_POST["receiver_email"]);
	$mail->IsHTML(true);
	$mail->Subject = $_POST['email_subject'];

	$track_code = md5(rand());

	$message_body = $_POST['email_body'];

    $message_body .= '<br>-----------<br>
	<table id="zs-output-sig" style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse; width: 550px;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><strong style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; color:	#000000; display: inline;">Thanks & Regards,</strong></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; padding-bottom: 7px; height: 7px;">&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td width="92">
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td style="border-collapse: collapse; line-height: 0px;"><img src="https://www.programmableweb.com/sites/default/files/Critical_Mention_API.png" width="105" height="120" border="0" /></td>
    </tr>
    </tbody>
    </table>
    </td>
    <td style="border-collapse: collapse; padding-right: 7px; width: 7px;" width="7">&nbsp;</td>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 25.0px; font-style: normal; line-height: 32px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 30.0px; font-style: normal; line-height: 32px; font-weight: normal; color: #282828; display: inline;">xyz company</span></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 21.0px; font-style: normal; line-height: 23px; font-weight: bold; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 23px; font-weight: bold; color: #282828; display: inline;">(Title)</span></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;">
    <span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;"><a style="text-decoration: none;" href="#">Website</a></span>
    </td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 14.0px; font-style: normal; line-height: 16px; font-weight: normal; color: #5e4036; display: inline;">Mobile:</span> <span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;">Phone Number</span></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828;"><span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #5e4036; display: inline;">Address:</span> <span style="font-family: Calibri, Helvetica, sans-serif; font-size: 15.0px; font-style: normal; line-height: 17px; font-weight: normal; color: #282828; display: inline;">Location</span></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; padding-bottom: 3px; height: 3px;">&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </td>
    <td style="border-collapse: collapse; padding-right: 8px; width: 8px;">&nbsp;</td>
    <td style="border-collapse: collapse; background-color: #000000; width: 3px;">&nbsp;</td>
    <td style="border-collapse: collapse; padding-right: 8px; width: 8px;">&nbsp;</td>
    <td>
    <table style="font-family: Arial,Helvetica,sans-serif; line-height: 0px; font-size: 1px; padding: 0px; border-spacing: 0px; margin: 0px; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <td><a style="font-size: 0px; line-height: 0px;"  title="Facebook" href="#" rel="nofollow noopener"><img src="https://gimm.io/assets/social/24/171616/04facebook.gif" alt="facebook" width="24" height="24" border="0" /></a></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; padding-bottom: 5px; height: 5px;">&nbsp;</td>
    </tr>
    <tr>
    <td><a style="font-size: 0px; line-height: 0px;"  title="Github" href="#" rel="nofollow noopener"><img src="https://gimm.io/assets/social/24/000000/04github.gif" alt="github" width="24" height="24" border="0" /></a></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; padding-bottom: 5px; height: 5px;">&nbsp;</td>
    </tr>
    <tr>
    <td><a style="font-size: 0px; line-height: 0px;"  title="LinkedIn" href="#" rel="nofollow noopener"><img src="https://gimm.io/assets/social/24/000000/04linkedin.gif" alt="linkedin" width="24" height="24" border="0" /></a></td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; padding-bottom: 5px; height: 5px;">&nbsp;</td>
    </tr>
    <tr>
    <td><a style="font-size: 0px; line-height: 0px;" title="Email" href="mailto:test@criticialmention.com" rel="nofollow"><img src="https://ucarecdn.com/33ed08dc-a3e0-451f-afaf-4091eb842ffb/-/crop/426x280/236,119/-/preview/" alt="https://ucarecdn.com/33ed08dc-a3e0-451f-afaf-4091eb842ffb/-/crop/426x280/236,119/-/preview/" width="26" height="17" border="0" /></a></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    <tr>
    <td style="border-collapse: collapse; padding-bottom: 8px; height: 8px;">&nbsp;</td>
    </tr>
    <tr>
    <td style="border-collapse: collapse;">&nbsp;</td>
    </tr>
    </tbody>
    </table>';

	$mail->Body = $message_body;

	if($mail->Send())
	{
		$data = array(
			':email_subject'			=>		$_POST["email_subject"],
			':email_body'				=>		$_POST["email_body"],
			':email_address'			=>		$_POST["receiver_email"],
		);
		$query = "
		INSERT INTO email_data 
		(email_subject, email_body, email_address) VALUES 
		(:email_subject, :email_body, :email_address)
		";

		$statement = $connect->prepare($query);
		if($statement->execute($data))
		{
			$message = '<label class="text-success">Email Send Successfully</label>';
		}
	}
	else
	{
		$message = '<label class="text-danger">Email Send Unsuccessful</label>';
	}

}

function fetch_email_track_data($connect)
{
	$query = "SELECT * FROM email_data ORDER BY email_id";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th width="30%">Email</th>
				<th width="50%">Subject</th>
				<th width="20%">Sent Datetime</th>
			</tr>
	';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
				<tr>
					<td>'.$row["email_address"].'</td>
					<td>'.$row["email_subject"].'</td>
					<td>'.$row["email_datetime"].'</td>
				</tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
			<td colspan="4" align="center">No Email Send Data Found</td>
		</tr>
		';
	}
	$output .= '</table>';
	return $output;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Email Feature using PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 style="text-align:center">Send and Track Email using PHP</h3>
			<br />
			<?php
			
			echo $message;

			?>
			<form method="post">
				<div class="form-group">
					<label>Enter Email Subject</label>
					<input type="text" name="email_subject" class="form-control" required />
				</div>
				<div class="form-group">
					<label>Enter Receiver Email</label>
					<input type="email" name="receiver_email" class="form-control" required />
				</div>
				<div class="form-group">
					<label>Enter Email Body</label>
					<textarea name="email_body" required rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="send" class="btn btn-info" value="Send Email" />
				</div>
			</form>
			
			<br />
			<h4 style="text-align:center">Track Sent Email</h4>
			<?php 
			
			echo fetch_email_track_data($connect);

			?>
		</div>
		<br />
		<br />
	</body>
</html>