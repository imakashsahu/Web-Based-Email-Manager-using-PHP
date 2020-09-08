<?php
// PHP CODE TO GET THE REPORT BASED ON ID
// Make Changes to the DB name
$connect = new PDO("mysql:host=localhost;dbname=mediadb", "root", "");

$id = $_GET['id']; // Get id from URL

$count=$connect->prepare("select * from tbl_inaccuracy where issue_id=:id");
$count->bindParam(":id",$id,PDO::PARAM_INT,1);

if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
// print_r($row);

$issue_subject = 'Re: '.$row->issue_title;

}else{
print_r($connect->errorInfo()); 
}
?>

<?php
// PHP CODE TO REPLY MAIL BASED ON ID
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
	$mail->Password = 'password'; // Add your password Here
	$mail->SMTPSecure = 'tls';
	$mail->SetFrom('no-reply@akash.com');
	$mail->FromName = 'No-Reply xyz company';
	$mail->AddAddress($_POST["receiver_email"]);
	$mail->IsHTML(true);
	$mail->Subject = $_POST['email_subject'];

	$track_code = md5(rand());

	$message_body = $_POST['email_body'];

    // EMAIL SIGNATURE
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

    // Insert in to the Table
	if($mail->Send())
	{
		$data = array(
            ':issue_id'                 =>      $id,
			':issue_title'			    =>		$_POST["email_subject"],
			':description'				=>		$_POST["email_body"],
            ':reported_user_email'		=>		$_POST["receiver_email"],
            
		);
		$query = "
		INSERT INTO tbl_inaccuracy_reply
		(issue_id, issue_title, description, reported_user_email) VALUES 
		(:issue_id, :issue_title, :description, :reported_user_email)
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

// Fetch reply from table
function fetch_email_track_data($connect)
{
    $id = $_GET['id']; // Get id from URL

    // $query = "SELECT * FROM tbl_inaccuracy_reply ORDER BY date_created";
    $query = "SELECT * FROM tbl_inaccuracy_reply WHERE issue_id=:id";
    $statement = $connect->prepare($query);
    $statement->bindParam(":id",$id,PDO::PARAM_INT,1);

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
					<td>'.$row["reported_user_email"].'</td>
					<td>'.$row["issue_title"].'</td>
					<td>'.$row["date_created"].'</td>
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

        <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
        </style>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 style="text-align:center">Send and Track Email using PHP</h3>
			<br />
            <div>
                <h5>ISSUE TITLE :</h5>
                <p><?php echo $issue_subject?></P>
                <br>
                <h5>ISSUE FOR :</h5>
                <p><?php echo $row->issue_for?></P>
                <br>
                <h5>DESCRIPTION :</h5>
                <p><?php echo $row->description?></P>
                <br>
            </div>
			<?php
			// Status of the Reply Sent or Not
			echo $message;

			?>

            <!-- Trigger/Open The Modal -->
            <button class="btn btn-info" id="myBtn">SEND REPLY</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                <form method="post">
                    <div class="form-group">
                        <label>Enter Email Subject</label>
                        <input type="text" name="email_subject" class="form-control" value="<?php echo $issue_subject?>" />
                    </div>
                    <div class="form-group">
                        <label>Enter Receiver Email</label>
                        <input type="email" name="receiver_email" class="form-control" value="<?php echo $row->reported_user_email?>" />
                    </div>
                    <div class="form-group">
                        <label>Enter Email Body</label>
                        <textarea name="email_body" required rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="btn btn-info" value="Send Email" />
                    </div>
                </form>
            </div>
            </div>
			
			<br />
			<h4 style="text-align:center">Track Sent Email</h4>
            <br />
			<?php 
			
			echo fetch_email_track_data($connect);

			?>
		</div>
		<br />
		<br />

        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
        </script>
	</body>
</html>