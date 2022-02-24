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
                    {{--FILTER--}}
                <form method="GET" action="{{route('post.indexfilter')}}">
                    @csrf
                    <select name="category_id">
                    @foreach ($categories as $title)
                        <option value={{$title->id}}>{{$title->title}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
                <div class="card">
                        <table class="table table-striped">
                            <tr>
                                <th>@sortablelink('id', 'Id')</th>
                                <th>@sortablelink('title', 'Title')</th>
                                <th>@sortablelink('author_name', 'Author')</th>
                                <th>@sortablelink('content', 'Content')</th>
                                <th>@sortablelink('id', 'Category')</th>
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
                        {!!$posts->appends(Request::except('page'))->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection