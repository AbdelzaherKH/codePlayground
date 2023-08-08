<?php

$directory = 'D/CyberSecurity/codePlayground';
$files = scandir($directory);

foreach ($files as $file) {
    
    if (preg_match('/^.*\.(php|php1|php2|php3|php4|php5|php6|php7|phtml|exe)$/', $file))
        {
            echo "Bad Hacker!";
            header("Location: http://badHacker.com/");
            exit; // Exit the loop and script to prevent further execution
        }
}

//     > previous code not validate case sensitive Mitigation
//    
//     > Mitigation:

$directory = 'D/CyberSecurity/codePlayground';
$files = scandir($directory);
$blacklist = array('php', 'php1', 'php2', 'php3', 'php4', 'php5', 'php6', 'php7', 'phtml', 'exe');
$fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));// Mitigation Line :)

foreach ($files as $file) {

    if (in_array($fileExtension, $blacklist)) {
        echo "Bad Hacker!";
        header("Location: http://badHacker.com/");
        exit;
    }
}


// @AbdelzaherKH
?>