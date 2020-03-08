<?php
/**
 * Category second description
 *
 * @package   gmcatseconddesc
 * @author    Dariusz Tryba (contact@greenmousestudio.com)
 * @copyright Copyright (c) Green Mouse Studio (http://www.greenmousestudio.com)
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class GMCatSecondDesc extends Module
{

    public function __construct()
    {
        $this->name = 'gmcatseconddesc';
        $this->prefix = strtoupper($this->name);
        $this->tab = 'administration';
        $this->version = '1.0.1';
        $this->author = 'GreenMouseStudio.com';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Category second description');
        $this->description = $this->l('Adds another description to category');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.6.99.99');
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        if (!parent::install() || !$this->registerHook('actionAdminCategoriesFormModifier') || !$this->registerHook('actionAdminCategoriesControllerSaveAfter')
            || !$this->registerHook('displayCategorySecondDescription') || !$this->installDb()) {
            return false;
        }

        return true;
    }

    protected function installDb()
    {
        return Db::getInstance()->execute('
		CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'gmcatseconddesc` (
			`id_category` int(10) unsigned NOT NULL,
            `id_shop` INT( 11 ) UNSIGNED NOT NULL DEFAULT \'1\',
            `id_lang` int(10) unsigned NOT NULL,
            `description` text,
            PRIMARY KEY (`id_category`,`id_shop`, `id_lang`)
		) ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8');
    }

    public function uninstall()
    {
        Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'gmcatseconddesc`');
        return parent::uninstall();
    }

    public function getContent()
    {
        $content = '';
        $content .= '<p class="alert alert-warning">'.
            $this->l('Hook:').' {hook h=\'displayCategorySecondDescription\'}'.
            '</p>';
        return $content.$this->context->smarty->fetch($this->local_path.'views/templates/admin/gms.tpl');
    }

    public function hookActionAdminCategoriesFormModifier($params)
    {
        $fieldsForm = &$params['fields'];
        $fieldsForm[0]['form']['input'][] = array(
            'type' => 'textarea',
            'label' => $this->l('Additional description'),
            'name' => 'additional_description',
            'autoload_rte' => true,
            'lang' => true
        );
        $fieldsValue = &$params['fields_value'];
        $fieldsValue['additional_description'] = $this->getFieldsValues();
    }

    public function hookActionAdminCategoriesControllerSaveAfter($params)
    {
        $languages = Language::getLanguages(false);
        $shopId = $this->context->shop->id;
        $categoryId = (int) Tools::getValue('id_category');
        foreach ($languages as $lang) {
            $langId = $lang['id_lang'];
            $desc = Tools::getValue('additional_description_'.$langId);
            if ($this->exists($categoryId, $shopId, $langId)) {
                Db::getInstance()->update('gmcatseconddesc', array('description' => $desc),
                    '`id_category` = '.$categoryId.' '
                    .' AND `id_shop` = '.$shopId.' AND `id_lang` = '.$langId);
            } else {
                Db::getInstance()->insert('gmcatseconddesc',
                    array(
                    'description' => $desc,
                    'id_category' => $categoryId,
                    'id_shop' => $shopId,
                    'id_lang' => $langId
                ));
            }
        }
    }

    protected function exists($categoryId, $shopId, $langId)
    {
        return ($this->getDescription($categoryId, $shopId, $langId) !== false );
    }

    protected function getDescription($categoryId, $shopId, $langId)
    {
        $result = Db::getInstance()->getValue('SELECT `description` FROM `'._DB_PREFIX_.'gmcatseconddesc` WHERE `id_category` = '.$categoryId.' '
            .' AND `id_shop` = '.$shopId.' AND `id_lang` = '.$langId);
        return $result;
    }

    protected function getFieldsValues()
    {
        $categoryId = (int) Tools::getValue('id_category');
        $languages = Language::getLanguages(false);
        $shopId = $this->context->shop->id;
        $fieldsValues = array();
        foreach ($languages as $lang) {
            $langId = $lang['id_lang'];
            $fieldsValues[$langId] = $this->getDescription($categoryId, $shopId, $langId);
        }
        return $fieldsValues;
    }

    public function hookDisplayCategorySecondDescription($params)
    {
        $shopId = $this->context->shop->id;
        $langId = $this->context->language->id;
        $categoryId = (int) Tools::getValue('id_category');
        $p = (int) Tools::getValue('p');
        if ($p > 1) {
            return;
        }
        $cacheId = $this->name.'|'.$categoryId.'|'.$shopId.'|'.$langId;
        if (!$this->isCached('gmcatseconddesc.tpl', $cacheId)) {
            $this->context->smarty->assign('additionalDescription', $this->getDescription($categoryId, $shopId, $langId));
        }
        return $this->display(__FILE__, 'gmcatseconddesc.tpl', $cacheId);
    }
}
