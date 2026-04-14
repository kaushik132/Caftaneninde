<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Product;
use \App\Models\Category;
use Illuminate\Support\Str;
use Symfony\Component\Console\Color;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('Category id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
        $grid->column('sale_price', __('Sale price'));
        $grid->column('badge', __('Badge'));
        $grid->column('is_featured', __('Is featured'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('sale_price', __('Sale price'));
        $show->field('badge', __('Badge'));
        $show->field('is_featured', __('Is featured'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Product());
        $form->tab('Product Info', function ($form) {
            $form->select('category_id', __('Category Name'))->options(Category::pluck('name', 'id'));
            $form->text('name', __('Name'));
            $form->hidden('slug', __('Slug'));
            $form->saving(function (Form $form) {
                $form->slug = Str::slug($form->name);
            });
            $form->textarea('description', __('Description'));
            $form->decimal('price', __('Price'));
            $form->decimal('sale_price', __('Sale price'));
            $form->text('product_badge', __('Badge'));
            $form->switch('is_featured', __('Is featured'));
            $form->text('status', __('Status'))->default('active');
        });
            $form->tab('Multiple Product Variant', function ($form) {
            $form->hasMany('variants', 'ProductVariantDetail', function (Form\NestedForm $form) {
                $form->select('size', __('Size'))->options(['XS' => 'Extra Small', 'S' => 'Small', 'M' => 'Medium', 'L' => 'Large', 'XL' => 'Extra Large']);
                $form->color('color', __('Color'));
                $form->color('color_hex', __('Color Hex'))->help('Enter a color hex code (e.g., #FF0000 for red)');
                $form->number('stock_quantity', __('Stock Quantity'));
            });
        });

        $form->tab('Multiple Product Image', function ($form) {
            $form->hasMany('images', 'ProductImageDetail', function (Form\NestedForm $form) {
                $form->text('sort_order', __('Order Num'));
                $form->color('color', __('Color'));
                $form->image('image_path', __('Image Path'));
                $form->switch('is_primary', __('Is Primary'));
            });
        });


        return $form;
    }
}
