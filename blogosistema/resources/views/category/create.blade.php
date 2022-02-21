@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('category.store')}}" >
                            @csrf
    
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Category Name</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
    
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" required autofocus>

                                </div>                                
                            </div>
                            {{--New Post--}}
                            <div class="form-group">
                                <label for="new_post">Publish new post?</label>
                                <input id="new_post" type="checkbox" name="new_post"/>
                            </div>
                            {{--Forma--}}
                            <div class="post_form d-none">
                                <button id="add_field" class="btn btn-primary">+</button>
                                <button id="remove_field" class="btn btn-danger">-</button>
                                <div class="form"></div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                    <a class="btn btn-secondary" href="{{route('category.index')}}">Back</a>
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
                $('#new_post').click(function(){
                    $(".post_form").toggleClass('d-none'); //ijungia
                })
                $('#add_field').click(function(){
                    $('.form').append('<div class="forma"><div class="row mb-3"><label for="title" class="col-md-4 col-form-label text-md-end">Title</label><div class="col-md-6"><input id="title" type="text" class="form-control" name="title" required autofocus></div></div><div class="row mb-3"><label for="author_name" class="col-md-4 col-form-label text-md-end">Author</label><div class="col-md-6"><input id="author_name" type="text" class="form-control" name="author_name" required autofocus></div></div><div class="row mb-3"><label for="content" class="col-md-4 col-form-label text-md-end">Content</label><div class="col-md-6"><textarea id="content" type="text" class="form-control" name="content" cols="30" rows="10" required autofocus></textarea></div></div>');
                });
                $('#remove_field').click(function(){
                    $('.forma:last-child').remove();
                });
            });
        </script>  
@endsection