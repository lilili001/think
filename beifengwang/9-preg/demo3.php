<?php
//���η�

//i:�����ִ�Сд
$m_1 = '/php/i';
$s_1 = 'PHP';
echo  '1:'.preg_match( $m_1,$s_1 ).'<br/>';//1

//m:ƥ����β��ʱ��  ����ʶ�� $s_2 ������,m����ƥ��ÿһ�е�ĩλ��ֻҪ��һ��ĩλƥ���� �ͳɹ�
$m_2 = '/php$/m';
$s_2 = "this is php\n,chao shuai";
echo  '2:'.preg_match( $m_2,$s_2 ).'<br/>';//1

//x:���Թ���ģʽ�еĿհ��ַ�
$m_3 = '/ph p/x';
$s_3 = "php";
echo  '3:'.preg_match( $m_3,$s_3 ).'<br/>';//1

//A��ǿ�ƴ�ͷ��ʼƥ�� �൱�� ^php
$m_4 = '/php/A';
$s_4 = "phpsdfsdf";
echo  '4:'.preg_match( $m_4,$s_4 ).'<br/>';//1