<?php	// changed: 2023-04-19

function tpl_stripped_youarehere($sep = null, $return = false) {
	$tmp = tpl_youarehere($sep, true);
	return substr($tmp, strpos($tmp, '</span>'));
}

function tpl_adminyouarehere($ID, $sep = null, $return = false) {
	global $lang;
	global $conf;

	if(is_null($sep)) $sep = ' &bull; ';

	$out  = '';
	$out .= '<span class="bchead">'.$lang['youarehere'].' </span>';
	$out .= '<span class="home">'.tpl_pagelink(':'.$conf['start'], null, true).'</span>';
	$out .= $sep.'<a class="wikilink1" href="'.wl($ID, 'do=admin').'">Administration</a>';

	$navitems = array(
		'config',
		'extension',
		// 'styling',
		'usermanager',
		'acl',
		// 'popularity',
		// 'revert'
	);
	foreach ($navitems as $navitem) {
		$out .= $sep.'<a class="wikilink1" href="'.wl($ID, 'do=admin&amp;page='.$navitem).'">'.ucfirst($navitem).'</a>';
	}

	if ($return)
		return $out;
	else {
		print $out;
		return true;
	}
}