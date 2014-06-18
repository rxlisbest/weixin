<?php

class ShopController extends \BaseController {

    protected $layout = 'layouts.base';

    public function getGoods()
    {
        $items = WeixinGoods::with('weixingoodsclass')->where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('shop.goods')->with('items', $items);
    }

    public function getGoodsclass()
    {
        $items = WeixinGoodsClass::where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('shop.goodsclass')->with('items', $items);
    }

    public function postAdd()
    {
        $validator = Validator::make(Input::all(),
            array(
                'name'     => 'required',
                'class_path' => 'required',
                'retail_price'     => 'required',
                'standard_price'     => 'required',
                'number'     => 'required',
                'detail'     => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('shop/add')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

        $goods= new WeixinGoods();
        $goods->name = Input::get("name");
        $goods->class_path = Input::get("class_path");
        $goods->retail_price = Input::get("retail_price");
        $goods->standard_price = Input::get("standard_price");
        $goods->number = Input::get("number");
        $goods->detail = Input::get("detail");
        $goods->save();

        return Redirect::to('shop/goods');
    }

    public function postEdit($id)
    {
        $validator = Validator::make(Input::all(),
            array(
                'name'     => 'required',
                'class_path' => 'required',
                'retail_price'     => 'required',
                'standard_price'     => 'required',
                'number'     => 'required',
                'detail'     => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('shop/add')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

        $goods= WeixinGoods::find($id);
        $goods->name = Input::get("name");
        $goods->class_path = Input::get("class_path");
        $goods->retail_price = Input::get("retail_price");
        $goods->standard_price = Input::get("standard_price");
        $goods->number = Input::get("number");
        $goods->detail = Input::get("detail");
        $goods->status = 1;
        $goods->save();

        return Redirect::to('shop/goods');
    }

    public function getClass()
    {
        $user = User::find(Auth::user()->id);
        $this->layout->content = View::make('shop.goods')->with('user', $user);
    }

    public function getAdd()
    {
        $classes = WeixinGoodsClass::where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('shop.add')->with('classes', $classes);
    }

    public function getEdit($id)
    {
        $goods = WeixinGoods::find($id);
        $classes = WeixinGoodsClass::where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('shop.edit', array('classes'=>$classes, 'goods'=>$goods));
    }

    public function getAddclass()
    {
        $user = User::find(Auth::user()->id);
        $this->layout->content = View::make('shop.addclass')->with('user', $user);
    }

    public function getEditclass($id)
    {
        $class = WeixinGoodsClass::find($id);
        $this->layout->content = View::make('shop.editclass', array('class'=>$class));
    }

    public function postAddclass()
    {
        $validator = Validator::make(Input::all(),
            array(
                'name'     => 'required',
                'sort' => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('shop/addclass')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
        $class = new WeixinGoodsClass();
        $class->name = Input::get("name");
        $class->sort = Input::get("sort");
        $class->status = 1;
        $class->save();
        return Redirect::to('shop/goodsclass');
    }

    public function postEditclass($id)
    {
        $validator = Validator::make(Input::all(),
            array(
                'name'     => 'required',
                'sort' => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('shop/addclass')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
        $class = WeixinGoodsClass::find($id);
        $class->name = Input::get("name");
        $class->sort = Input::get("sort");
        $class->save();
        return Redirect::to('shop/goodsclass');
    }

    public function getDel($id)
    {
        $goods = WeixinGoods::find($id);
        $goods->status = 0;
        $goods->save();
        return Redirect::to('shop/goods');
    }

    public function getDelclass($id)
    {
        $class = WeixinGoodsClass::destroy($id);
        return Redirect::to('shop/goodsclass');
    }
}
