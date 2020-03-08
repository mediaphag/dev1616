<?php
/**
 * 2007-2015 Apollotheme
 *
 * NOTICE OF LICENSE
 *
 * ApPageBuilder is module help you can build content for your shop
 *
 * DISCLAIMER
 *
 *  @Module Name: AP Page Builder
 *  @author    Apollotheme <apollotheme@gmail.com>
 *  @copyright 2007-2015 Apollotheme
 *  @license   http://apollotheme.com - prestashop template provider
 */

if (!defined('_PS_VERSION_')) {
    # module validation
    exit;
}

class ApFullSlider extends ApShortCodeBase
{
    public $name = 'ApFullSlider';

    public function getInfo()
    {
        return array('label' => $this->l('Full Slider'), 'position' => 6,
            'desc' => $this->l('You can create Inner slideshow'), 'icon_class' => 'icon icon-chevron-right',
            'tag' => 'content slider');
    }

    public function getConfigList()
    {
        $href = Context::getContext()->link->getAdminLink('AdminApPageBuilderImages').'&imgDir=images&is_ajax=true';
        $ad = __PS_BASE_URI__.basename(_PS_ADMIN_DIR_);
        $iso_tiny_mce = Context::getContext()->language->iso_code;
        $iso_tiny_mce = (file_exists(_PS_JS_DIR_.'tiny_mce/langs/'.$iso_tiny_mce.'.js') ? $iso_tiny_mce : 'en');
        $list_slider = '<button type="button" id="btn-add-slider" class="btn btn-default">
				<i class="icon-plus-sign-alt"></i> '.$this->l('Add slider').'</button><hr/>';
        $list_slider_button = '<div id="frm-slider" class="hide">
							<div class="form-group">
								<div class="col-lg-12 ">
									<button type="button" class="btn btn-primary btn-save-fullslider" 
									data-error="'.$this->l('Please enter the title and description').'">'.$this->l('Save').'</button>
									<button type="button" class="btn btn-default btn-reset-fullslider">'.$this->l('Reset').'</button>
									<button type="button" class="btn btn-default btn-cancel-fullslider">'.$this->l('Cancel').'</button>
								</div>
							</div>
							<script>
								var ad = "'.$ad.'";
								var iso = "'.$iso_tiny_mce.'";
							</script>
							<hr/>
						</div>';
        $input = array(
            array(
                'type' => 'text',
                'name' => 'title',
                'label' => $this->l('Title'),
                'desc' => $this->l('Auto hide if leave it blank'),
                'lang' => 'true',
                'default' => ''
            ),
            array(
                'type' => 'text',
                'name' => 'class',
                'label' => $this->l('Class'),
                'desc' => $this->l('css class cover the slider, example: container, container-fluid,...'),
                'default' => 'container'
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Width slider'),
                'desc' => $this->l('Example: 100%, 1170px'),
                'name' => 'width',
                'default' => '100%'
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Height slider'),
                'name' => 'height',
                'default' => '400px',
                'desc' => $this->l('Example: 100%, 400px'),
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Interval'),
                'name' => 'interval',
                'default' => 2000,
            ),
            array(
                'type' => 'switch',
                'label' => $this->l('Display title in slider'),
                'name' => 'display_title',
                'values' => ApPageSetting::returnYesNo(),
                'default' => '1',
            ),
            array(
                'type' => 'switch',
                'label' => $this->l('Display indicators in slider'),
                'name' => 'display_indicators',
                'values' => ApPageSetting::returnYesNo(),
                'default' => '1',
            ),
            array(
                'type' => 'switch',
                'label' => $this->l('Open new tab'),
                'desc' => $this->l('Open new tab when click to link in slider'),
                'name' => 'is_open',
                'values' => ApPageSetting::returnYesNo(),
                'default' => '0',
            ),
            array(
                'type' => 'html',
                'name' => 'default_html',
                'html_content' => '<div class="alert alert-info">'.$this->l('Next step: Add content for sliders').'</div>'
            ),
            array(
                'type' => 'html',
                'name' => 'default_html',
                'html_content' => $list_slider
            ),
            array(
                'label' => $this->l('Image'),
                'type' => 'selectImg',
                'href' => $href,
                'name' => 'temp_image',
                'lang' => true,
                'class' => 'item-add-slide ignore-lang',
                'form_group_class' => 'apfullslider-row select-img',
            ),
            array(
                'type' => 'text',
                'name' => 'temp_title',
                'label' => $this->l('Title'),
                'lang' => 'true',
                'default' => '',
                'class' => 'item-add-slide ignore-lang',
                'form_group_class' => 'apfullslider-row title-slide',
            ),
            array(
                'type' => 'text',
                'name' => 'temp_link',
                'label' => $this->l('Link'),
                'lang' => 'true',
                'default' => '',
                'class' => 'item-add-slide ignore-lang',
                'form_group_class' => 'apfullslider-row link-slide',
            ),
            array(
                'type' => 'textarea',
                'label' => $this->l('Description'),
                'name' => 'temp_descript',
                'cols' => 40,
                'rows' => 10,
                'value' => true,
                'lang' => true,
                'default' => '',
                'class' => 'item-add-slide ignore-lang',
                'form_group_class' => 'apfullslider-row description-slide',
            ),
            array(
                'type' => 'html',
                'name' => 'default_html',
                'html_content' => $list_slider_button
            ),
            array(
                'type' => 'hidden',
                'name' => 'total_slider',
                'default' => ''
            ),
        );
        return $input;
    }

    public function addConfigList($values)
    {
        // Get value with keys special
        $config_val = array();
        $total = isset($values['total_slider']) ? $values['total_slider'] : '';
        $arr = explode('|', $total);
        $inputs = array('tit', 'img', 'link', 'descript');
        $languages = Language::getLanguages(false);
        foreach ($arr as $i) {
            foreach ($inputs as $config) {
                foreach ($languages as $lang) {
                    $config_val[$config][$i][$lang['id_lang']] = str_replace($this->str_search, $this->str_relace_html_admin, Tools::getValue($config.'_'.$i.'_'.$lang['id_lang'], ''));
                    // print_r($config_val);
                    // echo '====';
                }
            }
        }
        $list_slider = '<ul id="list-slider">';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $default_lang = $lang->id;
        foreach ($arr as $i) {
            if ($i) {
                $list_slider .= '<li id="'.$i.'">';
                foreach ($languages as $lang) {
                    $lbl = '';
                    if ($config_val['tit'][$i][$lang['id_lang']]) {
                        // validate module
                        $lbl .= '<div class="col-lg-5">'.$config_val['tit'][$i][$lang['id_lang']].'</div>';
                    }
                    if ($config_val['img'][$i][$lang['id_lang']]) {
                        // validate module
                        $lbl .= '<img src="'.$this->theme_img_module.$config_val['img'][$i][$lang['id_lang']].'">';
                    }

                    $descript = str_replace('\r\n', '', htmlspecialchars($config_val['descript'][$i][$lang['id_lang']]));
                    $descript = Tools::stripslashes($descript); //htmlspecialchars($config_val['descript'][$i]);
                    if ($default_lang == $lang['id_lang']) {
                        $list_slider .= '<div class="col-lg-9">'.$lbl.'</div>';
                        $list_slider .= '<div class="col-lg-3">
                                        <button class="btn-edit-fullslider btn btn-info" type="button"><i class="icon-pencil"></i> '
                                .$this->l('Edit').'</button>
                                        <button class="btn-delete-fullslider btn btn-danger" type="button"><i class="icon-trash"></i> '
                                .$this->l('Delete').'</button>
                                    </div>';
                    }
                    $temp_name = $i.'_'.$lang['id_lang'];
                    $list_slider .= '<input type="hidden" id="tit_'.$temp_name.'" value="'
                            .htmlspecialchars($config_val['tit'][$i][$lang['id_lang']]).'" name="tit_'.$temp_name.'"/>';
                    $list_slider .= '<input type="hidden" id="img_'.$temp_name.'" value="'
                            .htmlspecialchars($config_val['img'][$i][$lang['id_lang']]).'" name="img_'.$temp_name.'"/>';
                    $list_slider .= '<input type="hidden" id="link_'.$temp_name.'" value="'
                            .htmlspecialchars($config_val['link'][$i][$lang['id_lang']]).'" name="link_'.$temp_name.'"/>';
                    $list_slider .= '<input type="hidden" id="descript_'.$temp_name
                            .'" value="'.$descript.'" name="descript_'.$temp_name.'"/>';
                }
                $list_slider .= '</li>';
            }
        }
        $list_slider .= '</ul>';
        $list_slider .= '<ul id="temp-list" class="hide">';
        $list_slider .= '<li id="">';
        $list_slider .= '<div class="col-lg-9"></div>';
        $list_slider .= '<div class="col-lg-3">
                            <button class="btn-edit-fullslider btn btn-info" type="button"><i class="icon-pencil"></i> '.$this->l('Edit').'</button>
                            <button class="btn-delete-fullslider btn btn-danger" type="button"><i class="icon-trash"></i> '.$this->l('Delete').'</button>
                        </div>';
        $list_slider .= '</li>';
        $input = array(
            'type' => 'html',
            'name' => 'default_html',
            'html_content' => $list_slider
        );
        // Append new input type html
        $this->config_list[] = $input;
    }

    public function prepareFontContent($assign, $module = null)
    {
        // validate module
        unset($module);
        $total_slider = isset($assign['formAtts']['total_slider']) ? $assign['formAtts']['total_slider'] : '';
        $list = explode('|', $total_slider);
        $sliders = array();
        $lang = Language::getLanguage(Context::getContext()->language->id);
        $lang_default = $lang['id_lang'];
        foreach ($list as $item) {
            if ($item) {
                $temp = $item.'_'.$lang_default;
                $slider = array();
                $slider['id'] = $item;
                $slider['title'] = isset($assign['formAtts']['tit_'.$temp]) ? $assign['formAtts']['tit_'.$temp] : '';
                $slider['link'] = isset($assign['formAtts']['link_'.$temp]) ? $assign['formAtts']['link_'.$temp] : '';
                if (isset($assign['formAtts']['img_'.$temp]) && $assign['formAtts']['img_'.$temp]) {
                    // validate module
                    $slider['img'] = _THEME_IMG_DIR_.'modules/'.$this->module_name.'/images/'.$assign['formAtts']['img_'.$temp];
                } else {
                    // validate module
                    $slider['img'] = '';
                }

                $desc = isset($assign['formAtts']['descript_'.$temp]) ? $assign['formAtts']['descript_'.$temp] : '';
                $slider['descript'] = str_replace($this->str_search, $this->str_relace_html, $desc);
                //$slider['descript'] = $assign['formAtts']['descript_'.$temp];
                $sliders[] = $slider;
            }
        }
        $assign['formAtts']['is_open'] = isset($assign['formAtts']['is_open']) ? $assign['formAtts']['is_open'] : 0;
        $assign['formAtts']['slides'] = $sliders;
        return $assign;
    }
}
