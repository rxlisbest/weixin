<?php

class AdminItemClassController extends \BaseController {

	protected $layout = 'admin.public.base';

	public function getList($page=1)
	{	
		$data["sidebar"] = $this->getNav('1010');
		$url = "/itemclass/list";
		$perPage = 20;
		$rowNum = ItemClass::where('status', '=', 1)->count();
			
		$limit = $perPage;
		$offset = ($page-1)*$limit;
		$items = ItemClass::where('status', '=', 1)->skip($offset)->take($limit)->get() ?: array();
		$data["items"] = $items;
		$data["pagination"] = $this->getPagination($perPage, $rowNum, $page, $url);
		$this->layout->content = View::make('admin.itemclass.list')->with($data);
	}

	public function getAdd()
	{
		//$user = User::find(Auth::user()->id);
		$data["sidebar"] = $this->getNav('1010');
		$this->layout->content = View::make('admin.itemclass.add')->with($data);
	}

	public function getEdit($id)
	{
		$data["sidebar"] = $this->getNav('1010');
		$class = ItemClass::find($id);
		$data["class"] = $class;
		$this->layout->content = View::make('admin.itemclass.edit', array($data));
	}

	public function postAdd()
	{
		$validator = Validator::make(Input::all(),
				array(
					'name' => 'required',
				     )
				);

		if ($validator->fails())
		{
			return Redirect::to('itemclass/add')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
		$class = new ItemClass();
		$class->name = Input::get("name");
		$class->is_index = Input::get("is_index");
		$class->status = Input::get("status");
		$class->save();
		return Redirect::to('itemclass/list');
	}

	public function postEdit($id)
	{
		$validator = Validator::make(Input::all(),
				array(
					'name'     => 'required',
				     )
				);

		if ($validator->fails())
		{
			return Redirect::to('itemclass/edit/'.$id)->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
		$class = ItemClass::find($id);
		$class->name = Input::get("name");
		$class->is_index = Input::get("is_index");
		$class->status = Input::get("status");
		$class->save();
		return Redirect::to('itemclass/list');
	}

	public function getDel($id)
	{
		$class = ItemClass::destroy($id);
		return Redirect::to('itemclass/list');
	}
}
