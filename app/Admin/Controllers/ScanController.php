<?php

namespace App\Admin\Controllers;

use App\Domain\Scan;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ScanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Scan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Scan());

        $grid->column('id', __('Id'));
        $grid->column('question_id', __('Question id'));
//        $grid->column('register_id', __('Register id'));
        $grid->column('register_id')->display(function () {
            return $this->register->formatted_id;
        });
        $grid->column('register')->display(function () {
            return $this->register->title. ' ' .$this->register->first_name . ' ' . $this->register->last_name;
        });
//        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Scan::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('register_id', __('Register id'));
        $show->field('question_id', __('Question id'));
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
        $form = new Form(new Scan());

        $form->number('register_id', __('Register id'));
        $form->number('question_id', __('Question id'));

        return $form;
    }
}
