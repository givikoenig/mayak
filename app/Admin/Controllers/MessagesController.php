<?php

namespace App\Admin\Controllers;

use App\Message;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;

class MessagesController extends Controller
{
    use ModelForm;
    
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Входящие сообщения');
            $content->description('просмотр');
            $content->body(Admin::show(Message::findOrFail($id)));
        });
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Сообщения от посетителей сайта');
            $content->description('СПИСОК');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Сообщения от посетителей сайта');
            $content->description('РЕДАКТИРОВАНИЕ');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Сообщения от посетителей сайта');
            $content->description('СОЗДАНИЕ');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Message::class, function (Grid $grid) {
            $grid->model()->orderBy('created_at','desc');
            $grid->id('ID')->sortable();
            $grid->sig('Имя');
            $grid->email()->display(function ($email) {
                return "<a href='mailto:{$email}'>{$email}</a>";
            });
            $grid->text('Сообщение')->display(function($text) {
                return str_limit($text, 200);
            });

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Message::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('sig','Имя');
            $form->email('email', 'Email');
            $form->ckeditor('text', 'Текст');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
