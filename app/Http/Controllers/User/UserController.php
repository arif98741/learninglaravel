<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function viewUser()
    {
        $name = [
            1, 34, 3, 34
        ];
        return view('user.user-view')->with('testvariable', $name);
    }
}
