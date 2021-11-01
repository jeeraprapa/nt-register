<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tools\ImportButton;
use App\Admin\Import\MailListImport;
use App\Domain\Mail\MailGroup;
use App\Domain\Mail\MailList;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MailListController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MailList';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MailList());

        $grid->column('id', __('Id'));
        $grid->column('mail_group_id', __('Mail group id'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('email', __('Email'));
        $grid->column('account', __('Account'));
        $grid->column('department', __('Department'));
        $grid->column('state', __('State'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

        $grid->tools(function ($tools) {
            $tools->append(new ImportButton());
        });

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
        $show = new Show(MailList::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('mail_group_id', __('Mail group id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('email', __('Email'));
        $show->field('account', __('Account'));
        $show->field('department', __('Department'));
        $show->field('state', __('State'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MailList());

        $form->select('mail_group_id', __('Mail group'))->options(MailGroup::all()->pluck('name','id'));

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->email('email', __('Email'));
        $form->text('account', __('Account'));
        $form->text('department', __('Department'));
        $form->text('state', __('State'));

        return $form;
    }

    protected function import(Content $content, Request $request)
    {
        $file = $request->file('file');

        $import = Excel::import(new MailListImport(), $file);

        return redirect('admin/mail-lists');
    }
}
