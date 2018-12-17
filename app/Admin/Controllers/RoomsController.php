<?php

namespace App\Admin\Controllers;

use App\Room;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Show;

class RoomsController extends Controller
{
    use ModelForm;

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Блок "Комнаты"');
            $content->description('просмотр');
            $content->body(Admin::show(Room::findOrFail($id), function (Show $show) {
                $show->panel()
                    ->style('primary')
                    ->title('');
                $show->id('ID');
                $show->title('Title');
                $show->subtitle('');
                $show->text(''); 
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

            $content->header('Блок "КОМНАТЫ"');
            $content->description('ОПИСАНИЕ (отображаться будут все активированные)');

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

            $content->header('Блок "КОМНАТЫ"');
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

            $content->header('Блок "КОМНАТЫ"');
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
        return Admin::grid(Room::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->images()->image( asset( 'assets') . '/images/', 100 );
            $grid->title('Заголовок')->editable();
            $grid->subtitle('Подзаголовок')->editable();
            $grid->column('text', 'Текст')->display( function($text) {
                return $text;
            });
            $states = [
                'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
            ];
            $grid->active('Отображать')->switch($states);
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
        return Admin::form(Room::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->multipleImage('images','Галерея')->fit(550,400)->removable();
            $form->text('title','Заголовок');
            $form->text('subtitle','Подзаголовок');
            $form->ckeditor('text', 'Текст');
            $icons = [
                'occupancy' => 'Количество спальных мест - 8',
                'lcd' => 'Спутниковое телевидение',
                'wifi' => 'WiFi доступ к Интернету',
                'pet' => 'Разрешено проживание с домашними животными',
                'air-warm' => 'Круглогодичное отопление',
                'air-cold' => 'Воздушный кондиционер - охлаждение',
            ];
            $form->multipleSelect('icons', 'Иконки')->options($icons);
            $form->switch('active')->options([1 => 'Активен', 0 => 'Неактивен'])->default(0);
            $form->datetime('created_at');
            $form->datetime('updated_at');
        });
    }
}
