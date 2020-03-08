<?php
require(dirname(__FILE__).'/../../config/config.inc.php');
$classindex = realpath(dirname(__FILE__).'/../..').'/cache/class_index.php';
$tempnam = realpath(dirname(__FILE__).'/../..').'/cache/'.time()'.bak';
rename($classindex, $tempnam);
unlink($tempnam);
if(version_compare(_PS_VERSION_, '1.6', '>='))
	PrestashopAutoload::getInstance()->generateIndex();
else
	Autoload::getInstance()->generateIndex();