@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->author_name}}</td>
                                <td>{{$post->content}}</td>
                                <td>{{$post->postCategory->title}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('post.edit', [$post])}}">Edit</a>
                                    <a class="btn btn-secondary" href="{{route('post.index', [$post])}}">Back</a>
                                    <form method="post" action="{{route('post.destroy', [$post])}}">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection