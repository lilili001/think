<?php
//ƥ��ȫ�� ƥ��ģʽ�����г��֣�preg_match_all()�������ַ�����ƥ��ģʽ�����г��֣�Ȼ����
//��ƥ�䵽��ȫ���������顣
preg_match_all('/php[1-6]/','php5sdfphp4sdflljkphp3sdlfjphp2',$out);
echo '<pre>';
print_r($out);
echo '</pre>';