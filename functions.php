<?
if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
}

function wptuts_styles_with_the_lot()
{
	wp_register_style('custom-style', get_template_directory_uri() . '/css/main.css', array(), '1', 'all');
	wp_enqueue_style('custom-style');
}
add_action('wp_enqueue_scripts', 'wptuts_styles_with_the_lot');

function wptuts_important()
{

  wp_register_script('modal', get_template_directory_uri() . '/js/modal.js', array(),'2',true);
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(),'2',true);
  wp_register_script('myjs', get_template_directory_uri() . '/js/myjs.js', array(),'2',true);
	wp_enqueue_script('myjs');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('modal');
}
add_action('wp_enqueue_scripts', 'wptuts_important', 5);


//add_filter( 'nav_menu_css_class', 'wp_css_class_to_menu', 10, 2 );
//function wp_css_class_to_menu( $classes ){
//		$classes[] = 'nav__link';
//    return $classes;
//}

$gost = array(
   "Р„"=>"EH","Р†"=>"I","С–"=>"i","в„–"=>"#","С”"=>"eh",
   "Рђ"=>"A","Р‘"=>"B","Р’"=>"V","Р“"=>"G","Р”"=>"D",
   "Р•"=>"E","РЃ"=>"JO","Р–"=>"ZH",
   "Р—"=>"Z","Р"=>"I","Р™"=>"JJ","Рљ"=>"K","Р›"=>"L",
   "Рњ"=>"M","Рќ"=>"N","Рћ"=>"O","Рџ"=>"P","Р "=>"R",
   "РЎ"=>"S","Рў"=>"T","РЈ"=>"U","Р¤"=>"F","РҐ"=>"KH",
   "Р¦"=>"C","Р§"=>"CH","РЁ"=>"SH","Р©"=>"SHH","РЄ"=>"'",
   "Р«"=>"Y","Р¬"=>"","Р­"=>"EH","Р®"=>"YU","РЇ"=>"YA",
   "Р°"=>"a","Р±"=>"b","РІ"=>"v","Рі"=>"g","Рґ"=>"d",
   "Рµ"=>"e","С‘"=>"jo","Р¶"=>"zh",
   "Р·"=>"z","Рё"=>"i","Р№"=>"jj","Рє"=>"k","Р»"=>"l",
   "Рј"=>"m","РЅ"=>"n","Рѕ"=>"o","Рї"=>"p","СЂ"=>"r",
   "СЃ"=>"s","С‚"=>"t","Сѓ"=>"u","С„"=>"f","С…"=>"kh",
   "С†"=>"c","С‡"=>"ch","С€"=>"sh","С‰"=>"shh","СЉ"=>"",
   "С‹"=>"y","СЊ"=>"","СЌ"=>"eh","СЋ"=>"yu","СЏ"=>"ya",
   "вЂ”"=>"-","В«"=>"","В»"=>"","вЂ¦"=>""
  );

$iso = array(
   "Р„"=>"YE","Р†"=>"I","Рѓ"=>"G","С–"=>"i","в„–"=>"#","С”"=>"ye","С“"=>"g",
   "Рђ"=>"A","Р‘"=>"B","Р’"=>"V","Р“"=>"G","Р”"=>"D",
   "Р•"=>"E","РЃ"=>"YO","Р–"=>"ZH",
   "Р—"=>"Z","Р"=>"I","Р™"=>"J","Рљ"=>"K","Р›"=>"L",
   "Рњ"=>"M","Рќ"=>"N","Рћ"=>"O","Рџ"=>"P","Р "=>"R",
   "РЎ"=>"S","Рў"=>"T","РЈ"=>"U","Р¤"=>"F","РҐ"=>"X",
   "Р¦"=>"C","Р§"=>"CH","РЁ"=>"SH","Р©"=>"SHH","РЄ"=>"'",
   "Р«"=>"Y","Р¬"=>"","Р­"=>"E","Р®"=>"YU","РЇ"=>"YA",
   "Р°"=>"a","Р±"=>"b","РІ"=>"v","Рі"=>"g","Рґ"=>"d",
   "Рµ"=>"e","С‘"=>"yo","Р¶"=>"zh",
   "Р·"=>"z","Рё"=>"i","Р№"=>"j","Рє"=>"k","Р»"=>"l",
   "Рј"=>"m","РЅ"=>"n","Рѕ"=>"o","Рї"=>"p","СЂ"=>"r",
   "СЃ"=>"s","С‚"=>"t","Сѓ"=>"u","С„"=>"f","С…"=>"x",
   "С†"=>"c","С‡"=>"ch","С€"=>"sh","С‰"=>"shh","СЉ"=>"",
   "С‹"=>"y","СЊ"=>"","СЌ"=>"e","СЋ"=>"yu","СЏ"=>"ya",
   "вЂ”"=>"-","В«"=>"","В»"=>"","вЂ¦"=>""
  );

function sanitize_title_with_translit($title) {
	global $gost, $iso;
	$rtl_standard = get_option('rtl_standard');
	switch ($rtl_standard) {
		case 'off':
		    return $title;
		case 'gost':
		    return strtr($title, $gost);
		default:
		    return strtr($title, $iso);
	}
}
