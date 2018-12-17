<?php

namespace App\Admin\Controllers;

use App\Slide;
use Config;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;

class SlideController extends Controller
{
    use ModelForm;
    
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Слайд-шоу');
            $content->description('просмотр');
            $content->body(Admin::show(Slide::findOrFail($id), function (Show $show) {
                $show->panel()
                    ->style('primary')
                    ->title('');
                $show->id('ID');
                $show->img('Изображение')->image();
                $show->active('Опубликовано')->using([1 => 'Да', 0 => 'Нет'])->badge();
                $show->created_at();
                $show->updated_at();

            }));
            
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

            $content->header('Слайды');
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

            $content->header('Слайд ' . $id);
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
        return Admin::grid(Slide::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->img("Изображение")->image( asset( 'assets') . '/images/', 100 );
            $states = [
                'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
            ];
            $grid->active()->switch($states);
            $grid->created_at()->sortable();
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
        return Admin::form(Slide::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('img','Изображение')->fit(Config::get('settings.slide_image')['width'],
                        Config::get('settings.slide_image')['height'])->move('slider')->name(function($file) {
                            return now()->format('YmdHi'). '.' . $file->guessExtension();
                        })->removable();
            $form->switch('active')->options([1 => 'Опубликовано', 0 => 'Не опубликовано'])->default(0);
            $form->datetime('created_at');
            $form->datetime('updated_at');
        });
    }
}
