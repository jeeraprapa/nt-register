<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Actions\SendMailGroup;
use App\Admin\Notifications\InviteMail;
use App\Domain\Mail\MailGroup;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MailGroupController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MailGroup';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MailGroup());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('state', __('State'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->add(new SendMailGroup($actions->getKey()));
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
        $show = new Show(MailGroup::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
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
        $form = new Form(new MailGroup());

        $form->text('name', __('Name'));
        $form->text('state', __('State'));

        return $form;
    }

    public function sendMail (MailGroup $group)
    {
        $lists = $group->lists;
        foreach ($lists as $list){
            try {
                $list->notify(new InviteMail());
                $list->state = "Send";
                $list->save();
            }catch (\Exception $e){
                \Log::error($list,$e);
            }
        }
        return redirect('admin/mail-groups');
    }
}
