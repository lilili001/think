<?php

	//̰���ͷ����ȡ�İ���,ubb

	//��Ҫ�����[b][/b]����<strong>php5</strong>
	
	//ע��һ�����⣬���ʱ���[]�����ţ����ַ��е����ţ��������﷨[a-z]
	
	//.��ʾƥ�������ַ�һ��������һ��*�ű�ʾƥ��������߶��
	
	//�����ŷ�Ϊ������ô��һ�����\1,�ڶ������\2�����������\3
	
	//Ŀǰֻ��1�⣬\1
	
	//Ϊʲô����û�����أ�
	
	//��һ���⣺��һ��[b]�����һ��[\b]ƥ����
	
	//���̰�����⡣U

	$mode = '/(\[b\])(.*)(\[\/b\])/U';
	
	$replace = '<strong>\2</strong>';

	$string = 'This is a [b]php5[/b],This is a [b]php4[/b]';
	
	echo preg_replace($mode,$replace,$string);
	

?>