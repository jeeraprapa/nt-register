<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('mail-groups', MailGroupController::class);
    $router->resource('mail-lists', MailListController::class);
    $router->resource('registers', RegisterController::class);

    $router->post('/mail-lists/import', 'MailListController@import');
    $router->get('/mail-group/{group}/send-mail', 'MailGroupController@sendMail')->name('mail.group.send');
    $router->get('/send-reminder-mails', 'RegisterController@sendReminderMails')->name('mail.reminder.send');
});
