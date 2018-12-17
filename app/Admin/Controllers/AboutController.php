<?php

namespace App\Admin\Controllers;

use App\About;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;

class AboutController extends Controller
{
    use ModelForm;

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Блок "Обо мне"');
            $content->description('просмотр');
            $content->body(Admin::show(About::findOrFail($id)));
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

            $content->header('Блок "ОБО МНЕ"');
            $content->description('СПИСОК ЗАГОТОВОК (отображаться будет только та, которая активирована и стоит по списку выше остальных)');

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

            $content->header('Блок "ОБО МНЕ"');
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

            $content->header('Блок "ОБО МНЕ"');
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
        return Admin::grid(About::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('Заголовок')->editable();
            $grid->subtitle('Подзаголовок')->editable();
            $grid->column('text', 'Текст')->display( function($text) {
                return str_limit($text, 380);
            });

            $states = [
                'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
            ];
            $grid->active()->switch($states);
            $grid->keywords('Ключевики');
            $grid->meta_desc('Мета описание');
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
        return Admin::form(About::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title','Заголовок')->rules('required|max:100');
            $form->text('subtitle','Подзаголовок')->rules('max:255');
            $form->ckeditor('text', 'Текст');
            $form->switch('active')->options([1 => 'Активен', 0 => 'Неактивен'])->default(0);
            $form->text('keywords', 'Ключи для поиска')->rules('max:255');
            $form->text('meta_desc', 'Мета описание')->rules('max:255');
//            $form->display('created_at', 'Created At');
//            $form->display('updated_at', 'Updated At');
            $form->datetime('created_at');
            $form->datetime('updated_at');
        });
    }
}
