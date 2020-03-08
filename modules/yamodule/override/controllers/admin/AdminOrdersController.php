<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Yandex Payment Solution
* @author    Yandex.Money <cms@yamoney.ru>
* @copyright © 2015 NBCO Yandex.Money LLC
* @license   https://money.yandex.ru/doc.xml?id=527052
*/

class AdminOrdersController extends AdminOrdersControllerCore
{
    public function printPDFIcons($id, $tr)
    {
        $order = new Order($id);
        $return_btn = ($order->module == 'yamodule')?'<a class="btn btn-default _blank" href="'
            .$this->context->link->getAdminLink('AdminOrders')
            .'&id_order='.$id.'&viewReturns"><i class="icon-gift"></i> Возвраты</a> ':'';
        return  $return_btn. parent::printPDFIcons($id, $tr);
    }

    public function renderList()
    {
        if (Tools::isSubmit('viewReturns')) {
            $id_order = Tools::getValue('id_order', 0);
            if ($id_order) {
                $module = new Yamodule();
                $params = array('order' => new Order($id_order));
                $this->content .= $module->displayReturnsContentTabs($params);
                $this->content .= $module->displayReturnsContent($params);
            } else {
                $this->errors[] = $this->l('There is no order number!');
            }
        } else {
            return parent::renderList();
        }
    }
}
