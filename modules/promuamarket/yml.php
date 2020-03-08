<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/promuamarket.php');

$promuamarket = new promuamarket();
$promuamarket->generate(Tools::GetValue('cron'));