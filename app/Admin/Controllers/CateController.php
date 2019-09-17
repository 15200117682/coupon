<?php

namespace App\Admin\Controllers;

use App\Model\CateModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class CateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\CateModel';

    //展示分类
    public function index(Content $content)
    {

        return $content
            ->title("分类管理")
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }

    public function create(Content $content)
    {
        return $content
            ->title("分类添加")
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CateModel);

        $grid->column('c_id', __('分类id'));
        $grid->column('c_name', __('分类名称'));
        $grid->column('p_id', __('所属父类'));
        $grid->column('order', __('排序方式'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CateModel::findOrFail($id));

        $show->field('c_id', __('分类id'));
        $show->field('c_name', __('分类名称'));
        $show->field('p_id', __('所属父类'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CateModel);

        $form->text('c_name', __('分类名称'));
        $form->number('order', __('顺序'));
        $form->select('p_id', __('所属父类'))->options(CateModel::selectOptions());
        return $form;
    }

}
