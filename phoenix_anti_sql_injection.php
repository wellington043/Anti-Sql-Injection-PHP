<?php 

/* 
	|--------------------------------------------------------------------------------|
	ANTI SQL INJECTION V1 BY: Gabriel Aparecido - (Phoenix) 
	GITHUB: https://github.com/Phoenix-code21
	|--------------------------------------------------------------------------------|
	I edit New Version (V2) 
		--update preg_replace to accept email/url/name/numbers
		--upgraded to a single function, better performance and more readable
		
	
	Como usar?
	R: abra o index.php ou arquivo principal do seu site/sistema e inclua esse script na primeira linha
	de código.

	Você desabilitar a função ANTI INJECTION inserindo o nome do campo dentro
	da matriz allowFieldPOST ou allowFieldGET
*/


$allowFieldPOST = [
  'array-names-exemple',
];

$allowFieldGET = [];

function cleanInputData($data, $allowedFields)
{
  $cleanedData = [];

  foreach ($data as $key => $value) {
    if (!in_array($key, $allowedFields)) {
      $cleanedData[$key] = (is_numeric($value)) ? $value : preg_replace('/[^a-z A-Z0-9\/:.,_@-]/', '', $value);
    } else {
      $cleanedData[$key] = $value;
    }
  }

  return $cleanedData;
}

$_POST = cleanInputData($_POST, $allowFieldPOST);
$_GET = cleanInputData($_GET, $allowFieldGET);

