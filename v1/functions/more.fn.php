<?php
function coupeChaine($chaine, $nbMaxCaracteres = 300) {
	if (strlen($chaine) > $nbMaxCaracteres) {
		while ($chaine{$nbMaxCaracteres} != ' ') {
			$nbMaxCaracteres++;
		}
		return substr($chaine, 0, $nbMaxCaracteres);
	}
	else {
		return $chaine;
	}
}
?>