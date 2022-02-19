@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Category</div>
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Posts</th>
                            <th>Action</th>
                        </tr>
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{count($category->postCount)}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('category.edit', [$category])}}">Edit</a>
                                    <form method="post" action="{{route('category.destroy', [$category])}}">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    <a class="btn btn-secondary" href="{{route('category.index', [$category])}}">Back</a>
                                </td>
                            </tr>
                        </table>
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($category->postCount as $post)
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