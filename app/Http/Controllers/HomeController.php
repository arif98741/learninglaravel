<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function upload(Request  $request)
    {

       // $path = $request->file('image')->store('images-s3',"s3");

        $image_normal = Image::make($image)->widen(800, function ($constraint) {
            $constraint->upsize();
        });
        $image_thumb = Image::make($image)->crop(100,100);
        $image_normal = $image_normal->stream();
        $image_thumb = $image_thumb->stream();

        Storage::disk('s3')->put($path.$file, $image_normal->__toString());
        Storage::disk('s3')->put($path.'thumbnails/'.$file, $image_thumb->__toString());

    }
}
