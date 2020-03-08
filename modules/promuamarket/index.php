<?php
/**
 * @author     Roman Prokofyev
 * @copyright  Roman Prokofyev
 */
include(dirname(__FILE__). '/../../config/config.inc.php');
include(dirname(__FILE__). '/../../init.php');
include(dirname(__FILE__). '/promuamarket.php');

header("Cache-Control: no-cache, must-revalidate");
header("Content-type: text/xml");

$promuaMarket = new promuaMarket();
echo $promuaMarket->getPriceList();