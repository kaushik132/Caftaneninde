<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Blog;
use \App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Blog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Blog());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));

        $grid->column('thumbnail', __('Thumbnail'))->image('/uploads/', 80, 80);
        $grid->column('is_published', __('Is published'));


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
        $show = new Show(Blog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('content', __('Content'));
        $show->field('thumbnail', __('Thumbnail'));
        $show->field('is_published', __('Is published'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('blog_category_id', __('Blog category id'));
        $show->field('author', __('Author'));
        $show->field('publish_date', __('Publish date'));
        $show->field('read_time', __('Read time'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Blog());

        $form->select('blog_category_id', __('Blog category id'))->options(BlogCategory::where('is_active', true)->pluck('name', 'id'));
        $form->text('title', __('Title'));
        $form->hidden('slug', __('Slug'));
        $form->saving(function (Form $form) {
            $form->slug = Str::slug($form->title);
        });
        $form->text('author', __('Author'))->default('Admin');
        $form->date('publish_date', __('Publish date'))->default(date('Y-m-d'));
        $form->number('read_time', __('Read time'));
        $form->ckeditor('content', __('Content'));
        $form->image('thumbnail', __('Thumbnail'));
        $form->switch('is_published', __('Is published'));

        return $form;
    }
}
