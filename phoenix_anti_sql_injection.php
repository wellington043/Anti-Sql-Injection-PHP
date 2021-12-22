<?php 

/* 
	|--------------------------------------------------------------------------------|

	ANTI SQL INJECTION BY: Gabriel Aparecido - (Phoenix) 
	GITHUB: https://github.com/Phoenix-code21
	YOUTUBE CHANNEL: https://www.youtube.com/channel/UCz-Xh2q3iFgpwi-QpJPjSsw

	|---------------------------------------------------------------------------------|

	Como usar?
	R: abra o index.php ou arquivo principal do seu site/sistema e inclua esse script na primeira linha
	de código.

	require_once 'phoenix_anti_sql_injection.php'

*/

/* 
	Você desabilitar a função ANTI INJECTION inserindo o nome do campo dentro
	da matriz allowFieldPOST ou allowFieldGET
*/

$allowFieldPOST = array(
	'texto',
	'titulo',
	'senha',
);

$allowFieldGET = array(
	'url'
);

if(isset($_POST)){
	foreach($_POST as $key => $value){
		if(!in_array($key,$allowFieldPOST)){
			if(!is_numeric($_POST[$key])){
				$_POST[$key] =  preg_replace('/[^[:alpha:]_]/', '',$value);
			}else{
				$_POST[$key] = $value;
			}
		}else{
			$_POST[$key] = $value;
		}
	}
}

if(isset($_GET)){
	foreach($_GET as $key => $value){
		if(!in_array($key,$allowFieldGET)){
			if(!is_numeric($_GET[$key])){
				$_GET[$key] = preg_replace('/[^[:alpha:]_]/', '',$value);
			}else{
				$_GET[$key] = $value;
			}
		}else{
			$_GET[$key] = $value;
		}
	}
}