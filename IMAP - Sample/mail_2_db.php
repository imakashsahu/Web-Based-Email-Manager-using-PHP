<?php
// Make Changes to the DB name
$conn = new PDO("mysql:host=localhost;dbname=email2", "root", "");

$hostname = "{imap.gmail.com:993/imap/ssl}INBOX";
$username = "your-email-address@gmail.com";
$password = "your-password";
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
$emails = imap_search($inbox,'UNSEEN');
if($emails) {
    $output = '';
    rsort($emails);
    foreach($emails as $mail) {
        $headerInfo = imap_headerinfo($inbox,$mail);
        $overview = imap_fetch_overview($inbox,$mail,0);
        $message = imap_fetchbody($inbox,$mail,2);
        $output .= ($overview[0]->seen ? 'read' : 'unread').'
        ';
        $output .= $headerInfo->subject.'
        ';
        $output .= $headerInfo->toaddress.'
        ';
        $output .= $headerInfo->date.'
        ';
        $output .= $headerInfo->reply_to[0]->mailbox.'@'.$headerInfo->reply_to[0]->host.'
        ';
        $output .= $headerInfo->reply_toaddress.'
        ';
        $output.= '

        '.$message.'
        ';

        $emailStructure = imap_fetchstructure($inbox,$mail);

        echo $output;
        $output = '';

        // Insert into the DB the Email Details
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO email_in (email_sub)
        VALUES ('$headerInfo->subject')
        ";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
    }
}
else {
    print_r('no new mail found');
}
imap_close($inbox);
?>