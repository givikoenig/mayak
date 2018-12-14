<?php

namespace App\Admin\Controllers;

use App\Room;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RoomsController extends Controller
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

            $content->header('Блок "КОМНАТЫ"');
            $content->description('ОПИСАНИЕ');

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
                'lcd' => 'Жидкокристалльный телевизор',
                'wifi' => 'WiFi доступ к Интернету',
                'pet' => 'Разрешено проживание с домашними животными',
                'air-warm' => 'Воздушный кондиционер - обогрев',
                'air-cold' => 'Воздушный кондиционер - охлаждение',
            ];
            $form->multipleSelect('icons', 'Иконки')->options($icons);
            $form->switch('active')->options([1 => 'Активен', 0 => 'Неактивен'])->default(0);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
