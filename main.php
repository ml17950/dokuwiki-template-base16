<?php	// changed: 22.02.01

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */

@require_once(dirname(__FILE__).'/tpl_functions.php');

// #############################################################################
// defines and configuration
// #############################################################################
$websiteHome	= wl();
$websiteTitle	= strip_tags($conf['title']);
$websiteTagline	= $conf['tagline'];
$templateScheme = tpl_getConf('shell_scheme', 'monokai');
$showYouAreHere = ($conf['youarehere']==0) ? false : true;
$showBreadcrumb = ($conf['breadcrumbs']==0) ? false : true;
$hasSidebar		= page_findnearest($conf['sidebar']) && ($ACT=='show');
$hasFooter		= page_findnearest($conf['footer']);
$pageEditable	= ($INFO['editable']==1) ? true : false;
$isLoggedId		= isset($INFO['userinfo']['name']);


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// DEV STUFF
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// msg("Test Message error", -1);
// msg("Test Message info", 0);
// msg("Test Message success", 1);
// msg("Test Message notify", 2);


// #############################################################################
// html header
// #############################################################################
echo "<!DOCTYPE html>\n";
echo "<html lang='",$conf['lang'],"' dir='",$lang['direction'],"' class='no-js'>\n";
echo "<head>\n";
echo "<meta charset='utf-8' />\n";
echo "<meta name='viewport' content='width=device-width,initial-scale=1' />\n";
echo "<title>",$pageTitle," [",$websiteTitle,"]</title>\n";
tpl_metaheaders(); // TODO
echo tpl_favicon(array('favicon', 'mobile'));

echo "</head>\n";

// #############################################################################
// html body
// #############################################################################
echo "<body id='dokuwiki__top' class='scheme-",$templateScheme,"'>\n";
echo "<div class='body-wrapper'>\n";


echo "<div class='page-header'>\n";

echo "<div class='header-content'>\n";
echo "<div class='header-title'>",tpl_link($websiteHome,$websiteTitle,'', true),"</div>\n";
if (!empty($websiteTagline))
	echo "<div class='header-tagline'>",$websiteTagline,"</div>\n";
echo "</div>\n"; // .header-content

echo "<div class='header-search'>";
tpl_searchform(false, false);
echo "</div>\n"; // .header-search

echo "</div>\n"; // .page-header

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

echo "<div class='page-main'>\n";

echo "<div class='lspacer'>\n";
echo "lspacer";
// echo "<div class='sidebar-left'>\n";
// echo "left"; 
// echo tpl_include_page($conf['sidebar'], false, true);
// echo "</div>\n"; // .sidebar-left


echo "</div>\n"; // .lspacer

echo "<div class='mid-content'>\n";

	if (($showYouAreHere) || ($showBreadcrumb)) {
		echo "<div class='main-navigation'>";
			if ($showYouAreHere) {
				if ($adminArea)
					echo "<div class='main-youarehere'>",tpl_adminyouarehere(null, true),"</div>\n"; // .main-youarehere
				else
					echo "<div class='main-youarehere'>",stripped_tpl_youarehere(null, true),"</div>\n"; // .main-youarehere
			}
			if ($showBreadcrumb)
				echo "<div class='main-breadcrumb'>",tpl_breadcrumbs(null, true),"</div>\n"; // .main-breadcrumb
		echo "</div>\n"; // .main-navigation
	}

	if (isset($GLOBALS['MSG']))
		echo "<div class='main-messages'>",html_msgarea(),"</div>\n"; // .theme-messages

	echo "<div class='main-content'>";
	tpl_content(false);
	echo "</div>\n"; // .theme-content

echo "</div>\n"; // .mid-content

echo "<div class='rspacer'>\n";
echo "rspacer";

// echo "<div class='sidebar-right'>\n";
// echo "right";
// echo "</div>\n"; // .sidebar-right

echo "</div>\n"; // .rspacer

echo "</div>\n"; // .page-main

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

echo "<div class='page-footer'>\n";

echo "<div class='footer-spacer'></div>\n"; // .footer-spacer

echo "<div class='footer-content'>\n";
if ($hasFooter) {
	// echo tpl_include_page($conf['sidebar'], false, true);
	echo "footer-content · ";
}
echo tpl_pageinfo(true);
if ($isLoggedId)
	echo " · <a href='?do=admin'>Admin</a>";
else
	echo " · <a href='?do=login'>Login</a>";
if ($pageEditable)
	echo " · <a href='?do=edit'>Edit</a>";
echo "</div>\n"; // .footer-content

echo "</div>\n"; // .page-footer

// #############################################################################
// admin stuff
// #############################################################################

// echo "<pre>";
// echo highlight_string(print_r($INFO, true));
// echo highlight_string(print_r($conf, true));
// echo highlight_string(print_r($_COOKIE, true));
// echo highlight_string(print_r($_SESSION, true));
// echo "</pre>";

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// DEV STUFF
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo "<br><br><br>";
echo "<div style='max-width: 640px; margin: 20px auto;'>";
echo "<h1>",$templateScheme,"</h1>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--pribg);'> pribg </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--secbg);'> secbg </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--grey1);'> grey1 </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--grey2);'> grey2 </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--grey3);'> grey3 </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--grey4);'> grey4 </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--prifg);'> prifg </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--secfg);'> secfg </div>";
echo "<br>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--red);'> red </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--orange);'> orange </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--yellow);'> yellow </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--green);'> green </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--cyan);'> cyan </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--blue);'> blue </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--pink);'> pink </div>";
echo "<div style='display: inline-block; width: 50px; text-align: center; padding: 25px 10px; margin: 5px; background: var(--other);'> other </div>";
echo "</div>";

// #############################################################################
// html footer
// #############################################################################
echo "</div>\n"; // .body-wrapper
echo "</body>\n";
echo "</html>";