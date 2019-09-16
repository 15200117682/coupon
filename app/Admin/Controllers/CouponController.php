<?php

namespace App\Admin\Controllers;

use App\Model\CouponModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class CouponController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\CouponModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponModel);

        $grid->column('title', __('优惠券名称'));
        $grid->column('id', __('编号'));
        $grid->column('type', __('类型'));
        $grid->column('total', __('满多少'));
        $grid->column('minus', __('减多少'));
        $grid->column('exprie_at', __('券过期时间'));

        return $grid;
    }

    //展示优惠券
    public function index(Content $content)
    {
        return $content
            ->title("优惠券管理")
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }

    //添加管理
    public function create(Content $content)
    {
        return $content
            ->title("优惠券添加")
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(CouponModel::findOrFail($id));


        $show->field('title', __('优惠券名称'));
        $show->field('id', __('编号'));
        $show->field('type', __('类型'));
        $show->field('total', __('满多少'));
        $show->field('minus', __('减多少'));
        $show->field('exprie_at', __('过期时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CouponModel);

        $form->text("title",__("优惠券名称"));
        $form->select('type', __('优惠券类型'))->options([1=>"满100-减20",2=>"减50"]);
        $form->number('total', __('满多少'));
        $form->number('minus', __('减多少'));
        $form->datetime('exprie_at', __('过期时间'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
