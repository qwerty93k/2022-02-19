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
                            <div id="formajs">
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
                $('#add_field').click(function(){ //posto forma
                    $('.form').append('<div class="forma"><div class="row mb-3"><label for="post_title" class="col-md-4 col-form-label text-md-end">Title</label><div class="col-md-6"><input id="post_title" type="text" class="form-control" name="post_title[]" required autofocus></div></div><div class="row mb-3"><label for="post_author" class="col-md-4 col-form-label text-md-end">Author</label><div class="col-md-6"><input id="post_author" type="text" class="form-control" name="post_author[]" required autofocus></div></div><div class="row mb-3"><label for="post_content" class="col-md-4 col-form-label text-md-end">Content</label><div class="col-md-6"><textarea id="post_content" type="text" class="form-control" name="post_content[]" cols="30" rows="10" required autofocus></textarea></div></div>');
                });
                
                //paprastesnis variantas
                //$('#add_field').click(function(){
                //    $('.form').append('<div class="row mb-3">'+$('#formajs').html()+'</div>';
                //});

                $('#remove_field').click(function(){ //istrina posto forma
                    $('.forma:last-child').remove();
                });
            });
        </script>  
@endsection