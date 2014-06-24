<?php

class ItemclassController extends \BaseController {

    protected $layout = 'layouts.base';

    public function getList()
    {
        $items = ItemClass::where('status', '=', 1)->get() ?: array();
        $this->layout->content = View::make('itemclass.list')->with('items', $items);
    }

    public function getAdd()
    {
        //$user = User::find(Auth::user()->id);
        $this->layout->content = View::make('itemclass.add');
    }

    public function getEdit($id)
    {
        $class = ItemClass::find($id);
        $this->layout->content = View::make('itemclass.edit', array('class'=>$class));
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
