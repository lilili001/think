<?php
//perl�����

//����������ƥ�������ַ��� preg_grep()
$l = array( 'php','asp','jsp','python','ruby' );
$a = preg_grep( '/p$/',$l );
print_r($a);