<?php

namespace App\Admin\Controllers;

use App\Header;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class HeaderController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Заголовки поверх слайдов')
            ->description('СПИСОК ЗАГОТОВОК (отображаться будет только та, которая активирована и стоит по списку выше остальных)')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Заголовки поверх слайдов')
            ->description('просмотр')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Заголовки поверх слайдов')
            ->description('РЕДАКТИРОВАНИЕ')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Заголовки поверх слайдов')
            ->description('СОЗДАНИЕ')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Header);

        $grid->id('Id')->sortable();
        $grid->title('Title')->editable();
        $grid->title2('Title-2')->editable();
        $grid->title3('Title-3')->editable();
        $grid->subtitle('Subtitle')->editable();
        $states = [
            'on'  => ['value' => 1, 'text' => 'YES', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'default'],
        ];
        $grid->active()->switch($states);
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Header::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->title2('Title-2');
        $show->title3('Title-3');
        $show->subtitle('Subtitle');
        $show->active('Active');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Header);

        $form->text('title', 'Title');
        $form->text('title2', 'Title-2');
        $form->text('title3', 'Title-3');
        $form->text('subtitle', 'Subtitle');
        $form->switch('active')->options([1 => 'Активен', 0 => 'Неактивен'])->default(0);

        return $form;
    }
}
