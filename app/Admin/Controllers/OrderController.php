<?php

namespace App\Admin\Controllers;

use App\Model\OrderModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderModel());
        $grid->model()->orderBy('order_id','desc');

        $grid->column('order_id', __('Order id'));
        $grid->column('order_sn', __('Order sn'));
        $grid->column('user_id', __('User id'));
        $grid->column('order_status', __('Order status'));
        $grid->column('shipping_status', __('Shipping status'));
        $grid->column('pay_status', __('Pay status'));
        $grid->column('consignee', __('Consignee'));
        $grid->column('country', __('Country'));
        $grid->column('province', __('Province'));
        $grid->column('city', __('City'));
        $grid->column('district', __('District'));
        $grid->column('best_time', __('Best time'));
        $grid->column('postscript', __('Postscript'));
        $grid->column('shipping_id', __('Shipping id'));
        $grid->column('shipping_name', __('Shipping name'));
        $grid->column('pay_id', __('Pay id'));
        $grid->column('pay_name', __('Pay name'));
        $grid->column('how_oos', __('How oos'));
        $grid->column('how_surplus', __('How surplus'));
        $grid->column('pack_name', __('Pack name'));
        $grid->column('card_name', __('Card name'));
        $grid->column('card_message', __('Card message'));
        $grid->column('inv_payee', __('Inv payee'));
        $grid->column('inv_content', __('Inv content'));
        $grid->column('goods_amount', __('Goods amount'));
        $grid->column('shipping_fee', __('Shipping fee'));
        $grid->column('insure_fee', __('Insure fee'));
        $grid->column('pay_fee', __('Pay fee'));
        $grid->column('pack_fee', __('Pack fee'));
        $grid->column('card_fee', __('Card fee'));
        $grid->column('money_paid', __('Money paid'));
        $grid->column('surplus', __('Surplus'));
        $grid->column('integral', __('Integral'));
        $grid->column('integral_money', __('Integral money'));
        $grid->column('bonus', __('Bonus'));
        $grid->column('order_amount', __('Order amount'));
        $grid->column('from_ad', __('From ad'));
        $grid->column('referer', __('Referer'));
        $grid->column('add_time', __('Add time'));
        $grid->column('confirm_time', __('Confirm time'));
        $grid->column('pay_time', __('Pay time'));
        $grid->column('shipping_time', __('Shipping time'));
        $grid->column('pack_id', __('Pack id'));
        $grid->column('card_id', __('Card id'));
        $grid->column('bonus_id', __('Bonus id'));
        $grid->column('invoice_no', __('Invoice no'));
        $grid->column('extension_code', __('Extension code'));
        $grid->column('extension_id', __('Extension id'));
        $grid->column('to_buyer', __('To buyer'));
        $grid->column('pay_note', __('Pay note'));
        $grid->column('agency_id', __('Agency id'));
        $grid->column('inv_type', __('Inv type'));
        $grid->column('tax', __('Tax'));
        $grid->column('is_separate', __('Is separate'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('discount', __('Discount'));
        $grid->column('order_type', __('Order type'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(OrderModel::findOrFail($id));

        $show->field('order_id', __('Order id'));
        $show->field('order_sn', __('Order sn'));
        $show->field('user_id', __('User id'));
        $show->field('order_status', __('Order status'));
        $show->field('shipping_status', __('Shipping status'));
        $show->field('pay_status', __('Pay status'));
        $show->field('consignee', __('Consignee'));
        $show->field('country', __('Country'));
        $show->field('province', __('Province'));
        $show->field('city', __('City'));
        $show->field('district', __('District'));
        $show->field('best_time', __('Best time'));
        $show->field('postscript', __('Postscript'));
        $show->field('shipping_id', __('Shipping id'));
        $show->field('shipping_name', __('Shipping name'));
        $show->field('pay_id', __('Pay id'));
        $show->field('pay_name', __('Pay name'));
        $show->field('how_oos', __('How oos'));
        $show->field('how_surplus', __('How surplus'));
        $show->field('pack_name', __('Pack name'));
        $show->field('card_name', __('Card name'));
        $show->field('card_message', __('Card message'));
        $show->field('inv_payee', __('Inv payee'));
        $show->field('inv_content', __('Inv content'));
        $show->field('goods_amount', __('Goods amount'));
        $show->field('shipping_fee', __('Shipping fee'));
        $show->field('insure_fee', __('Insure fee'));
        $show->field('pay_fee', __('Pay fee'));
        $show->field('pack_fee', __('Pack fee'));
        $show->field('card_fee', __('Card fee'));
        $show->field('money_paid', __('Money paid'));
        $show->field('surplus', __('Surplus'));
        $show->field('integral', __('Integral'));
        $show->field('integral_money', __('Integral money'));
        $show->field('bonus', __('Bonus'));
        $show->field('order_amount', __('Order amount'));
        $show->field('from_ad', __('From ad'));
        $show->field('referer', __('Referer'));
        $show->field('add_time', __('Add time'));
        $show->field('confirm_time', __('Confirm time'));
        $show->field('pay_time', __('Pay time'));
        $show->field('shipping_time', __('Shipping time'));
        $show->field('pack_id', __('Pack id'));
        $show->field('card_id', __('Card id'));
        $show->field('bonus_id', __('Bonus id'));
        $show->field('invoice_no', __('Invoice no'));
        $show->field('extension_code', __('Extension code'));
        $show->field('extension_id', __('Extension id'));
        $show->field('to_buyer', __('To buyer'));
        $show->field('pay_note', __('Pay note'));
        $show->field('agency_id', __('Agency id'));
        $show->field('inv_type', __('Inv type'));
        $show->field('tax', __('Tax'));
        $show->field('is_separate', __('Is separate'));
        $show->field('parent_id', __('Parent id'));
        $show->field('discount', __('Discount'));
        $show->field('order_type', __('Order type'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderModel());

        $form->text('order_sn', __('Order sn'));
        $form->number('user_id', __('User id'));
        $form->switch('order_status', __('Order status'));
        $form->switch('shipping_status', __('Shipping status'));
        $form->switch('pay_status', __('Pay status'));
        $form->text('consignee', __('Consignee'));
        $form->text('country', __('Country'));
        $form->text('province', __('Province'));
        $form->text('city', __('City'));
        $form->text('district', __('District'));
        $form->text('best_time', __('Best time'));
        $form->text('postscript', __('Postscript'));
        $form->switch('shipping_id', __('Shipping id'));
        $form->text('shipping_name', __('Shipping name'));
        $form->switch('pay_id', __('Pay id'));
        $form->text('pay_name', __('Pay name'));
        $form->text('how_oos', __('How oos'));
        $form->text('how_surplus', __('How surplus'));
        $form->text('pack_name', __('Pack name'));
        $form->text('card_name', __('Card name'));
        $form->text('card_message', __('Card message'));
        $form->text('inv_payee', __('Inv payee'));
        $form->text('inv_content', __('Inv content'));
        $form->decimal('goods_amount', __('Goods amount'))->default(0.00);
        $form->decimal('shipping_fee', __('Shipping fee'))->default(0.00);
        $form->decimal('insure_fee', __('Insure fee'))->default(0.00);
        $form->decimal('pay_fee', __('Pay fee'))->default(0.00);
        $form->decimal('pack_fee', __('Pack fee'))->default(0.00);
        $form->decimal('card_fee', __('Card fee'))->default(0.00);
        $form->decimal('money_paid', __('Money paid'))->default(0.00);
        $form->decimal('surplus', __('Surplus'))->default(0.00);
        $form->number('integral', __('Integral'));
        $form->decimal('integral_money', __('Integral money'))->default(0.00);
        $form->decimal('bonus', __('Bonus'))->default(0.00);
        $form->decimal('order_amount', __('Order amount'))->default(0.00);
        $form->number('from_ad', __('From ad'));
        $form->text('referer', __('Referer'));
        $form->number('add_time', __('Add time'));
        $form->number('confirm_time', __('Confirm time'));
        $form->number('pay_time', __('Pay time'));
        $form->number('shipping_time', __('Shipping time'));
        $form->switch('pack_id', __('Pack id'));
        $form->switch('card_id', __('Card id'));
        $form->number('bonus_id', __('Bonus id'));
        $form->text('invoice_no', __('Invoice no'));
        $form->text('extension_code', __('Extension code'));
        $form->number('extension_id', __('Extension id'));
        $form->text('to_buyer', __('To buyer'));
        $form->text('pay_note', __('Pay note'));
        $form->number('agency_id', __('Agency id'));
        $form->text('inv_type', __('Inv type'));
        $form->decimal('tax', __('Tax'))->default(0.00);
        $form->switch('is_separate', __('Is separate'));
        $form->number('parent_id', __('Parent id'));
        $form->decimal('discount', __('Discount'))->default(0.00);
        $form->switch('order_type', __('Order type'))->default(1);

        return $form;
    }
}
