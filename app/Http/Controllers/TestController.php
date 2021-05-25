<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function test()
    {
        $name = 'Arif';
        $address = 'Dhaka';
        $mobile = '01750840217';

        return view('test')
            ->with('name', $name)
            ->with('address', $address)
            ->with('mobile', $mobile)
            ->with('mobile', $mobile)
            ->with('mobile', $mobile);
    }

    public function work()
    {
        return view('test');
    }
}
