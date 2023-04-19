<?php	// changed: 22.01.30

function stripped_tpl_youarehere($sep = null, $return = false) {
	$tmp = tpl_youarehere($sep, true);
	return substr($tmp, strpos($tmp, '</span>'));
}