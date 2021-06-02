<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = [
            'blogs' => Blog::with(['category'])
                ->orderBy('id', 'desc')
                ->get()
        ];
        return view('admin.blog.index')->with($data);
    }

    public function create()
    {
        $data = [
            'categories' => Category::orderBy('name', 'asc')->get()
        ];
        return view('admin.blog.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|min:3|max:200',
            'category_id' => 'required',
            'description' => 'required|min:3|max:200',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //2MB
        ]);

        $status = Blog::create($data);
        if ($status) {
            $request->session()->flash('alert-success', 'Successfully save');
            return redirect()->route('admin.blog.index');
        } else {
            $request->session()->flash('alert-error', 'Failed to insert');
            return redirect()->route('admin.blog.create');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {


        $data = [
            'blog' => $blog,
            'categories' => Category::orderBy('name', 'asc')->get()
        ];
        return view('admin.blog.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $this->validate($request, [
            'title' => 'required|min:3|max:200',
            'category_id' => 'required',
            'description' => 'required|min:3|max:200',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //2MB
        ]);

        $blog->title = $data['title'];
        $blog->category_id = $data['category_id'];
        $blog->description = $data['description'];

        if ($blog->save()) {
            $request->session()->flash('alert-success', 'Successfully updated');
            return redirect()->route('admin.blog.index');
        } else {
            $request->session()->flash('alert-error', 'Failed to insert');
            return redirect()->route('admin.blog.edit', $blog->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return Response
     * @throws \Exception
     */
    public function destroy(Request $request, Blog $blog)
    {
        if ($blog->delete()) {
            $request->session()->flash('alert-success', 'Successfully deleted');
        } else {
            $request->session()->flash('alert-error', 'Failed to delete');
        }
        return redirect()->route('admin.blog.index');
    }
}
