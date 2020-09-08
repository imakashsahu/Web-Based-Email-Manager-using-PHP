<?php
// Make Changes to the DB name here
$conn = new PDO("mysql:host=localhost;dbname=mediadb", "root", "");

$hostname = "{imap.gmail.com:993/imap/ssl}INBOX";
$username = "your-email-address@gmail.com";
$password = "your-password";
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
$emails = imap_search($inbox,'UNSEEN');
if($emails) {
    rsort($emails);
    $i=1;
    foreach($emails as $mail) {
        $headerInfo = imap_headerinfo($inbox,$mail);
        $overview = imap_fetch_overview($inbox,$mail,0);
        $message = imap_fetchbody($inbox,$mail,1);
        $emailStructure = imap_fetchstructure($inbox,$mail);

        $message = str_replace("'","''",strip_tags($message));

        $messageExcerpt = substr($message, 0, 150);
        $partialMessage = trim(quoted_printable_decode($messageExcerpt)); 
        $date = date("Y-m-d H:i:s", strtotime($overview[0]->date));
                
        $pos = strpos(strtolower($overview[0]->subject), "for reporter");
                
                
        $reporter_id = '0';
        $outlet_id = '0';
                
        if ($pos !== false) {
            $for = 'Reporters';
            $r_id = explode("ID:",$overview[0]->subject);
            $reporter_id = $r_id[1];
        }
        else
        {
            $for = 'Outlets';
            $o_id = explode("ID:",$overview[0]->subject);
            $outlet_id = $o_id[1];
        }

        // Insert into the DB the Email Details
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql =  "INSERT INTO tbl_inaccuracy 
        values('".$i."','".$for."','".$reporter_id."','".$outlet_id."','".$overview[0]->subject."','".$partialMessage."','".$date."','".date("Y-m-d H:i:s")."',NULL,'Reported','".$headerInfo->reply_to[0]->personal."','".$headerInfo->reply_to[0]->mailbox.'@'.$headerInfo->reply_to[0]->host."','".$headerInfo->to[0]->personal."');";
        
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";

        // Increment the 
        $i++;
    }
}
else {
    print_r('no new mail found');
}
imap_close($inbox);
?>