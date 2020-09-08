# Web Based Email Manager using PHP
This is web based email manager build using php to run and store all the unseen latest emails on to the database and then open the email and reply to the same email trail/thread and track the replies by storing in the database.

## Technology Used 
- IMAP
    The IMAP abbreviation stands for Internet Message Access Protocol and is one of the two most popular protocols for receiving email messages from the Internet

- SMTP
    SMTP handles your outgoing mail. Your email application connects to your mail server via SMTP and sends the messages. 

## Grant Access to use your EMail
- https://myaccount.google.com/lesssecureapps?pli=1     !! If your account doesn't have 2 step verification
- https://support.google.com/mail/answer/185833?hl=en-GB  !! If your account has 2 Step Verification

## Files Included
- PHPMailer 
    This is the Library used to get the SMTP module to send emails to the desired email ID.

- mediadb.sql
    This is the SQL file which contains the 2 sql tables to store the inbox emails as well as the reply for the emails.

## Steps to Setup the Web APP
1. Grant access to use the third party app using the above link
2. Import the *SQL DB* using *PHPMyAdmin*
3. Add your *Email Id* and *Password* where ever necessary in the 3 file i.e. *get_email.php*, *index.php*, *issue.php*
4. Run the *get_email.php* file to fetch the unseen emails from your inbox OR change **UNSEEN** to **ALL** in this file to fetch all the emails from your inbox.
    [Email with Subject *Inaccuracy reported for reporter Xyz ID:123456* are broke to part and stored in DB]
5. Open the *index.php* file to see all the fetched and stored email from DB
6. Click on a EMail subject to open and view the email feed
7. Click on *reply* to reply to the same email and follow mail thread
8. The reply would be saved in the DB and shown below in a Tabular Format

## NOTE VERY IMP (REPLY MAIL THREAD)
To reply to the same mail thread
use ***RE:*** as prefix with the same subject of the email
