<?php

class AdminItemController extends \BaseController {

	protected $layout = 'admin.public.base';

	public function getList($page=1)
	{
		//var_dump($this->getNav());exit;
		$data["sidebar"] = $this->getNav('1011');
		$url = "/item/list";
		$perPage = 20;
		$rowNum = Item::where('status', '=', 1)->count();

		$limit = $perPage;
		$offset = ($page-1)*$limit;
		$items = Item::with('itemclass')->where('status', '=', 1)->skip($offset)->take($limit)->get() ?: array();
		$data["items"] = $items;
		$data["pagination"] = $this->getPagination($perPage, $rowNum, $page, $url);
		$this->layout->content = View::make('admin.item.list')->with($data);
	}

	public function getAdd()
	{
		$data["sidebar"] = $this->getNav('1011');
		$classes = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["classes"] = $classes;
		$this->layout->content = View::make('admin.item.add')->with($data);
	}

	public function getEdit($id)
	{
		$data["sidebar"] = $this->getNav('1011');
		$Item = Item::find($id);
		$classes = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["item"] = $Item;
		$data["classes"] = $classes;
		$this->layout->content = View::make('admin.item.edit')->with($data);
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
