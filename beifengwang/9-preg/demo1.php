<?php
//��ͨƥ��������ƥ��
//$m = '/abc/';
//$s = 'abc';���� 'abcd',����Ҫ����abc


/***************** 1- h+ ƥ��ǰ���ַ�,����һ��   1-n *****************************/

$model = '/ph+p/';//+ ����+ǰ��������һ��h
$string = 'thinkphhhhhp';
echo '1:'. preg_match( $model,$string ).'<br/>';
//��� ƥ��

/***************** 2- h* ƥ��ǰ���ַ�,����0��   0-n *****************************/
//* ���� /p ���������0-���h  p/,���Ǳ�����/p p/�м� ǰ����Ҫƥ���
//*��Ȼ����ƥ�� 0-n�������� ǰ���ַ����ܸ��� ���˾Ͳ�ƥ���� /pop/ �Ͳ�ƥ��
$model1 = '/ph*p/';
$string1 = 'thinkpp';
echo  '2:'.preg_match( $model1,$string1 ).'<br/>';//1
//ƥ���� thinkphp thinkpp thinkphhhhhp

/***************** 3- h?  ƥ��ǰ���ַ�,0-1 *****************************/
$model2 = '/ph?p/';
$string2 = 'thinkphp';
echo  '3:'.preg_match( $model2,$string2 ).'<br/>';//1
//ƥ���� thinkphp thinkpp

/***************** .  ƥ�������ַ��� .ƥ������һ���ַ� ���������� ������Ҳ�����ַ� *****************************/
$model3 = '/p.p/';
$string3 = 'thinkphp';
echo  '4:'.preg_match( $model3,$string3 ).'<br/>';//1
//ƥ���� thinkpop thinkp1p ...

//.* ��ʾǰ�������ַ�����0-n  0���������ַ�
$model4 = '/p.*p/';
$string4 = 'thinkpooisip';
echo  '5:'.preg_match( $model4,$string4 ).'<br/>';//1
//ƥ���� thinkp�������ַ�p

/***************** p{3} ǰ���ַ� ������3�� *****************************/
$model5 = '/ph{3}p/';
$string5 = 'thinkphhhp';
echo  '6:'.preg_match( $model5,$string5 ).'<br/>';//1

/***************** p{3,5} ǰ���ַ� 3-5�� *****************************/
$model6 = '/ph{3,5}p/';
$string6 = 'thinkphhhp';
echo  '7:'.preg_match( $model6,$string6 ).'<br/>';//1
//ƥ���� thinkphhhp thinkphhhhp  thinkphhhhhhp

/***************** p{3,} ǰ���ַ� 3-n ����3�� *****************************/
$model7 = '/ph{3,}p/';
$string7 = 'thinkphhhp';
echo  '8:'.preg_match( $model7,$string7 ).'<br/>';//1
//ƥ���� thinkphhhp thinkphhhhp  thinkphhhhhhp

/***************** $ β�Ϳ�ʼƥ��  ��php��β��ƥ��*****************************/
$model8 = '/php$/';
$string8 = 'thinkphhhpsdfphp';
echo  '9:'.preg_match( $model8,$string8 ).'<br/>';//1
//ƥ���� thinkphhhp thinkphhhhp  thinkphhhhhhp

/*****************^ ��ͷ��ʼƥ��  ��php��ͷ��ƥ��*****************************/
$model9 = '/^php$/';//������php��ͷ �� php��β��
$string9 = 'php';
echo  '10:'.preg_match( $model9,$string9 ).'<br/>';//1

/***************** | ���� ����ѡ�������������һ����ƥ�� *****************************/
$model10 = '/php|asp|jsp/';
$string10 = 'asp';
echo  '11:'.preg_match( $model10,$string10 ).'<br/>';//1
