<?php

class NavTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('weixin_nav')->delete();
        WeixinNav::create(array(
            'name' => '系统设置',
            'url' => 'setting',
            'path' => '10',
            'sort' => '1',
        ));
    }
}
