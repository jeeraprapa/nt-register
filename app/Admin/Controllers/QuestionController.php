<?php

namespace App\Admin\Controllers;

use App\Domain\Questions;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Questions';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Questions());

        $grid->column('id', __('Id'));
        $grid->column('slug', __('Slug'));
        $grid->column('state', __('State'));
//        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

        $grid->column('qr',__('qr'))->qrcode();


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
        $show = new Show(Questions::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('slug', __('Slug'));
        $show->field('state', __('State'));
        $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new Questions());

        $form->text('slug', __('Slug'));
        $form->text('state', __('State'));

        return $form;
    }
}
