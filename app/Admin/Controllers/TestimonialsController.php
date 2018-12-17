<?php

namespace App\Admin\Controllers;

use App\Testimonial;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;

class TestimonialsController extends Controller
{
    use ModelForm;
    
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Блок "Обо мне"');
            $content->description('просмотр');
            $content->body(Admin::show(Testimonial::findOrFail($id)));
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

            $content->header('ОТЗЫВЫ');
            $content->description('СПИСОК (отображаться будут все активированные)');

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

            $content->header('ОТЗЫВЫ');
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

            $content->header('ОТЗЫВЫ');
            $content->description('СОЗДАНИЕ :)');

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
        return Admin::grid(Testimonial::class, function (Grid $grid) {
            $grid->model()->orderBy('created_at','desc');
            $grid->id('ID')->sortable();
            $grid->sig('Имя');
            $grid->email()->display(function ($email) {
                return "<a href='mailto:{$email}'>{$email}</a>";
            });
            $grid->text('Отзыв')->display(function($text) {
                return str_limit($text, 200);
            });
            
            $states = [
                'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
            ];
            $grid->active('Опубликовать')->switch($states);
            $grid->created_at()->sortable();;
            $grid->updated_at()->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Testimonial::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('sig','Имя');
            $form->email('email', 'Email');
            $form->ckeditor('text', 'Текст');
            $form->switch('active', 'Отображение на странице')->options([1 => 'Активен', 0 => 'Неактивен'])->default(0);
            $form->datetime('created_at');
            $form->datetime('updated_at');
        });
    }
}
