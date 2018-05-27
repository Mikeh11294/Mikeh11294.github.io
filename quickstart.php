<?php
function CountUnreadMail($host, $login, $passwd) {
    $mbox = imap_open($host, $login, $passwd);
    $count = 0;
    if (!$mbox) {
        echo "Error";
    } else {
        $headers = imap_headers($mbox);
        foreach ($headers as $mail) {
            $flags = substr($mail, 0, 4);
            $isunr = (strpos($flags, "U") !== false);
            if ($isunr)
            $count++;
        }
    }

    imap_close($mbox);
    return $count;
}

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'michaelhead1994@gmail.com';
$password = 'NightWatch94!';

$count = CountUnreadMail($hostname, $username, $password);


?>.
