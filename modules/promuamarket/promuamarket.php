<?php
/**
 * @author     Roman Prokofyev
 * @copyright  Roman Prokofyev
 */
if (!defined('_PS_VERSION_'))
    exit;

set_time_limit(0);

class promuaMarket extends Module
{
    public function __construct()
    {
        $this->name = 'promuamarket';
        $this->tab = 'smart_shopping';
        $this->version = '1.7.8';
        $this->author = 'mail@vlad.zp.ua';
        $this->need_instance = 1;
        $this->display = 'view';
        $this->bootstrap = true;
        //$this->ps_versions_compliancy = array('min' => '1.5.0.0', 'max' => '1.6');
        $this->module_key = '2149d8638f786d69c1a762f1fbfb8124';

        $this->custom_attributes = array('PROMUAMARKET_COMPANY_NAME', 'PROMUAMARKET_DELIVERY_PRICE', 'PROMUAMARKET_SALES_NOTES',
            'PROMUAMARKET_COUNTRY_OF_ORIGIN', 'PROMUAMARKET_EXPORT_TYPE', 'PROMUAMARKET_MODEL_NAME', 'PROMUAMARKET_DESC_TYPE',
            'PROMUAMARKET_DELIVERY_DELIVERY', 'PROMUAMARKET_DELIVERY_PICKUP', 'PROMUAMARKET_DELIVERY_STORE');
        $this->country_of_origin_attr = Configuration::get('PROMUAMARKET_COUNTRY_OF_ORIGIN');
        $this->model_name_attr = Configuration::get('PROMUAMARKET_MODEL_NAME');

        parent::__construct();

        $this->displayName = $this->l('PromUA Market');

        if ($this->id && !Configuration::get('PROMUAMARKET_COMPANY_NAME'))
            $this->warning = $this->l('You have not yet set your Company Name');
        $this->description = $this->l('Provides price list export to PromUA Market');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');

        // Variables fro price list
        $this->id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->proto_prefix = _PS_BASE_URL_;

        // Get groups
        $attribute_groups = AttributeGroup::getAttributesGroups($this->id_lang);
        $this->attibute_groups = array();
        foreach ($attribute_groups as $group){
            $this->attibute_groups[$group['id_attribute_group']] = $group['public_name'];
        }

        // Get categories
        $this->excluded_cats = explode(',', Configuration::get('PROMUAMARKET_EXCLUDED_CATS'));
        if (!$this->excluded_cats)
            $this->excluded_cats = array();
        $all_cats = Category::getSimpleCategories($this->id_lang);
        $this->selected_cats = array();
        $this->all_cats = array();
        foreach ($all_cats as $cat){
            $this->all_cats[] = $cat['id_category'];
            if (!in_array($cat['id_category'], $this->excluded_cats))
                $this->selected_cats[] = $cat['id_category'];
        }

        //determine image type
//        $this->image_type = 'large_default';
        // satanicman
        $this->image_type = '';
        if(Tools::substr(_PS_VERSION_,0, 5) == '1.5.0')
            $this->image_type = 'large';
    }

    public function install()
    {
        if (!parent::install())
            return false;
        return true;
    }

    public function uninstall()
    {
        foreach ($this->custom_attributes as $attr)
        {
            if (!Configuration::deleteByName($attr))
                return false;
        }
        if (!parent::uninstall())
            return false;
        return true;
    }

    public function getContent()
    {
        $output = '<h2>'.$this->displayName.'</h2>';
        if (Tools::isSubmit('submit'.$this->name))
        {
            foreach ($this->custom_attributes as $i => $value)
            {
                Configuration::updateValue($value, Tools::getValue($value));
            }

            // Categories
            $selected_cats = array();
            foreach (Tools::getValue('categoryBox') as $row)
                $selected_cats[] = $row;
            $this->excluded_cats = array();
            foreach ($this->all_cats as $cat)
                if (!in_array($cat, $selected_cats))
                    $this->excluded_cats[] = $cat;
            Configuration::updateValue('PROMUAMARKET_EXCLUDED_CATS', implode(',', $this->excluded_cats));
            $output .= $this->displayConfirmation($this->l('Settings updated'));
        }
        $output .= $this->renderForm();

        $shop_url = (Configuration::get('PS_SSL_ENABLED') ? _PS_BASE_URL_SSL_ : _PS_BASE_URL_) . __PS_BASE_URI__;
        $default_lang_name = Language::getLanguage($this->id_lang);
        $default_lang_name = $default_lang_name['name'];
        
        
        $output .= '
        <fieldset class="space">
            <legend><img src="../img/admin/unknown.gif" alt="" class="middle" />'.$this->l('Help') . '</legend>
            <h2>'.$this->l('Registration').'</h2>
             <p>'.$this->l('Register your price list on site').'
             <a class="action_module" href="http://partner.market.yandex.ru/">http://partner.market.yandex.ru</a><br/><br/>
             '.$this->l('Use the following address as a price list address').':<br/>
             <div>
             <a  style="padding: 5px; border: 1px solid;" class="action_module" href="'.$shop_url.'modules/promuamarket/">'.$shop_url.'modules/promuamarket/</a>
             </div>
             </p>
             <h2>'.$this->l('Miscellaneous').'</h2>
             <p>'.$this->l('When filling the attribute name fields, it is necessary to use default shop language').'.
             '.$this->l('Current default shop language: '). $default_lang_name .'</p>
             <p class="warn">
               '.$this->l('When using vendor.model offer type, make sure you have filled the manufacturer name field for all your products').'.
             </p>
        </fieldset>';
		
        return $output;
    }

    public function renderForm()
    {
        $this->context->controller->addCSS($this->_path.'css/promuamarket.css', 'all');
        $this->context->controller->addJS($this->_path.'js/promuamarket.js', 'all');

        $offer_type = Tools::getValue('PROMUAMARKET_EXPORT_TYPE', Configuration::get('PROMUAMARKET_EXPORT_TYPE'));
        $root_category = Category::getRootCategory();
        if (!$root_category->id)
        {
            $root_category->id = 0;
            $root_category->name = $this->l('Root');
        }
        $root_category = array('id_category' => (int)$root_category->id, 'name' => $root_category->name);
        $selected_cat = array();
        foreach (Tools::getValue('categoryBox', $this->selected_cats) as $row)
            $selected_cat[] = $row;

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Company Name'),
                        'name' => 'PROMUAMARKET_COMPANY_NAME',
                        'required' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Local delivery cost'),
                        'name' => 'PROMUAMARKET_DELIVERY_PRICE',
                        'required' => true,
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Description'),
                        'name' => 'PROMUAMARKET_DESC_TYPE',
                        'class' => 't',
                        'values' => array(
                            array(
                                'id' => 'PROMUAMARKET_DESC_TYPE_normal',
                                'value' => 0,
                                'label' => $this->l('Full')
                            ),
                            array(
                                'id' => 'PROMUAMARKET_DESC_TYPE_short',
                                'value' => 1,
                                'label' => $this->l('Short')
                            ),
                            array(
                                'id' => 'PROMUAMARKET_DESC_TYPE_full',
                                'value' => 2,
                                'label' => $this->l('Short + Full')
                            )
                        ),
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Offer type'),
                        'name' => 'PROMUAMARKET_EXPORT_TYPE',
                        'class' => 't',
                        'desc' => '<p style="clear:both">согласно ТЗ используется только первый тип, vendor не используется</p>',
                        'values' => array(
                            array(
                                'id' => 'PROMUAMARKET_EXPORT_TYPE_simple',
                                'value' => 0,
                                'label' => $this->l('Simplified')
                            ),
                            array(
                                'id' => 'PROMUAMARKET_EXPORT_TYPE_vendor',
                                'value' => 1,
                                'label' => $this->l('Vendor.model')
                            )
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Country of origin attribute name'),
                        'name' => 'PROMUAMARKET_COUNTRY_OF_ORIGIN',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Model attribute name'),
                        'name' => 'PROMUAMARKET_MODEL_NAME',
                        'desc' => $this->l('Leave empty to use product name as model name'),
                    ),
                    array(
                        'type' => 'categories',
                        'label' => $this->l('Categories to export:'),
                        'name' => 'categoryBox',
                        'values' => array(
                            'trads' => array(
                                'Root' => $root_category,
                                'selected' => $this->l('Selected'),
                                'Check all' => $this->l('Check all'),
                                'Check All' => $this->l('Check All'),
                                'Uncheck All'  => $this->l('Uncheck All'),
                                'Collapse All' => $this->l('Collapse All'),
                                'Expand All' => $this->l('Expand All')
                            ),
                            'selected_cat' => $selected_cat,
                            'input_name' => 'categoryBox[]',
                            'use_radio' => false,
                            'use_search' => false,
                            'disabled_categories' => array(),
                            'top_category' => Category::getTopCategory(),
                            'use_context' => true,
                        ),
                        'tree' => array(
                            'id' => 'categories-tree',
                            'use_checkbox' => true,
                            'use_search' => false,
                            'selected_categories' => $selected_cat,
                            'input_name' => 'categoryBox[]',
                        ),
                        'selected_cat' => $selected_cat,
                    ),
                    array(
                        'type' => 'text',
                        'label' => '&lt;sales_notes&gt;',
                        'name' => 'PROMUAMARKET_SALES_NOTES',
                        'size' => 50,
                        'desc' => $this->l('50 characters max'),
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Delivery settings'),
                        'name' => 'PROMUAMARKET_DELIVERY',
                        'desc' => $this->l('Details: ').'<a class="action_module" href="https://help.yandex.ru/partnermarket/delivery.xml">help.yandex.ru/partnermarket/delivery.xml</a>',
                        'values' => array(
                            'query' => array(
                                array('id' => 'DELIVERY', 'name' => '&lt;delivery&gt;', 'val' => '1'),
                                array('id' => 'PICKUP', 'name' => '&lt;pickup&gt;', 'val' => '1'),
                                array('id' => 'STORE', 'name' => '&lt;store&gt;', 'val' => '1'),
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $this->fields_form = array();
        $helper->table =  $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submit'.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        $output = $helper->generateForm(array($fields_form));
        return $output;
    }

    public function getConfigFieldsValues()
    {
        $configs = array();
        foreach ($this->custom_attributes as $i => $value)
        {
            $configs[$value] = Tools::getValue($value, Configuration::get($value));
        }
        return $configs;
    }

    private function ensureHttpPrefix($link)
    {
        $link->protocol_link = 'http://';
        $link->protocol_content = 'http://';
    }

    function getPictures($prod_id, $link_rewrite)
    {
        $link = $this->context->link;

        $cover = Image::getCover($prod_id);
        $cover_picture = $link->getImageLink($link_rewrite, $prod_id.'-' .$cover['id_image'], $this->image_type);
        $pictures = array($cover_picture);
        $images = Image::getImages($this->id_lang, $prod_id);
        foreach ($images AS $image) {
            if ($image['id_image'] != $cover['id_image']) {
                $picture = $link->getImageLink($link_rewrite, $prod_id.'-'.$image['id_image'], $this->image_type);
                $pictures[] = $picture;
            }
        }
        return array_slice($pictures, 0, 10);
    }

    function getAccessories($product) {
        $accessories_arr = array();
        $accessories = Product::getAccessoriesLight($this->id_lang, $product['id_product']);
        foreach ($accessories as $acc) {
            $accessories_arr[] = $acc['id_product'];
        }
        return $accessories_arr;
    }

    protected function getImages($image_elem) {
        return $image_elem['id_image'];
    }

    function getCombinations($prod_obj, $currency_obj)
    {

        /* Build attributes combinations */
        $combinations = $prod_obj->getAttributeCombinations($this->id_lang);
        $comb_array = array();
        if (is_array($combinations)) {
            $combination_images = $prod_obj->getCombinationImages($this->id_lang);
            foreach ($combinations as $k => $combination) {
                $price_to_convert = Tools::convertPrice($combination['price'], $currency_obj);
                $price = Tools::convertPrice($price_to_convert, $currency_obj);
                $group_name = $this->attibute_groups[$combination['id_attribute_group']];

                $comb_array[$combination['id_product_attribute']]['id_product_attribute'] = $combination['id_product_attribute'];
                $comb_array[$combination['id_product_attribute']]['attributes'][] = array($group_name, $combination['attribute_name']);
                $comb_array[$combination['id_product_attribute']]['price'] = $price;
                $comb_array[$combination['id_product_attribute']]['weight'] = $combination['weight'] . Configuration::get('PS_WEIGHT_UNIT');
                $comb_array[$combination['id_product_attribute']]['unit_impact'] = $combination['unit_price_impact'];
                $comb_array[$combination['id_product_attribute']]['reference'] = $combination['reference'];
                $comb_array[$combination['id_product_attribute']]['ean13'] = $combination['ean13'];
                $comb_array[$combination['id_product_attribute']]['quantity'] = $combination['quantity'];
                // TODO: put back anonymous function when PHP 5.3
                //$get_images = function($image_elem) {
                //    return $image_elem['id_image'];
                //};
                if (isset($combination_images[$combination['id_product_attribute']][0]['id_image'])) {
                    //$comb_array[$combination['id_product_attribute']]['id_images'] = array_map($get_images, $combination_images[$combination['id_product_attribute']]);
                    $comb_array[$combination['id_product_attribute']]['id_images'] = array_map(array($this, 'getImages'), $combination_images[$combination['id_product_attribute']]);
                }
                else {
                    $comb_array[$combination['id_product_attribute']]['id_images'] = array();
                }
            }
        }
        return $comb_array;
    }

    function getFeatures($prod_id)
    {
        $features = Product::getFeaturesStatic((int)$prod_id);
        $params = array();
        foreach ($features as $feature) {
            $feature_name = Feature::getFeature($this->id_lang, $feature['id_feature']);
            $feature_name = $feature_name['name'];
            $feature_values = FeatureValue::getFeatureValueLang($feature['id_feature_value']);
            $feature_value = null;
            foreach ($feature_values as $f_value) {
                $feature_value = $f_value['value'];
                if ($f_value['id_lang'] == $this->id_lang) {
                    break;
                }
            }
            if ($feature_value != null)
                $params[$feature_name] = $feature_value;
        }
        return $params;
    }

    function getParams($combination) {
        $params = array();
        foreach($combination['attributes'] as $attribute) {
            $params[$attribute[0]] = $attribute[1];
        }
        return $params;
    }

    function getPriceList()
    {
        $currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
        if ($currency->iso_code == 'RUB')
            $currency->iso_code = 'RUR';

        $desc_type = Configuration::get('PROMUAMARKET_DESC_TYPE');

        $link = $this->context->link;
        $this->ensureHttpPrefix($link);

		$all_cats = Category::getSimpleCategories($this->id_lang);
		$prods = array();
		foreach($all_cats as $all_cat){
			if ( !in_array($all_cat['id_category'], $this->excluded_cats) ) {
				$svcats[] = $all_cat['id_category'];
				$prodss = Product::getProducts($this->id_lang, 0, 20000000, 'name', 'asc', $all_cat['id_category']);
				$prods = array_merge($prods, $prodss);
			}
		}
		$products = array();
		foreach($prods as $prod) {
			$products[$prod['id_product']] = $prod;
		}

        // Get products
        //$products = Product::getProducts($this->id_lang, 0, 2, 'name', 'asc');
		
		//echo '<pre>';
		//print_R($svcats);
		//print_R($all_cats);
		//print_R($this->excluded_cats);
		//print_R($products);
		//echo '</pre>'; 
		//exit();

        $xml = $this->getDocBody();

        // Offers
        $offers = $xml->createElement("offers");


        foreach ($products AS $product)
        {
            // Get home category
            $category = $product['id_category_default'];

            if ($category == 1)
            {
                $temp_categories = Product::getProductCategories($product['id_product']);
                foreach ($temp_categories as $category)
                {
                    if ($category != 1)
                        break;
                }
                if ($category == 1)
                    continue;
            }
            if (in_array($category, $this->excluded_cats))
                continue;

            $prod_obj = new Product($product['id_product']);
            //$prod_obj->setVideoArray();
            $crewrite = Category::getLinkRewrite($product['id_category_default'], $this->id_lang);

            $accessories = $this->getAccessories($product);
            $features = $this->getFeatures($product['id_product']);
            $combinations = $this->getCombinations($prod_obj, $currency);
            // satanicman видео товара
            /*if($prod_obj->video) {
                foreach ($prod_obj->video as $video) {
                    $product['description'] .= '<iframe width="560" height="315" src="' . $video['url'] .'" frameborder="0" allowfullscreen></iframe>';
                }
            }*/
            // satanicman #END
            // satanicman Ключивые словадля всех языков
            $product['keywords'] = '';
            foreach($prod_obj->meta_keywords as $keywords) {
             $product['keywords'] .= ' ' . $keywords;
            }
            // satanicman #END
            // template array
            $product_item = array('name' => html_entity_decode(str_replace('  ',' ', str_replace(array('&', '@'), array(' and ', 'a'), $product['name']))),
//                                  'description' => html_entity_decode($product['description']),
                                    // satanicman
                                  'description' => $product['description'],
                                    'keywords' => trim($product['keywords']),
                                    // satanicman #END
                                  'id_category_default' => $category,
                                  'vendorCode' => $product['reference'],
                                  'ean13' => $product['ean13'],
                                  'accessories' => implode(',', $accessories),
                                  'vendor' => str_replace('  ',' ', str_replace(array('&', '@'), array(' and ', 'a'), $product['manufacturer_name'])));
            if ($desc_type == 0) $product_item['description'] = $product['description'];
            if ($desc_type == 1) $product_item['description'] = $product['description_short'];
            if ($desc_type == 2) $product_item['description'] = $product['description_short'].'<br><br>'.$product['description'];
//                $product_item['description'] = html_entity_decode($product['description_short']);
                // satanicman
			$fname = $product_item['name'];
                
                
                
                
            if ($this->country_of_origin_attr !='' && array_key_exists($this->country_of_origin_attr, $features)){
                $product_item['country_of_origin'] = $features[$this->country_of_origin_attr];
                unset($features[$this->country_of_origin_attr]);
            }
            if ($this->model_name_attr !='' && array_key_exists($this->model_name_attr, $features)){
                $product_item['name'] = $features[$this->model_name_attr];
                unset($features[$this->model_name_attr]);
            }

            //if (!$product['available_for_order'] or !$product['active'])
            if (!$product['active'])
                continue;

            if (!empty($combinations))
            {
				$qty = 0;
                foreach ($combinations as $combination)
                {
					$qty += $combination['quantity'];
					//echo '<pre>';
					//print_R($combination);
					//echo '</pre>';
				}
				
				
                $pictures = $this->getPictures($product['id_product'], $product['link_rewrite']);
                $available_for_order = 1 <= StockAvailable::getQuantityAvailableByProduct($product['id_product'], 0);


                $url = $link->getProductLink($prod_obj, $product['link_rewrite'], $crewrite);
                $extra_product_item = array(
											'id_product' => $product['id_product'],
											'group_id' => $product['id_product'],
                                            'available_for_order' => $available_for_order,
                                            'price' => $prod_obj->getPrice(),
                                            'pictures' => $pictures,
                                            'quantity_in_stock' => $qty,
                                            //'params' => $features,
                                            'url' => $url,
                                            // satanicman
                                            'old_price' => $prod_obj->getPriceWithoutReduct(true),
                );
                $offer = array_merge($product_item, $extra_product_item);
                $offers->appendChild($this->getOfferElem($offer, $xml, $currency));				
				
				
				
				
				
				
				
				
				
				
				


                foreach ($combinations as $combination)
                {
                    $prod_obj->id_product_attribute = $combination['id_product_attribute'];
                    $available_for_order = 1 <= StockAvailable::getQuantityAvailableByProduct($product['id_product'], $combination['id_product_attribute']);
                    //if (!$available_for_order && !$prod_obj->checkQty(1)) {
                        //continue;
                    //}
                    $addName = ' ';
                    $params = $this->getParams($combination);
					foreach ($params as $key=>$val) {
						$addName .= $key.' '.$val.' ';
					}
					$product_item['name'] = trim($fname.$addName);
					//echo '<br>---<br><pre>';
					//print_R($params);
					//echo '</pre>';
					
					/*
                    $pictures = array();
                    foreach($combination['id_images'] as $id_image){
                        $pictures[] = $link->getImageLink($product['link_rewrite'], $product['id_product'].'-'.$id_image, $this->image_type);
                    }
                    */

                    // satanicman Если нет изображений комбинация то берем изображения самого товара
                    if(!$pictures)
                        $pictures = $this->getPictures($product['id_product'], $product['link_rewrite']);

					//if ( StockAvailable::getQuantityAvailableByProduct($product['id_product'], 0)<=0 ) available_for_order=0;

                    $url = $link->getProductLink($prod_obj, $product['link_rewrite'], $crewrite, null, null, null, $combination['id_product_attribute']);
                    $extra_product_item = array('id_product' => $product['id_product'].'c'.$combination['id_product_attribute'],
												'group_id' => $product['id_product'],
                                                'available_for_order' => $available_for_order,
                                                'price' => $prod_obj->getPrice(true, $combination['id_product_attribute']),
                                                'pictures' => $pictures,
                                                'quantity_in_stock' => StockAvailable::getQuantityAvailableByProduct($product['id_product'], $combination['id_product_attribute']),
                                                'params' => array_merge($params, $features),
                                                'url' => $url,
                                                // satanicman
                                                'old_price' => $prod_obj->getPriceWithoutReduct(true, $combination['id_product_attribute']),
                                                'group_id' => $product['id_product']
                                                // satanicman #END
                    );
                    $offer = array_merge($product_item, $extra_product_item);
                    $offers->appendChild($this->getOfferElem($offer, $xml, $currency));
                }
                
                //exit();

            } else {
                $pictures = $this->getPictures($product['id_product'], $product['link_rewrite']);
                $available_for_order = 1 <= StockAvailable::getQuantityAvailableByProduct($product['id_product'], 0);
                //if (!$available_for_order && !$prod_obj->checkQty(1)) {
                    //continue;
                //}

                $url = $link->getProductLink($prod_obj, $product['link_rewrite'], $crewrite);
                $extra_product_item = array('id_product' => $product['id_product'],
                                            'available_for_order' => $available_for_order,
                                            'price' => $prod_obj->getPrice(),
                                            'pictures' => $pictures,
                                            'quantity_in_stock' => StockAvailable::getQuantityAvailableByProduct($product['id_product'], 0),
                                            'params' => $features,
                                            'url' => $url,
                                            // satanicman
                                            'old_price' => $prod_obj->getPriceWithoutReduct(true),
                );
                $offer = array_merge($product_item, $extra_product_item);
                $offers->appendChild($this->getOfferElem($offer, $xml, $currency));

            }
            $prod_obj->clearCache(true);
        }

        $shop = $xml->getElementsByTagName("shop")->item(0);
        $shop->appendChild($offers);

        return $xml->saveXML();
    }

    function getDocBody() {
        // Get currencies
        $currencies = Currency::getCurrencies();

        // Get categories
        $categories = Category::getCategories($this->id_lang, true, false);

        // Generate XML here
        $xml = new DomDocument('1.0', 'UTF-8');

        $catalog = $xml->createElement("yml_catalog");
        $catalog->setAttribute("date", date('Y-m-d H:i'));
        $shop = $xml->createElement("shop");

        $elem = $xml->createElement("name");
        $elem->appendChild($xml->createCDATASection(html_entity_decode(Configuration::get('PS_SHOP_NAME'))));
        $shop->appendChild($elem);

        $elem = $xml->createElement("company");
        $elem->appendChild($xml->createCDATASection(Configuration::get('PROMUAMARKET_COMPANY_NAME')));
        $shop->appendChild($elem);

        $shop->appendChild($xml->createElement("url", $this->proto_prefix . __PS_BASE_URI__));
        $shop->appendChild($xml->createElement("platform", "PrestaShop"));

        $elem = $xml->createElement("currencies");
        foreach ($currencies as $cur) {
            if ($cur['iso_code'] != 'GBP') {
                if ($cur['iso_code'] == 'RUB')
                    $cur['iso_code'] = 'RUR';
                $subelem = $xml->createElement("currency");
                $subelem->setAttribute("id", $cur['iso_code']);
                $subelem->setAttribute("rate", 1/$cur['conversion_rate']);
                $elem->appendChild($subelem);
            }
        }
        $shop->appendChild($elem);


        $elem = $xml->createElement("categories");
        foreach ($categories as $category) {
            // satanicman Добавил в игнор главную категорию
//            if ($category['id_category']==1 || $category['id_category']==2 || $category['id_category']==123 || $category['id_category']==332 || $category['id_category']==82)
            if ($category['id_category']==1 || $category['id_category']==2)
                continue;

            // satanicman Поле названия для прома
            $category['name'] = isset($category['prom_name']) ? $category['prom_name'] : $category['name'];
            $subelem = $xml->createElement("category");
            // satanicman Имя как символьные данные, т.к. в названиях встречаются недопустимые символы
            $subelem->appendChild($xml->createCDATASection(str_replace('  ', ' ', str_replace(array('&', '@'),array(' and ', 'a'),$category['name']))));
            $subelem->setAttribute("id", $category['id_category']);
            // satanicman убрал главную категорию как родительскую
            if (array_key_exists('id_parent', $category) && $category['id_parent'] != 1 && $category['id_parent'] != 2)
                $subelem->setAttribute("parentId", $category['id_parent']);
            $elem->appendChild($subelem);
            // satanicman #END
        }
        $shop->appendChild($elem);

        $local_delivery_price = Configuration::get('PROMUAMARKET_DELIVERY_PRICE');
        if ($local_delivery_price or $local_delivery_price === "0") {
            $shop->appendChild($xml->createElement("local_delivery_cost", $local_delivery_price));
        }

        $catalog->appendChild($shop);
        $xml->appendChild($catalog);

        return $xml;
    }

    function getOfferElem($offer, $xml, $currency) {
        $subelem = $xml->createElement("offer");
        if ($offer['available_for_order'])
            $subelem->setAttribute("available", 'true');
        else
            $subelem->setAttribute("available", 'false');

        $subelem->setAttribute("id", $offer['id_product']);

        // satanicman
        if(isset($offer['group_id']) && $offer['group_id'])
            $subelem->setAttribute("group_id", $offer['group_id']);
        if(isset($offer['keywords']) && $offer['keywords']){
            $elem = $xml->createElement("keywords");
            $elem->appendChild($xml->createCDATASection($offer['keywords']));
            $subelem->appendChild($elem);
        }
        // satanicman #END

        $subelem->appendChild($xml->createElement("url", $offer['url']));
        $subelem->appendChild($xml->createElement("price", $offer['price']));
        $subelem->appendChild($xml->createElement("quantity_in_stock", $offer['quantity_in_stock']));
        $subelem->appendChild($xml->createElement("vendorCode", $offer['vendorCode']));
        // satanicman
        if($offer['old_price'] && $offer['price'] < $offer['old_price'])
            $subelem->appendChild($xml->createElement("oldprice", $offer['old_price']));
        // satanicman #END
        $subelem->appendChild($xml->createElement("currencyId", $currency->iso_code));
        $subelem->appendChild($xml->createElement("categoryId", $offer['id_category_default']));
        foreach ($offer['pictures'] as $pic) {
            $subelem->appendChild($xml->createElement("picture", $pic));
        }
        if (Configuration::get('PROMUAMARKET_DELIVERY_STORE'))
            $subelem->appendChild($xml->createElement("store", "true"));
        if (Configuration::get('PROMUAMARKET_DELIVERY_PICKUP'))
            $subelem->appendChild($xml->createElement("pickup", "true"));
        if (Configuration::get('PROMUAMARKET_DELIVERY_DELIVERY'))
            $subelem->appendChild($xml->createElement("delivery", "true"));


        if (Configuration::get('PROMUAMARKET_EXPORT_TYPE') == 0) {
            $this->appendSimpleOffer($subelem, $offer, $xml);
        }
        else {
            $this->appendVendorOffer($subelem, $offer, $xml);
        }
        return $subelem;
    }

    function appendSimpleOffer($subelem, $offer, $xml)
    {
        $elem = $xml->createElement("name");
        $elem->appendChild($xml->createCDATASection($offer['name']));
        $subelem->appendChild($elem);

        if (array_key_exists('vendor', $offer))
            $subelem->appendChild($xml->createElement("vendor", $offer['vendor']));

        $elem = $xml->createElement("description");
//        $elem->appendChild($xml->createCDATASection(strip_tags($offer['description'])));
        // satanicman Не убирать форматирование текста
        $elem->appendChild($xml->createCDATASection($offer['description']));
        $subelem->appendChild($elem);
        if (Configuration::get('PROMUAMARKET_SALES_NOTES'))
            $subelem->appendChild($xml->createElement("sales_notes", Configuration::get('PROMUAMARKET_SALES_NOTES')));

        if (array_key_exists('country_of_origin', $offer))
            $subelem->appendChild($xml->createElement("country_of_origin", $offer['country_of_origin']));

        foreach ($offer['params'] as $param_name => $value) {
            $elem = $xml->createElement("param", $value);
            $elem->setAttribute("name", $param_name);
            $subelem->appendChild($elem);
        }
    }

    function appendVendorOffer($subelem, $offer, $xml)
    {
        $subelem->setAttribute("type", 'vendor.model');
        $subelem->appendChild($xml->createElement("vendor", $offer['vendor']));

        $elem = $xml->createElement("model");
        $elem->appendChild($xml->createCDATASection($offer['name']));
        $subelem->appendChild($elem);

        $elem = $xml->createElement("description");
//        $elem->appendChild($xml->createCDATASection(strip_tags($offer['description'])));
        // satanicman Не убирать форматирование текста
        $elem->appendChild($xml->createCDATASection($offer['description']));
        $subelem->appendChild($elem);
        if (Configuration::get('PROMUAMARKET_SALES_NOTES'))
            $subelem->appendChild($xml->createElement("sales_notes", Configuration::get('PROMUAMARKET_SALES_NOTES')));

        if (array_key_exists('country_of_origin', $offer))
            $subelem->appendChild($xml->createElement("country_of_origin", $offer['country_of_origin']));

        if (array_key_exists('accessories', $offer) && $offer['accessories'])
            $subelem->appendChild($xml->createElement("rec", $offer['accessories']));

        foreach ($offer['params'] as $param_name => $value) {
            $elem = $xml->createElement("param", $value);
            $elem->setAttribute("name", $param_name);
            $subelem->appendChild($elem);
        }
    }

}
