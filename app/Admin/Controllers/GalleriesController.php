<?php

namespace App\Admin\Controllers;

use App\Gallery;
use Config;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GalleriesController extends Controller
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

            $content->header('ФОТОГАЛЕРЕИ');
            $content->description('СПИСОК (отображаться будет только та, которая активирована и стоит по списку выше остальных)');

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

            $content->header('ФОТОГАЛЕРЕЯ');
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

            $content->header('ФОТОГАЛЕРЕЯ');
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
        return Admin::grid(Gallery::class, function (Grid $grid) {
            
             $grid->actions(function ($actions) {
//                $actions->disableDelete();
//                $actions->disableEdit();
                $actions->disableView();
            });
            $grid->id('ID')->sortable();
//            $grid->img('Общее изображение')->image( asset( 'assets') . '/images/', 100 );
            $grid->title('Название галереи')->editable();
            $grid->desc('Краткое описание')->editable();
            $grid->images()->image( asset( 'assets') . '/images/', 100 );
            $states = [
                'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
            ];
            $grid->active()->switch($states);
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
        return Admin::form(Gallery::class, function (Form $form) {
            $form->tools(function (Form\Tools $tools) {
                $tools->disableView();
            });
            $form->display('id', 'ID');
//            $form->image('img','Изображение')->fit(Config::get('settings.gallery_image')['width'],
//                        Config::get('settings.gallery_image')['height'])->move('gallery')->name(function($file) {
//                            return now()->format('YmdHi'). '.' . $file->guessExtension();
//                        })->removable();
            $form->text('title','Название галереи');
            $form->text('desc','Краткое описание');
            $form->multipleImage('images','Изображения')->fit(Config::get('settings.gallery_slide_image')['width'],
                        Config::get('settings.gallery_slide_image')['height'])->move('gallery')->name(function($file) {
                            return now()->format('YmdHis') .  '.' . $file->guessExtension();
                        })->removable();
            $form->switch('active', 'Отображать')->options([1 => 'Активна', 0 => 'Неактивна'])->default(0);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
