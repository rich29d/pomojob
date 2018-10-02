{"aaData": [
				
			
<?php
	for($i=0; $i<count($lista); $i++){
		echo '[';
		$quant = count($lista[$i]);
		foreach($lista[$i] as $dado){
			echo  (--$quant != 0 ? "," : "") . "\"$dado\"";				
		}
		echo $i != count($lista)-1 ? '],' : ']';
	}
?>

]}