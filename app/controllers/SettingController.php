<?php

class SettingController extends \BaseController {

    protected $layout = 'layouts.base';

    public function getIndex()
    {
        $user = User::find(Auth::user()->id);
        $this->layout->content = View::make('users.setting')->with('user', $user);
    }

    public function postIndex()
    {
        $validator = Validator::make(Input::all(),
            array(
                'AppID'     => 'required',
                'AppSecret' => 'required',
                'Token'     => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('setting')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->AppID = Input::get('AppID');
        $user->AppSecret = Input::get('AppSecret');
        $user->Token = Input::get('Token');
        $user->save();

        return Redirect::to('setting');
    }
}
