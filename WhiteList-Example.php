<?php

$except = array("rar", "zip", "mp3", "mp4", "png", "gif", "jpg", "bmp", "avi");
$imp = implode('|', $except);

foreach($files as $file)
    {
        if (preg_match('/^.*\.('.$imp. ')', $file)) 
            {
                echo $file;
                exit;
            }
    }

// It validates that the filename contains ( .jpg ) but doesn't validate that the filename ends with ( .jpg )

// So file like "shell.jpg.php" will be Accepted :O

// Mitigation:


$except = array("rar", "zip", "mp3", "mp4", "png", "gif", "jpg", "bmp", "avi");
$imp = implode('|', $except);

$pattern = '/^.+\.(?:' . $imp . ')$/i'; // Match extensions at the end (case-insensitive) || Mitigation Line:)

foreach ($files as $file) 
    {
        if (preg_match($pattern, $file)) 
            {
                echo $file;
                exit;
            }
    }


// @AbdelzaherKH
?>