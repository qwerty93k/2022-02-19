@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('post.store')}}" >
                            @csrf
    
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="author_name" class="col-md-4 col-form-label text-md-end">Author</label>
    
                                <div class="col-md-6">
                                    <input id="author_name" type="text" class="form-control" name="author_name" required autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>
    
                                <div class="col-md-6">
                                    <textarea id="content" type="text" class="form-control" name="content" cols="30" rows="10" required autofocus></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">Category</label>
    
                                <div class="col-md-6">
                                    <select name="category_id" id="category_id" type="text" class="form-control">
                                        @foreach ($categories as $title)
                                            <option value={{$title->id}}>{{$title->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                    <a class="btn btn-secondary" href="{{route('post.index')}}">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection