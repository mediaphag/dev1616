<?php
/**
 *  Leo Theme for Prestashop 1.6.x
 *
 * @author    http://www.leotheme.com
 * @copyright Copyright (C) October 2013 LeoThemes.com <@emai:leotheme@gmail.com>
 *               <info@leotheme.com>.All rights reserved.
 * @license   GNU General Public License version 2
 */

if (!defined('_PS_VERSION_')) {
    # module validation
    exit;
}

class Btmegamenu extends ObjectModel
{
    public $id;
    public $id_btmegamenu;
    public $image;
    public $icon_class;
    public $id_parent = 1;
    public $is_group = 0;
    public $width;
    public $submenu_width;
    public $submenu_colum_width;
    public $item;
    public $colums = 1;
    public $type;
    public $is_content = 0;
    public $show_title = 1;
    public $level_depth;
    public $active = 1;
    public $position;
    public $show_sub;
    public $url;
    public $target;
    public $privacy;
    public $position_type;
    public $menu_class;
    public $content;
    public $submenu_content;
    public $level;
    public $left;
    public $right;
    public $date_add;
    public $date_upd;
    # Lang
    public $title;
    public $text;
    public $description;
    public $content_text;
    public $submenu_catids;
    public $is_cattree = 1;
    private $shop_url;
    private $edit_string = '';
    private $mega_config = array();
    private $edit_string_col = '';
    private $is_live_edit = true;
    private $leo_module = null;
    public $id_shop = '';
    public $groupBox = 'all';       // Default for import datasameple

    public function setModule($module)
    {
        $this->leo_module = $module;
    }
    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'btmegamenu',
        'primary' => 'id_btmegamenu',
        'multilang' => true,
        'fields' => array(
            'image' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName'),
            'id_parent' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
            'is_group' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'width' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 255),
            'submenu_width' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 255),
            'submenu_colum_width' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 255),
            'item' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 255),
            'colums' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 255),
            'type' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 255),
            'is_content' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'show_title' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'is_cattree' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'level_depth' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'position' => array('type' => self::TYPE_INT),
            'show_sub' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'url' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isUrl', 'size' => 255),
            'target' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 25),
            'privacy' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'size' => 6),
            'position_type' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 25),
            'menu_class' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 25),
            'icon_class' => array('type' => self::TYPE_STRING, 'validate' => 'isCatalogName', 'size' => 125),
            'content' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'submenu_content' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'level' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'left' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'right' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            # Lang fields
            'title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 255),
            'text' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'required' => false, 'size' => 255),
            'description' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            'content_text' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
            'submenu_catids' => array('type' => self::TYPE_STRING, 'lang' => false, 'validate' => 'isString'),
            'groupBox' => array('type' => self::TYPE_STRING, 'size' => 255),
        ),
    );

    public function copyFromPost($post = array())
    {
        /* Classical fields */
        foreach ($post as $key => $value) {
            if (key_exists($key, $this) && $key != 'id_'.$this->table) {
                $this->{$key} = $value;
            }
        }

        /* Multilingual fields */
        if (count($this->fieldsValidateLang)) {
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                foreach ($this->fieldsValidateLang as $field => $validation) {
                    if (Tools::getIsset($field.'_'.(int)$language['id_lang'])) {
                        $this->{$field}[(int)$language['id_lang']] = Tools::getValue($field.'_'.(int)$language['id_lang']);
                    }

                    # validate module
                    unset($validation);
                }
            }
        }
        $this->groupBox = implode(',', $this->groupBox);
    }

    public function add($autodate = true, $null_values = false)
    {
        if($this->import_datasample == true)
        {
            // Datasample
            $this->groupBox = 'all';
        }
        $this->level_depth = $this->calcLevelDepth();
        $context = Context::getContext();
        $id_shop = $context->shop->id;
        $res = parent::add($autodate, $null_values);
        $sql = 'INSERT INTO `'._DB_PREFIX_.'btmegamenu_shop` (`id_shop`, `id_btmegamenu`)
			VALUES('.(int)$id_shop.', '.(int)$this->id.')';
        $res &= Db::getInstance()->execute($sql);
        return $res;
    }

    public function update($null_values = false)
    {
        $this->level_depth = $this->calcLevelDepth();
        return parent::update($null_values);
    }

    protected function recursiveDelete(&$to_delete, $id_btmegamenu)
    {
        if (!is_array($to_delete) || !$id_btmegamenu) {
            die(Tools::displayError());
        }

        $result = Db::getInstance()->executeS('
		SELECT `id_btmegamenu`
		FROM `'._DB_PREFIX_.'btmegamenu`
		WHERE `id_parent` = '.(int)$id_btmegamenu);
        foreach ($result as $row) {
            $to_delete[] = (int)$row['id_btmegamenu'];
            $this->recursiveDelete($to_delete, (int)$row['id_btmegamenu']);
        }
    }

    public function delete()
    {
        if ($this->id == 1) {
            return false;
        }
        $this->clearCache();

        // Get children categories
        $to_delete = array((int)$this->id);
        $this->recursiveDelete($to_delete, (int)$this->id);
        $to_delete = array_unique($to_delete);

        // Delete CMS Category and its child from database
        $list = count($to_delete) > 1 ? implode(',', $to_delete) : (int)$this->id;
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'btmegamenu` WHERE `id_btmegamenu` IN ('.pSQL($list).')');
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'btmegamenu_shop` WHERE `id_btmegamenu` IN ('.pSQL($list).')');
        Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'btmegamenu_lang` WHERE `id_btmegamenu` IN ('.pSQL($list).')');
        Btmegamenu::cleanPositions($this->id_parent);
        return true;
    }

    public function deleteSelection($menus)
    {
        $return = 1;
        foreach ($menus as $id_btmegamenu) {
            $obj_menu = new Btmegamenu($id_btmegamenu);
            $return &= $obj_menu->delete();
        }
        return $return;
    }

    public function calcLevelDepth()
    {
        $parent_btmegamenu = new Btmegamenu($this->id_parent);
        if (!$parent_btmegamenu) {
            die('parent Menu does not exist');
        }
        return $parent_btmegamenu->level_depth + 1;
    }

    public function updatePosition($way, $position)
    {
        $sql = '
			SELECT cp.`id_btmegamenu`, cp.`position`, cp.`id_parent`
			FROM `'._DB_PREFIX_.'btmegamenu` cp
			WHERE cp.`id_parent` = '.(int)$this->id_parent.'
			ORDER BY cp.`position` ASC';
        if (!$res = Db::getInstance()->executeS($sql)) {
            return false;
        }
        foreach ($res as $menu) {
            if ((int)$menu['id_btmegamenu'] == (int)$this->id) {
                $moved_menu = $menu;
            }
        }
        if (!isset($moved_menu) || !isset($position)) {
            return false;
        }
        // < and > statements rather than BETWEEN operator
        // since BETWEEN is treated differently according to databases
        return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'btmegamenu`
			SET `position`= `position` '.pSQL($way ? '- 1' : '+ 1').'
			WHERE `position`
			'.($way ? '> '.(int)$moved_menu['position'].' AND `position` <= '.(int)$position : '< '.(int)$moved_menu['position'].' AND `position` >= '.(int)$position).'
			AND `id_parent`='.(int)$moved_menu['id_parent']) && Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'btmegamenu`
			SET `position` = '.(int)$position.'
			WHERE `id_parent` = '.(int)$moved_menu['id_parent'].'
			AND `id_btmegamenu`='.(int)$moved_menu['id_btmegamenu']));
    }

    public static function cleanPositions($id_parent)
    {
        $result = Db::getInstance()->executeS('
		SELECT `id_btmegamenu`
		FROM `'._DB_PREFIX_.'btmegamenu`
		WHERE `id_parent` = '.(int)$id_parent.'
		ORDER BY `position`');
        $sizeof = count($result);
        for ($i = 0; $i < $sizeof; ++$i) {
            $sql = '
			UPDATE `'._DB_PREFIX_.'btmegamenu`
			SET `position` = '.(int)$i.'
			WHERE `id_parent` = '.(int)$id_parent.'
			AND `id_btmegamenu` = '.(int)$result[$i]['id_btmegamenu'];
            Db::getInstance()->execute($sql);
        }
        return true;
    }

    public static function getLastPosition($id_parent)
    {
        return (Db::getInstance()->getValue('SELECT MAX(position)+1 FROM `'._DB_PREFIX_.'btmegamenu` WHERE `id_parent` = '.(int)$id_parent));
    }

    public function getInfo($id_btmegamenu, $id_lang = null, $id_shop = null)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        if (!$id_shop) {
            $id_shop = Context::getContext()->shop->id;
        }
        $sql = 'SELECT m.*, md.title, md.description, md.content_text , md.url
				FROM '._DB_PREFIX_.'megamenu m
				LEFT JOIN '._DB_PREFIX_.'btmegamenu_lang md ON m.id_btmegamenu = md.id_btmegamenu AND md.id_lang = '.(int)$id_lang
                .' JOIN '._DB_PREFIX_.'btmegamenu_shop bs ON m.id_btmegamenu = bs.id_btmegamenu AND bs.id_shop = '.(int)$id_shop;
        $sql .= ' WHERE m.id_btmegamenu='.(int)$id_btmegamenu;

        return Db::getInstance()->executeS($sql);
    }

    public function getChild($id_btmegamenu = null, $id_lang = null, $id_shop = null, $active = false)
    {
        if (!$id_lang) {
            $id_lang = Context::getContext()->language->id;
        }
        if (!$id_shop) {
            $id_shop = Context::getContext()->shop->id;
        }

        $sql = ' SELECT m.*, md.title, md.text, md.description, md.content_text, md.url
				FROM '._DB_PREFIX_.'btmegamenu m
				LEFT JOIN '._DB_PREFIX_.'btmegamenu_lang md ON m.id_btmegamenu = md.id_btmegamenu AND md.id_lang = '.(int)$id_lang
                .' JOIN '._DB_PREFIX_.'btmegamenu_shop bs ON m.id_btmegamenu = bs.id_btmegamenu AND bs.id_shop = '.(int)$id_shop;
        if ($active) {
            $sql .= ' WHERE m.`active`=1 ';
        }

        if ($id_btmegamenu != null) {
            # validate module
            $sql .= ' WHERE id_parent='.(int)$id_btmegamenu;
        }
        $sql .= ' ORDER BY `position` ';
        return Db::getInstance()->executeS($sql);
    }

    public function hasChild($id)
    {
        return isset($this->children[$id]);
    }

    public function getNodes($id)
    {
        return $this->children[$id];
    }

    public function getTree($id = null)
    {
        $childs = $this->getChild($id);

        foreach ($childs as $child) {
            # validate module
            $this->children[$child['id_parent']][] = $child;
        }
        $parent = 1;
        $output = $this->genTree($parent, 1);
        return $output;
    }

    public function getDropdown($id = null, $selected = 1)
    {
        $this->children = array();
        $childs = $this->getChild($id);
        foreach ($childs as $child) {
            # validate module871
            $this->children[$child['id_parent']][] = $child;
        }
        $output = array(array('id' => '1', 'title' => 'Root', 'selected' => ''));
        $output = $this->genOption(1, 1, $selected, $output);

        return $output;
    }

    public function genOption($parent, $level = 0, $selected = null, $output = array())
    {
        if ($this->hasChild($parent)) {
            $data = $this->getNodes($parent);
            foreach ($data as $menu) {
                $selected == $menu['id_btmegamenu'] ? 'selected="selected"' : '';
                $output[] = array('id' => $menu['id_btmegamenu'], 'title' => str_repeat('-', $level).' '.$menu['title'].' (ID:'.$menu['id_btmegamenu'].')', 'selected' => $selected);
                if ($menu['id_btmegamenu'] != $parent) {
                    $output = $this->genOption($menu['id_btmegamenu'], $level + 1, $selected, $output);
                }
            }
        }
        return $output;
    }

    public function genTree($parent, $level)
    {
        if ($this->hasChild($parent)) {
            $data = $this->getNodes($parent);
            $t = $level == 1 ? ' sortable' : '';
            $output = '<ol class="level'.$level.$t.' ">';

            foreach ($data as $menu) {
                $cls = Tools::getValue('id_btmegamenu') == $menu['id_btmegamenu'] ? 'selected' : '';
                $output .= '<li id="list_'.$menu['id_btmegamenu'].'" class="'.$cls.'">
				<div><span class="disclose"><span></span></span>'.($menu['title'] ? $menu['title'] : '').' (ID:'.$menu['id_btmegamenu'].') <span class="quickedit" rel="id_'.$menu['id_btmegamenu'].'">E</span><span class="quickdel" rel="id_'.$menu['id_btmegamenu'].'">D</span></div>';
                if ($menu['id_btmegamenu'] != $parent) {
                    $output .= $this->genTree($menu['id_btmegamenu'], $level + 1);
                }
                $output .= '</li>';
            }

            $output .= '</ol>';
            return $output;
        }
        return '';
    }

    /**
     *
     */
    public function renderAttrs($menu)
    {
        $t = sprintf($this->edit_string, $menu['id_btmegamenu'], $menu['is_group'], $menu['colums']);
        if ($this->is_live_edit) {
            if (isset($menu['megaconfig']->subwidth) && $menu['megaconfig']->subwidth) {
                # validate module
                $t .= ' data-subwidth="'.$menu['megaconfig']->subwidth.'" ';
            }
            if (isset($menu['megaconfig']->align) && $menu['megaconfig']->align) {
                # validate module
                $t .= ' data-align="'.$menu['megaconfig']->align.'" ';
            }
            $t .= ' data-submenu="'.(isset($menu['megaconfig']->submenu) ? $menu['megaconfig']->submenu : $this->hasChild($menu['id_btmegamenu'])).'"';
        }
        return $t;
    }

    /**
     *
     */
    public function parserMegaConfig($params)
    {
        if (!empty($params)) {
            foreach ($params as $param) {
                if ($param) {
                    # validate module
                    $this->mega_config[$param->id] = $param;
                }
            }
        }
    }

    public function hasMegaMenuConfig($menu)
    {
        $id = $menu['id_btmegamenu'];
        return isset($this->mega_config[$id]) ? $this->mega_config[$id] : array();
    }

    public function getFrontTree($parent = 1, $edit = false, $params = array())
    {
        $this->parserMegaConfig($params);
        if ($edit) {
            # validate module
            $this->edit_string = ' data-id="%s" data-group="%s"  data-cols="%s" ';
        } else {
            $this->is_live_edit = false;
            $this->model_menu_widget = new LeoTempcpWidget();
            $this->model_menu_widget->setTheme(Context::getContext()->shop->getTheme());
            $this->model_menu_widget->langID = Context::getContext()->language->id;
            $this->model_menu_widget->loadWidgets(Context::getContext()->shop->id);
            $this->model_menu_widget->loadEngines();
        }
        $this->edit_string_col = ' data-colwidth="%s" data-class="%s" ';

        $childs = $this->getChild(null, null, null, true);

        if($edit == false){
            // PERMISSION
            foreach ($childs as $key => $menu)
            {
                $id_customer_group = ContextCore::getContext()->customer->id_default_group;

                if(!array_key_exists( 'groupBox', $menu))
                {
                    // PERMISSION FOR OLD VERSION
                    $menu['groupBox'] = 'all';
                }
                $id_menu_groups = $this->getGroups( $menu['groupBox'] );
                if(!in_array($id_customer_group, $id_menu_groups) && !in_array('all', $id_menu_groups))
                {
                    // PERMISSION : Not allow show menu level 1
                    unset($childs[$key]);
                }
            }
        }
        foreach ($childs as $child) {

            $child['megaconfig'] = $this->hasMegaMenuConfig($child);
            $child['megamenu_id'] = $child['id_btmegamenu'];
            if (isset($child['megaconfig']->group) && $child['level'] != 0) {
                # validate module
                $child['is_group'] = $child['megaconfig']->group;
            }

            if (isset($child['megaconfig']->submenu) && $child['megaconfig']->submenu == 0) {
                # validate module
                $child['menu_class'] = $child['menu_class'];
            }

            $this->children[$child['id_parent']][] = $child;
        }

        $parent = 1;
        $theme_name = Context::getContext()->shop->getTheme();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
        $this->image_base_url = Tools::htmlentitiesutf8($protocol.$_SERVER['HTTP_HOST'].__PS_BASE_URI__).'themes/'.$theme_name.'/img/modules/leobootstrapmenu/icons/';
        $this->shop_url = $this->image_base_url;
        $output = '';
        if ($this->hasChild($parent)) {
            $data = $this->getNodes($parent);
//			$page_name = Dispatcher::getInstance()->getController();
//			$true = false;

            $output = '<ul class="nav navbar-nav megamenu">';
            foreach ($data as $menu) {

                if($edit == false){
                    if(!array_key_exists( 'groupBox', $menu))
                    {
                        // PERMISSION FOR OLD VERSION
                        $menu['groupBox'] = 'all';
                    }
                    $id_menu_groups = $this->getGroups( $menu['groupBox']);
                    $id_customer_group = ContextCore::getContext()->customer->id_default_group;

                    if(!in_array($id_customer_group, $id_menu_groups) && !in_array('all', $id_menu_groups))
                    {
                        // PERMISSION : Not allow show menu level 1
                        continue;
                    }
                }

                $align = '';
                if (isset($menu['megaconfig']->align) && $menu['megaconfig']->align) {
                    # validate module
                    $align = $menu['megaconfig']->align;
                }
                if ($menu['type'] == 'html') {
                    $output .= '<li class="'.$menu['menu_class'].'" '.$this->renderAttrs($menu).'>
					<a href="'.$this->getLink($menu).'" target="'.$menu['target'].'" class="has-category has-subhtml">';
                    if ($menu['icon_class']) {
                        # validate module
                        $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
                    } elseif ($menu['image']) {
                        # validate module
                        $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
                    }
                    if ($menu['show_title'] == 1) {
                        $output .= '<span class="menu-title">'.$menu['title'].'</span>';
                    }
                    if ($menu['text']) {
                        $output .= '<span class="sub-title">'.$menu['text'].'</span>';
                    }
                    if ($menu['description']) {
                        # validate module
                        $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
                    }
                    if ($menu['image'] || $menu['icon_class']) {
                        # validate module
                        $output .= '</span>';
                    }
                    $output .= '</a>';
                    if ($menu['content_text']) {
                        # validate module
                        $output .= '<div class="menu-content">'.html_entity_decode($menu['content_text'], ENT_QUOTES, 'UTF-8').'</div>';
                    }
                    $output .= '</li>';
                } else {
                    if ($this->hasChild($menu['megamenu_id'])) {

                        $output .= '<li class="parent dropdown '.$menu['menu_class'].' '.$align.'" '.$this->renderAttrs($menu).'>';

                        $output .= '<a class="dropdown-toggle has-category" data-toggle="dropdown" href="'.$this->getLink($menu).'" target="'.$menu['target'].'">';

                        if ($menu['icon_class']) {
                            # validate module
                            $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
                        } elseif ($menu['image']) {
                            # validate module
                            $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
                        }
                        if ($menu['show_title'] == 1) {
                            $output .= '<span class="menu-title">'.$menu['title'].'</span>';
                        }
                        if ($menu['text']) {
                            $output .= '<span class="sub-title">'.$menu['text'].'</span>';
                        }
                        if ($menu['description']) {
                            # validate module
                            $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
                        }
                        if ($menu['image'] || $menu['icon_class']) {
                            # validate module
                            $output .= '</span>';
                        }
                        $output .= '<b class="caret"></b></a>';

                        $output .= $this->genFrontTree($menu['megamenu_id'], 1, $menu);
                        $output .= '</li>';
                    } else if (!$this->hasChild($menu['megamenu_id']) && isset($menu['megaconfig']) && $menu['megaconfig'] && isset($menu['megaconfig']->rows) && $menu['megaconfig']->rows) {
                        # validate module
                        $output .= $this->genMegaMenuByConfig($menu['megamenu_id'], 1, $menu, true);
                    } else {
                        $output .= '<li class="'.$menu['menu_class'].'" '.$this->renderAttrs($menu).'>
						<a href="'.$this->getLink($menu).'" target="'.$menu['target'].'" class="has-category">';

                        if ($menu['icon_class']) {
                            # validate module
                            $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
                        } elseif ($menu['image']) {
                            # validate module
                            $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
                        }
                        if ($menu['show_title'] == 1) {
                            $output .= '<span class="menu-title">'.$menu['title'].'</span>';
                        }
                        if ($menu['text']) {
                            $output .= '<span class="sub-title">'.$menu['text'].'</span>';
                        }
                        if ($menu['description']) {
                            # validate module
                            $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
                        }
                        if ($menu['image'] || $menu['icon_class']) {
                            # validate module
                            $output .= '</span>';
                        }
                        $output .= '</a></li>';
                    }
                }
            }
            $output .= '</ul>';
        }

        $this->leo_module = null;
        return $output;
    }

    public function renderWidgetsInCol($col)
    {
        if (is_object($col) && isset($col->widgets) && !$this->edit_string) {
            $widgets = $col->widgets;
            $widgets = explode('|wid-', '|'.$widgets);
            if (!empty($widgets)) {
                unset($widgets[0]);

                $output = '';
                foreach ($widgets as $wid) {
                    $content = $this->model_menu_widget->renderContent($wid);
                    $output .= $this->leo_module->getWidgetContent($wid, $content['type'], $content['data'], 0);
                }
                return $output;
            }
        }
    }

    /**
     * set data configuration for column
     */
    public function getColumnDataConfig($col)
    {
        $output = '';
        if (is_object($col) && $this->is_live_edit) {
            $vars = get_object_vars($col);
            foreach ($vars as $key => $var) {
                # validate module
                $output .= ' data-'.$key.'="'.$var.'" ';
            }
        }
        return $output;
    }

    /**
     * display mega content based on user configuration
     */
    public function genMegaMenuByConfig($parent_id, $level, $menu, $hascat = false)
    {
        $attrw = '';
        $align = '';
        $class = $level > 1 ? 'dropdown-submenu' : 'dropdown';
        if (isset($menu['megaconfig']->align) && $menu['megaconfig']->align) {
            # validate module
            $align = $menu['megaconfig']->align;
        }

        if ($hascat) {
            $output = '<li class="'.$menu['menu_class'].' parent '.$class.' '.$align.' " '.$this->renderAttrs($menu).'>
                    <a href="'.$this->getLink($menu).'" class="dropdown-toggle has-category" data-toggle="dropdown" target="'.$menu['target'].'">';
        } else {
            $output = '<li class="'.$menu['menu_class'].' parent '.$class.' " '.$this->renderAttrs($menu).'>
						<a href="'.$this->getLink($menu).'" class="dropdown-toggle" data-toggle="dropdown" target="'.$menu['target'].'">';
        }
        if ($menu['icon_class']) {
            # validate module
            $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
        } elseif ($menu['image']) {
            # validate module
            $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
        }

        $output .= '<span class="menu-title">'.$menu['title'].'</span>';
        if ($menu['text']) {
            $output .= '<span class="sub-title">'.$menu['text'].'</span>';
        }
        if ($menu['description']) {
            # validate module
            $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
        }
        if ($menu['image'] || $menu['icon_class']) {
            # validate module
            $output .= '</span>';
        }
        $output .= '<b class="caret"></b></a>';

        if (isset($menu['megaconfig']->subwidth) && $menu['megaconfig']->subwidth) {
            # validate module
            $attrw .= ' style="width:'.$menu['megaconfig']->subwidth.'px"';
        }

        if ($menu['is_group'] == 1) {
            $class = 'dropdown-sub dropdown-mega';
        } else {
            $class = 'dropdown-sub dropdown-menu';
        }
        $output .= '<div class="'.$class.'" '.$attrw.' ><div class="dropdown-menu-inner">';

        foreach ($menu['megaconfig']->rows as $row) {
            $output .= '<div class="row">';
            foreach ($row->cols as $col) {
                $colclass = (isset($col->colclass) && !empty($col->colclass)) ? ($col->colclass) : '';
                $output .= '<div class="mega-col col-sm-'.$col->colwidth.'" '.$this->getColumnDataConfig($col).'> <div class="mega-col-inner '.$colclass.'">';
                $output .= $this->renderWidgetsInCol($col);
                $output .= '</div></div>';
            }
            $output .= '</div>';
        }

        $output .= '</div></div>';
        $output .= '</li>';
        unset($parent_id); # validate module

        return $output;
    }

    /**
     * 
     */
    public function getSelect($menu)
    {
        $page_name = Dispatcher::getInstance()->getController();
        $value = (int)$menu['item'];
        $result = '';
        switch ($menu['type']) {
            case 'product':
                if ($value == Tools::getValue('id_product') && $page_name == 'product') {
                    $result = ' active';
                }
                break;
            case 'category':
                if ($value == Tools::getValue('id_category') && $page_name == 'category') {
                    $result = ' active';
                }
                break;
            case 'cms':
                if ($value == Tools::getValue('id_cms') && $page_name == 'cms') {
                    $result = ' active';
                }
                break;
            case 'manufacturer':
                if ($value == Tools::getValue('id_manufacturer') && $page_name == 'manufacturer') {
                    $result = ' active';
                }
                break;
            case 'supplier':
                if ($value == Tools::getValue('id_supplier') && $page_name == 'supplier') {
                    $result = ' active';
                }
                break;
            case 'url':
                $value = $menu['url'];
                if (strpos($value, 'http') !== false) {
                    # validate module
                    $result = '';
                } else {
                    if ($value == $page_name) {
                        # validate module
                        $result = ' active';
                    } elseif (($value == 'index' || $value == 'index.php') && $page_name == 'index') {
                        # validate module
                        $result = ' active';
                    }
                }
                break;
            default:
                $result = '';
                break;
        }
        return $result;
    }

    public function genFrontTree($parent_id, $level, $parent)
    {
        $attrw = '';
        $class = $parent['is_group'] ? 'dropdown-mega' : 'dropdown-menu';
        if (isset($parent['megaconfig']->subwidth) && $parent['megaconfig']->subwidth) {
            # validate module
            $attrw .= ' style="width:'.$parent['megaconfig']->subwidth.'px"';
        }

        if ($this->hasChild($parent_id)) {
            $data = $this->getNodes($parent_id);
            $parent['colums'] = (int)$parent['colums'];
            if ($parent['colums'] > 1) {
                if (!empty($parent['megaconfig']->rows)) {
                    $cols = array_chunk($data, ceil(count($data) / $parent['colums']));
                    $output = '<div class="dropdown-sub '.$class.' level'.$level.'" '.$attrw.' ><div class="dropdown-menu-inner">';
                    foreach ($parent['megaconfig']->rows as $rows) {
                        foreach ($rows as $rowcols) {
                            $output .= '<div class="row">';

                            foreach ($rowcols as $key => $col) {
                                $col->colwidth = isset($col->colwidth) ? $col->colwidth : 6;
                                $colclass = isset($col->colclass) ? $col->colclass : '';
                                if (isset($col->type) && $col->type == 'menu' && isset($cols[$key])) {
                                    $scol = '<div class="mega-col col-sm-'.$col->colwidth.'" data-type="menu" '.$this->getColumnDataConfig($col).'><div class="mega-col-inner '.$colclass.'">';
                                    $scol .= '<ul>';
                                    foreach ($cols[$key] as $menu) {
                                        # validate module
                                        $scol .= $this->renderMenuContent($menu, $level + 1);
                                    }
                                    $scol .= '</ul></div></div>';
                                } else {
                                    $scol = '<div class="mega-col col-sm-'.$col->colwidth.'"  '.$this->getColumnDataConfig($col).'><div class="mega-col-inner '.$colclass.'">';
                                    $scol .= $this->renderWidgetsInCol($col);
                                    $scol .= '</div></div>';
                                }
                                $output .= $scol;
                            }

                            $output .= '</div>';
                        }
                    }
                    $output .= '</div></div>';
                } else {
                    $output = '<div class="'.$class.' dropdown-sub mega-cols cols'.$parent['colums'].'" '.$attrw.' ><div class="dropdown-menu-inner"><div class="row">';
                    $cols = array_chunk($data, ceil(count($data) / $parent['colums']));

                    $o_spans = $this->getColWidth($parent, (int)$parent['colums']);

                    foreach ($cols as $i => $menus) {
                        $colwidth = str_replace('col-sm-', '', $o_spans[$i + 1]);
                        $output .= '<div class="mega-col '.$o_spans[$i + 1].' col-'.($i + 1).'" data-type="menu" data-colwidth="'.$colwidth.'"><div class="inner"><ul>';
                        foreach ($menus as $menu) {
                            # validate module
                            $output .= $this->renderMenuContent($menu, $level + 1);
                        }
                        $output .= '</ul></div></div>';
                    }

                    $output .= '</div></div></div>';
                }
                return $output;
            } else {
                if (!empty($parent['megaconfig']->rows)) {
                    $output = '<div class="'.$class.' level'.$level.'" '.$attrw.' ><div class="dropdown-menu-inner">';
                    foreach ($parent['megaconfig']->rows as $rows) {
                        foreach ($rows as $rowcols) {
                            $output .= '<div class="row">';
                            foreach ($rowcols as $col) {

                                $colclass = (isset($col->colclass) && !empty($col->colclass)) ? ($col->colclass) : '';
                                if (isset($col->type) && $col->type == 'menu') {
                                    $scol = '<div class="mega-col col-sm-'.$col->colwidth.'" data-type="menu" '.$this->getColumnDataConfig($col).'><div class="mega-col-inner '.$colclass.'">';
                                    $scol .= '<ul>';
                                    foreach ($data as $menu) {
                                        # validate module
                                        $scol .= $this->renderMenuContent($menu, $level + 1);
                                    }
                                    $scol .= '</ul>';
                                } else {
                                    $scol = '<div class="mega-col col-sm-'.$col->colwidth.'"  '.$this->getColumnDataConfig($col).'><div class="mega-col-inner '.$colclass.'">';
                                    $scol .= $this->renderWidgetsInCol($col);
                                }
                                $scol .= '</div></div>';
                                $output .= $scol;
                            }
                            $output .= '</div>';
                        }
                    }$output .= '</div></div>';
                } else {
                    $output = '<div class="'.$class.' level'.$level.'" '.$attrw.' ><div class="dropdown-menu-inner">';
                    $row = '<div class="row"><div class="col-sm-12 mega-col" data-colwidth="12" data-type="menu" ><div class="inner"><ul>';
                    foreach ($data as $menu) {
                        # validate module
                        $row .= $this->renderMenuContent($menu, $level + 1);
                    }
                    $row .= '</ul></div></div></div>';
                    $row .= '</div></div>';
                    $output .= $row;
                }
            }

            return $output;
        }

        return '';
    }

    public function genCatNoTree($context, $categories)
    {
        $html = '<ul class="dropdown-menu level1">';
        foreach ($categories as $val) {
            $html .= '<li>
                         <a href='.$context->link->getCategoryLink($val['id_category'], $val['link_rewrite']).' title='.$val['name'].'>
                           <span class="menu-title">'.$val['name'].'</span>
                          </a>
                      </li>';
        }
        $html .= '</ul>';

        return $html;
    }

    public function getCategorie($submenu_catids, $context)
    {
        $groups = implode(', ', Customer::getGroupsStatic((int)$context->customer->id));

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT DISTINCT c.id_parent, c.id_category, c.level_depth ,cl.name, cl.link_rewrite
            FROM `'._DB_PREFIX_.'category` c
            INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND cl.`id_lang` = '.(int)$context->language->id.Shop::addSqlRestrictionOnLang('cl').')
            INNER JOIN `'._DB_PREFIX_.'category_shop` cs ON (cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.(int)$context->shop->id.')
            WHERE (c.`active` = 1 OR c.`id_category` = '.(int)Configuration::get('PS_HOME_CATEGORY').')
            AND c.`id_category` != '.(int)Configuration::get('PS_ROOT_CATEGORY').'
            AND c.id_category IN (SELECT id_category FROM `'._DB_PREFIX_.'category_group` WHERE `id_group` IN ('.pSQL($groups).') AND id_category IN ('.$submenu_catids.'))
            ORDER BY `level_depth` ASC, cs.`position`');
        return $result;
    }

    public function genCatByTree($parent, $context, $result)
    {
        $context = Context::getContext();
        $result_parents = array();
        $result_ids = array();

        foreach ($result as &$row) {
            $result_parents[$row['id_parent']][] = &$row;
            $result_ids[$row['id_category']] = &$row;
        }

        //get cat
        $block_categ_tree = array();
        $leo_process_cat = array();
        foreach ($result_parents as $rkey => $rrow) {
            if (!in_array($rkey, $leo_process_cat)) {
                $result_cat = $this->getCatTree($leo_process_cat, $context, $result_parents, $result_ids, 0, $rkey, 0);
                $block_categ_tree[$rkey] = $result_cat;
            }
            # validate module
            unset($rrow);
        }

        $o_spans = $this->getColWidth($parent, (int)$parent['colums']);

        $level = 1;

        $html = '';
        foreach ($block_categ_tree as $val) {
            if ($val['children']) {
                # validate module
                $this->genCatBySubTree($html, $val['children'], $level, $o_spans, $parent['target'], (int)$parent['colums']);
            }
        }

        unset($leo_process_cat, $result_parents, $result_ids);

        //die($html);
        return $html;
    }

    public function genCatBySubTree(&$html, $result, $level, $o_spans, $target, $columns)
    {
        $index = 1;
        $close_tag = 0;

        foreach ($result as $val) {
            $class_li = '';
            $class_ul = 'dropdown-menu';
            //$classUl = 'dropdown-mega';
            $class_div = '';

            if ($val['currentDepth'] == 1) {
                if ($index == 1 || (($index - 1) % $columns) == 0) {
                    //open div row tag
                    $html .= ($close_tag ? '</div><div class="row">' : '<div class="row">');
                    $close_tag++;
                }
                if (isset($o_spans[$index])) {
                    $class_div = $o_spans[$index];
                } else {
                    if (isset($o_spans[$index - $columns])) {
                        $class_div = $o_spans[$index - $columns];
                    } else {
                        $class_div = 'col-md-12';
                    }
                }
                $mod_column = $index % $columns;
                if ($mod_column == 0) {
                    $mod_column = $columns;
                }
                if (isset($o_spans[$mod_column])) {
                    $class_div = $o_spans[$mod_column];
                } else {
                    $class_div = 'col-md-12';
                }

                //open mega div + ul
                $html .= '<div class="mega-col '.$class_div.' col-'.$index.'"><ul>';
                $class_li = 'mega-group ';
                $class_ul = 'dropdown-mega';
            }
            if ($val['children']) {
                $class_li .= 'parent dropdown-submenu';
            }
            $html .= '<li class="'.$class_li.'">';
            $html .= '<a class="dropdown-toggle" target="'.$target.'" href="'.$val['link'].'"><span class="menu-title">'.$val['name'].'</span>';
            if ($val['children'] && $val['currentDepth'] > 1) {
                $html .= '<b class="caret"></b>';
            }

            $html .= '</a>';
            if ($val['children']) {
                $html .= '<ul class="'.$class_ul.' level'.$level.'">';
                $this->genCatBySubTree($html, $val['children'], $level + 1, $o_spans, $target, $columns);
                $html .= '</ul>';
            }
            $html .= '</li>';

            //close mega div + ul
            if ($val['currentDepth'] == 1) {
                # validate module
                $html .= '</ul></div>';
            }

            $index++;
        }
        //close div row tag
        $html .= ($close_tag ? '</div>' : '');
        //$level++;
    }

    public function getCatTree(&$leo_process_cat, $context, $result_parents, $result_ids, $max_depth, $id_category = null, $current_depth = 0)
    {
        $children = array();
        if (isset($result_parents[$id_category]) && count($result_parents[$id_category]) && ($max_depth == 0 || $current_depth < $max_depth)) {
            foreach ($result_parents[$id_category] as $subcat) {
                $children[] = $this->getCatTree($leo_process_cat, $context, $result_parents, $result_ids, $max_depth, $subcat['id_category'], $current_depth + 1);
            }
        }
        $leo_process_cat[] = $id_category;

        $link_rewrite = '';
        $name = '';
        if (isset($result_ids[$id_category]['link_rewrite'])) {
            $link_rewrite = $result_ids[$id_category]['link_rewrite'];
        }
        if (isset($result_ids[$id_category]['link_rewrite'])) {
            $name = $result_ids[$id_category]['name'];
        }

        $return = array('id' => $id_category, 'link' => $context->link->getCategoryLink($id_category, $link_rewrite),
            'name' => $name, 'currentDepth' => $current_depth,
            'children' => $children);

        return $return;
    }

    /**
     *
     */
    public function renderMenuContent($menu, $level)
    {
        $output = '';
        $class = $menu['is_group'] ? 'mega-group' : '';
        $menu['menu_class'] = ' '.$menu['menu_class'].' '.$class;
        if ($menu['type'] == 'html') {
            $output .= '<li class="'.$menu['menu_class'].'" '.$this->renderAttrs($menu).'>
			<a href="'.$this->getLink($menu).'" target="'.$menu['target'].'" class="has-subhtml">';
            if ($menu['icon_class']) {
                # validate module
                $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
            } elseif ($menu['image']) {
                # validate module
                $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
            }
            if ($menu['show_title'] == 1) {
                $output .= '<span class="menu-title">'.$menu['title'].'</span>';
            }
            if ($menu['text']) {
                $output .= '<span class="sub-title">'.$menu['text'].'</span>';
            }
            if ($menu['description']) {
                # validate module
                $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
            }
            if ($menu['image'] || $menu['icon_class']) {
                # validate module
                $output .= '</span>';
            }
            $output .= '</a>';
            if ($menu['content_text']) {
                # validate module
                $output .= '<div class="menu-content">'.html_entity_decode($menu['content_text'], ENT_QUOTES, 'UTF-8').'</div>';
            }
            $output .= '</li>';
        } else {
            if ($this->hasChild($menu['megamenu_id'])) {

                $output .= '<li class="parent dropdown-submenu'.$menu['menu_class'].'" '.$this->renderAttrs($menu).'>';
                if ($menu['show_title']) {
                    $output .= '<a class="dropdown-toggle" data-toggle="dropdown" href="'.$this->getLink($menu).'">';
                    //$t = '%s';	# validate module

                    if ($menu['icon_class']) {
                        # validate module
                        $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
                    } elseif ($menu['image']) {
                        # validate module
                        $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
                    }

                    if ($menu['show_title'] == 1) {
                        $output .= '<span class="menu-title">'.$menu['title'].'</span>';
                    }
                    if ($menu['text']) {
                        $output .= '<span class="sub-title">'.$menu['text'].'</span>';
                    }
                    if ($menu['description']) {
                        # validate module
                        $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
                    }
                    $output .= '<b class="caret"></b>';
                    if ($menu['image'] || $menu['icon_class']) {
                        # validate module
                        $output .= '</span>';
                    }
                    $output .= '</a>';
                }
                $output .= $this->genFrontTree($menu['megamenu_id'], $level, $menu);
                $output .= '</li>';
            } else if ($menu['megaconfig'] && $menu['megaconfig']->rows) {
                # validate module
                $output .= $this->genMegaMenuByConfig($menu['megamenu_id'], $level, $menu, false);
            } else {
                $output .= '<li class="'.$menu['menu_class'].'" '.$this->renderAttrs($menu).'>';
                if ($menu['show_title']) {
                    $output .= '<a href="'.$this->getLink($menu).'" target="'.$menu['target'].'">';

                    if ($menu['icon_class']) {
                        # validate module
                        $output .= '<span class="hasicon menu-icon-class"><span class="'.$menu['icon_class'].'"></span>';
                    } elseif ($menu['image']) {
                        # validate module
                        $output .= '<span class="hasicon menu-icon" style="background:url(\''.$this->image_base_url.$menu['image'].'\') no-repeat;">';
                    }
                    if ($menu['show_title'] == 1) {
                        $output .= '<span class="menu-title">'.$menu['title'].'</span>';
                    }
                    if ($menu['text']) {
                        $output .= '<span class="sub-title">'.$menu['text'].'</span>';
                    }
                    if ($menu['description']) {
                        # validate module
                        $output .= '<span class="menu-desc">'.$menu['description'].'</span>';
                    }
                    if ($menu['image'] || $menu['icon_class']) {
                        # validate module
                        $output .= '</span>';
                    }

                    $output .= '</a>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

    public function getLink($menu)
    {
        if ($this->edit_string) {
            # validate module
            return '#';
        }
        $value = (int)$menu['item'];
        $result = '';
        $link = new Link();
        $id_lang = Context::getContext()->language->id;
        switch ($menu['type']) {
            case 'product':
                if (Validate::isLoadedObject($obj_pro = new Product($value, true, $id_lang))) {
                    # validate module
                    $result = $link->getProductLink((int)$obj_pro->id, $obj_pro->link_rewrite, null, null, $id_lang);
                }
                break;
            case 'category':
                if (Validate::isLoadedObject($obj_cate = new Category($value, $id_lang))) {
                    # validate module
                    $result = $link->getCategoryLink((int)$obj_cate->id, $obj_cate->link_rewrite, $id_lang);
                }
                break;
            case 'cms':
                if (Validate::isLoadedObject($obj_cms = new CMS($value, $id_lang))) {
                    # validate module
                    $result = $link->getCMSLink((int)$obj_cms->id, $obj_cms->link_rewrite, $id_lang);
                }
                break;
            case 'url':

                // MENU TYPE : URL
                if (preg_match('/http:\/\//',$menu['url'])  ||  preg_match('/https:\/\//',$menu['url'])  ){
                    // ABSOLUTE LINK : default
                }  else {
                    // RELATIVE LINK : auto insert host
                    $host_name = LeoBtmegamenuHelper::getBaseLink().LeoBtmegamenuHelper::getLangLink();
                    $menu['url'] = $host_name.$menu['url'];
                }

                $value = $menu['url'];
                $regex = '((https?|ftp)\:\/\/)?'; // SCHEME
                $regex .= '([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?'; // User and Pass
                $regex .= '([a-z0-9-.]*)\.([a-z]{2,3})'; // Host or IP
                $regex .= '(\:[0-9]{2,5})?'; // Port
                $regex .= '(\/([a-z0-9+\$_-]\.?)+)*\/?'; // Path
                $regex .= '(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?'; // GET Query
                $regex .= '(#[a-z_.-][a-z0-9+\$_.-]*)?'; // Anchor
                if ($value == 'index' || $value == 'index.php') {
                    $result = $link->getPageLink('index.php', false, $id_lang);
                    break;
                } elseif ($value == '#' || preg_match("/^$regex$/", $value)) {
                    $result = $value;
                    break;
                } else {
                    $result = $value;
                }
                //$result = $link->getPageLink($value, false, $id_lang);
                //echo "<pre>".print_r($result,1);die;
                break;
            case 'manufacture':
                if (Validate::isLoadedObject($obj_manu = new Manufacturer($value, $id_lang))) {
                    # validate module
                    $result = $link->getManufacturerLink((int)$obj_manu->id, $obj_manu->link_rewrite, $id_lang);
                }
                break;
            case 'supplier':
                if (Validate::isLoadedObject($obj_supp = new Supplier($value, $id_lang))) {
                    # validate module
                    $result = $link->getSupplierLink((int)$obj_supp->id, $obj_supp->link_rewrite, $id_lang);
                }
                break;
            default:
                $result = '#';
                break;
        }
        return $result;
    }

    /**
     *
     */
    public function getColWidth($menu, $cols)
    {
        $output = array();

        $split = preg_split('#\s+#', $menu['submenu_colum_width']);
        if (!empty($split) && !empty($menu['submenu_colum_width'])) {
            foreach ($split as $sp) {
                $tmp = explode('=', $sp);
                if (count($tmp) > 1) {
                    # validate module
                    $output[trim(preg_replace('#col#', '', $tmp[0]))] = (int)$tmp[1];
                }
            }
        }
        $tmp = array_sum($output);
        $spans = array();
        $t = 0;
        for ($i = 1; $i <= $cols; $i++) {
            if (array_key_exists($i, $output)) {
                # validate module
                $spans[$i] = 'col-sm-'.$output[$i];
            } else {
                if ((12 - $tmp) % ($cols - count($output)) == 0) {
                    # validate module
                    $spans[$i] = 'col-sm-'.((12 - $tmp) / ($cols - count($output)));
                } else {
                    if ($t == 0) {
                        # validate module
                        $spans[$i] = 'col-sm-'.( ((11 - $tmp) / ($cols - count($output))) + 1 );
                    } else {
                        # validate module
                        $spans[$i] = 'col-sm-'.( ((11 - $tmp) / ($cols - count($output))) + 0 );
                    }
                    $t++;
                }
            }
        }
        return $spans;
    }
    
    public function validateFields($die = true, $error_return = false)
    {
        $type = Tools::getValue('type');

        if($type == 'url')
        {
            foreach (Language::getIDs(false) as $id_lang)
            {
                $temp = Tools::getValue('url_'.(int)$id_lang);
                $temp = $this->url[$id_lang];
                if(empty($temp))
                {
                    $message = 'URL is required';
                    if ($die) {
                        throw new PrestaShopException($message);
                    }
                    return $error_return ? $message : false;
                }
            }
        }
        return parent::validateFields($die, $error_return);
    }

    public function getGroups($parram = null, $edit = false)
    {
        $groupBox = array();

        if($edit == true)
        {
            // BACKEND
            if($this->groupBox && Tools::strtolower($this->groupBox) == 'all')
            {
                $groupBox[0] = 'all';
            }elseif($this->groupBox)
            {
                $groupBox = explode(',', $this->groupBox);
            }
        }else{
            // FRONTEND
            $groupBox = explode(',', $parram);
        }

        return $groupBox;
    }
}
