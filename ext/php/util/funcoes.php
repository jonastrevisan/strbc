<?
//Funcao converte string qualquer para string utf-8
function _convert($content) {
			if(!mb_check_encoding($content, 'UTF-8')
				OR !($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32'))) {
		
				$content = mb_convert_encoding($content, 'UTF-8');
		
				if (mb_check_encoding($content, 'UTF-8')) {
					// log('Converted to UTF-8');
				} else {
					// log('Could not converted to UTF-8');
				}
			}
			return $content;
		} 

//Funcao converte array x determinada chave para utf-8		
function convertArrayKeysToUtf8(array $array, $secondkey) {
			 foreach($array as $key => $value){
				 $array[$key][$secondkey] = _convert($array[$key][$secondkey]);
			 }
			return $array;
  		 } 

//Funcao padarao para converter array do banco tabela socios para utf8
function convertSociosToUtf8(array $array){
	$array = convertArrayKeysToUtf8($array, 'nome');
	$array = convertArrayKeysToUtf8($array, 'naturalidade');
	$array = convertArrayKeysToUtf8($array, 'pai');
	$array = convertArrayKeysToUtf8($array, 'naturalidadepai');
	$array = convertArrayKeysToUtf8($array, 'mae');
	$array = convertArrayKeysToUtf8($array, 'naturalidademae');
	$array = convertArrayKeysToUtf8($array, 'propriedade1');
	$array = convertArrayKeysToUtf8($array, 'proprietario1');
	$array = convertArrayKeysToUtf8($array, 'endereco1');
	$array = convertArrayKeysToUtf8($array, 'propriedade2');
	$array = convertArrayKeysToUtf8($array, 'proprietario2');
	$array = convertArrayKeysToUtf8($array, 'endereco2');
	$array = convertArrayKeysToUtf8($array, 'nomedependente1');
	$array = convertArrayKeysToUtf8($array, 'nomedependente2');
	$array = convertArrayKeysToUtf8($array, 'nomedependente3');
	$array = convertArrayKeysToUtf8($array, 'nomedependente4');
	$array = convertArrayKeysToUtf8($array, 'nomedependente5');
	$array = convertArrayKeysToUtf8($array, 'nomedependente6');
	$array = convertArrayKeysToUtf8($array, 'parentesco1');
	$array = convertArrayKeysToUtf8($array, 'parentesco2');
	$array = convertArrayKeysToUtf8($array, 'parentesco3');
	$array = convertArrayKeysToUtf8($array, 'parentesco4');
	$array = convertArrayKeysToUtf8($array, 'parentesco5');
	$array = convertArrayKeysToUtf8($array, 'parentesco6');
	$array = convertArrayKeysToUtf8($array, 'obs');
	return $array;	
}
         
?>