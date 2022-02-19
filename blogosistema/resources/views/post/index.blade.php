@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{session()->get('error_message')}}
                    </div>
                 @endif
        
                @if(session()->has('success_message'))
                    <div class="alert alert-success ">
                        {{session()->get('success_message')}}
                    </div>
                @endif
                <a class="btn btn-primary" href="{{route('post.create')}}">Create Post</a>
                <div class="card">
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->author_name}}</td>
                                    <td>{{$post->content}}</td>
                                    <td>{{$post->postCategory->title}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('post.edit', [$post])}}">Edit</a>
                                        <a class="btn btn-secondary" href="{{route('post.show', [$post])}}">Show</a>
                                        <form method="post" action="{{route('post.destroy', [$post])}}">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection