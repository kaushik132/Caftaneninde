<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Order;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('user.name', __('User id'));
        $grid->column('order_number', __('Order number'));
        $grid->column('total_amount', __('Total amount'));
        $grid->column('discount_amount', __('Discount amount'));
        $grid->column('shipping_amount', __('Shipping amount'));
        $grid->column('status', __('Status'));
        $grid->column('payment_method', __('Payment method'));
        $grid->column('payment_status', __('Payment status'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('order_number', __('Order number'));
        $show->field('total_amount', __('Total amount'));
        $show->field('discount_amount', __('Discount amount'));
        $show->field('shipping_amount', __('Shipping amount'));
        $show->field('status', __('Status'));
        $show->field('payment_method', __('Payment method'));
        $show->field('payment_status', __('Payment status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->number('user_id', __('User id'));
        $form->text('order_number', __('Order number'));
        $form->decimal('total_amount', __('Total amount'));
        $form->decimal('discount_amount', __('Discount amount'))->default(0.00);
        $form->decimal('shipping_amount', __('Shipping amount'))->default(0.00);
        $form->text('status', __('Status'))->default('pending');
        $form->text('payment_method', __('Payment method'));
        $form->text('payment_status', __('Payment status'))->default('pending');

        return $form;
    }
}
