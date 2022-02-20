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

                            <div class="row mb-3 category_id">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">Category</label>
    
                                <div class="col-md-6">
                                    <select name="category_id" id="category_id" type="text" class="form-control">
                                        @foreach ($categories as $title)
                                            <option value={{$title->id}}>{{$title->title}}</option>
                                        @endforeach
                                    </select>
                                    {{--New Category--}}
                                    <div class="form-group">
                                        <label for="new_cat">Add new Category?</label>
                                        <input id="new_cat" type="checkbox" name="new_cat"/>
                                    </div>
                                </div>
                            </div>
                            {{--New Category Form--}}
                            <div class="row mb-3 cat_info d-none">
                                <div class="col-md-6">
                                    <label for="title">Category name</label>
                                    <input class="form-control" type='text' name='cat_title' />
                                </div>
                                <div class="col-md-6">
                                    <label for="description">Description</label>
                                    <input class="form-control" type='text' name='description' />
                                </div>
                            </div>
                            {{--Buttons--}}
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
    {{--Išskleidžia formą--}}
    <script>
        $(document).ready(function(){
            $('#new_cat').click(function(){
                $(".cat_info").toggleClass('d-none'); //ijungia
                $(".category_id").toggleClass('d-none'); //isjungia
            })
        })
    </script>   
@endsection