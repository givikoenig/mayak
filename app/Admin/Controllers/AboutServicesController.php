<?php

namespace App\Admin\Controllers;

use App\AboutServices;
use Config;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AboutServicesController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Карусель "ДОП.УСЛУГИ"');
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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(AboutServices::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('Заголовок')->editable();
            $grid->subtitle('Подзаголовок')->editable();
            $grid->column('text', 'Текст')->display( function($text) {
                return $text;
            });
            $grid->img("Изображение")->image( asset( 'assets') . '/images/', 100 );
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
        return Admin::form(AboutServices::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title','Заголовок')->rules('required|max:100');
            $form->text('subtitle','Подзаголовок');
            $form->text('text','Текст');
            $form->image('img','Изображение')->fit(Config::get('settings.about_slide_image')['width'],
                        Config::get('settings.about_slide_image')['height'])->name(function($file) {
                            return now()->format('YmdHi'). '.' . $file->guessExtension();
                        });

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
