<?php


	$week = 11;
    switch ($week) {
        case '1': //没有break 会一直往下执行,如果没有Break 用来设置多个值来执行同一段代码
		case '11':
		case '111':
		case '1111':
            echo "周一";
            break;
		case '2':
            echo "Tuesday";
            break;
		case '3':
            echo "Thirdsday";
            break;
		case '4':
            echo "fourthday";
            break;
		case '5':
            echo "friday";
            break;
		case '6':
            echo "sataday";
            break;
        
        default:
            echo "sunday";
            break;
    }