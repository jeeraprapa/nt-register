<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Actions\SendQuestionnaire;
use App\Admin\Extensions\Actions\SendReminder;
use App\Admin\Extensions\Tools\MailQuestionnaireAllButton;
use App\Admin\Extensions\Tools\MailReminderRegisterAllButton;
use App\Admin\Notifications\QuestionnaireMail;
use App\Admin\Notifications\ReminderMail;
use App\Domain\Register;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class RegisterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Register';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Register());

        $grid->column('id', __('Id'));

//        $grid->column('title', __('Title'));
//        $grid->column('first_name', __('First name'));
//        $grid->column('last_name', __('Last name'));

        $grid->column('full_name')->display(function () {
            return $this->title. ' ' .$this->first_name . ' ' . $this->last_name;
        });

        $grid->column('score')->display(function () {
            return $this->scores()->count();
        });

        $grid->column('department', __('Department'));
        $grid->column('age', __('Age'));
        $grid->column('position', __('Position'));
        $grid->column('telephone', __('Telephone'));
        $grid->column('mobile_phone', __('Mobile phone'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('size', __('Size'));
        $grid->column('reminder', __('Reminder'));
        $grid->column('questionnaire', __('questionnaire'));
//        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));

//        $grid->column('updated_at', __('Updated at'));

        $grid->tools(function ($tools) {
            $tools->append(new MailReminderRegisterAllButton());
            $tools->append(new MailQuestionnaireAllButton());
        });

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->add(new SendReminder($actions->getKey()));
            $actions->add(new SendQuestionnaire($actions->getKey()));
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
        $show = new Show(Register::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('department', __('Department'));
        $show->field('age', __('Age'));
        $show->field('position', __('Position'));
        $show->field('telephone', __('Telephone'));
        $show->field('mobile_phone', __('Mobile phone'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('size', __('Size'));
        $show->field('reminder', __('Reminder'));
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
        $form = new Form(new Register());

        $form->text('title', __('Title'));
        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->text('department', __('Department'));
        $form->text('age', __('Age'));
        $form->text('position', __('Position'));
        $form->text('telephone', __('Telephone'));
        $form->text('mobile_phone', __('Mobile phone'));
        $form->email('email', __('Email'));
        $form->textarea('address', __('Address'));
        $form->text('size', __('Size'));

        return $form;
    }

    public function sendReminderMails ()
    {
        $registers = Register::all();

        foreach ($registers as $register) {
            $register->notify(new ReminderMail());
            $register->reminder = "send";
            $register->save();
        }

        return redirect('admin/registers');
    }

    public function sendReminder(Register $register)
    {
        try {
            $register->notify(new ReminderMail());
            $register->reminder = "send";
            $register->save();

            $success = new MessageBag([
                'title'   => 'Success',
                'message' => 'Send mail successfully.',
            ]);
            return back()->with(compact('success'));
        }catch (\Exception $e){
            \Log::error($register);
            \Log::error($e);
            $error = new MessageBag([
                'title'   => 'Error',
                'message' => $e->getMessage(),
            ]);
            return back()->with(compact('error'));
        }
    }

    public function sendQuestionnaireMails ()
    {
        $to = request()->get('to');
        if($to > 0){
            $registers = Register::where('id','<=',$to)->get();
        }else{
            $registers = Register::all();
        }

        foreach ($registers as $register){
            try {
                $register->notify(new QuestionnaireMail());
                $register->questionnaire = "Send";
                $register->save();
            }catch (\Exception $e){
                \Log::error($register);
                \Log::error($e);
            }
        }


        $success = new MessageBag([
            'title'   => 'Success',
            'message' => 'Send mails is processing.',
        ]);
        return redirect('admin/registers')->with(compact('success'));
    }

    public function sendQuestionnaire (Register $register)
    {
        try {
            $register->notify(new QuestionnaireMail());
            $register->questionnaire = "Send";
            $register->save();

            $success = new MessageBag([
                'title'   => 'Success',
                'message' => 'Send mail successfully.',
            ]);
            return back()->with(compact('success'));
        }catch (\Exception $e){
            \Log::error($register);
            \Log::error($e);
            $error = new MessageBag([
                'title'   => 'Error',
                'message' => $e->getMessage(),
            ]);
            return back()->with(compact('error'));
        }
    }
}
