@extends('admin.layout')
@section('title','Add Blog')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blog List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        @include('admin.include.flash')
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                            @if($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option @if(!empty(old('category_id')) && $category->id == old('category_id')) selected
                                            @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="error">{{ $errors->first('category_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if($errors->has('image'))
                                <div class="error">{{ $errors->first('image') }}</div>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
