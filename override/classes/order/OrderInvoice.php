<?php
class OrderInvoice extends OrderInvoiceCore
{
	/*
    * module: modrefchange
    * date: 2018-06-23 07:06:17
    * version: 1.5.5.1
    */
    public function add($autodate = true, $null_values = true)
	{
		$order = new Order($this->id_order);
		$cart = new Cart($order->id_cart);
		Hook::exec('actionBeforeAddOrderInvoice', array('order_invoice'=>$this, 'order'=>$order,'cart'=>$cart));
		return parent::add($autodate, $null_values);
	}
}