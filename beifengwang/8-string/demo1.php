<?php
     $str = '<strong>我是吴祁！\n \/</strong> ';
     //echo trim($str)
     echo htmlentities($str);
     echo htmlspecialchars('<strong>我是吴祁！\n \/</strong>') ;
     echo strip_tags('<strong>我是吴祁！</strong>'); //去掉了<strong>
     
     $str = "Is your name O'reilly?";
    // 输出：Is your name O\'reilly?
     
     echo '<br/>';
    $input = "Alien";
    //echo str_pad($input, 10);                      // produces "Alien     "
    //echo str_pad($input, 10, "-=", STR_PAD_LEFT);  // produces "-=-=-Alien"
    // echo str_pad($input, 10, "_", STR_PAD_BOTH);   // produces "__Alien___"
    echo str_pad($input, 6 , "___");  

