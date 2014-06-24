<?php

class ItemController extends \BaseController {

    protected $layout = 'layouts.base';

    public function getList()
    {
        $items = Item::with('Itemclass')->where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('item.list')->with('items', $items);
    }

    public function getAdd()
    {
        $classes = ItemClass::where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('item.add')->with('classes', $classes);
    }

    public function getEdit($id)
    {
        $Item = Item::find($id);
        $classes = ItemClass::where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('item.edit', array('classes'=>$classes, 'item'=>$Item));
    }

    public function postAdd()
    {
        $validator = Validator::make(Input::all(),
            array(
                'title' => 'required',
                'cate_id' => 'required',
                'intro' => 'required',
                'price' => 'required',
                'goods_stock' => 'required',
                'info' => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('item/add')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

        $Item= new Item();
        $Item->title = Input::get("title");
        $Item->cate_id = Input::get("cate_id");
        $Item->intro = Input::get("intro");
        $Item->price = Input::get("price");
        $Item->goods_stock = Input::get("goods_stock");
        $Item->info = Input::get("info");
        $Item->free = Input::get("free");
        $Item->save();

        return Redirect::to('item/list');
    }

    public function postEdit($id)
    {
        $validator = Validator::make(Input::all(),
            array(
                'title' => 'required',
                'cate_id' => 'required',
                'intro' => 'required',
                'price' => 'required',
                'goods_stock' => 'required',
                'info' => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('item/edit/'.$id)->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

        $Item= Item::find($id);
        $Item->title = Input::get("title");
        $Item->cate_id = Input::get("cate_id");
        $Item->intro = Input::get("intro");
        $Item->price = Input::get("price");
        $Item->goods_stock = Input::get("goods_stock");
        $Item->info = Input::get("info");
        $Item->free = Input::get("free");
        $Item->save();

        return Redirect::to('item/list');
    }

    public function getDel($id)
    {
        $Item = Item::find($id);
        $Item->status = 0;
        $Item->save();
        return Redirect::to('item/list');
    }
}
