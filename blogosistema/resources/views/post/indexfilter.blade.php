@extends('layouts.app')

@section('content')
    <div class="container">
                <a class="btn btn-primary" href="{{route('post.index')}}">Back</a>
                <div class="card">
                        <table class="table table-striped">
                            <tr>
                                <th>@sortablelink('id', 'Id')</th>
                                <th>@sortablelink('title', 'Title')</th>
                                <th>@sortablelink('author_name', 'Author')</th>
                                <th>@sortablelink('content', 'Content')</th>
                                <th>@sortablelink('category_id', 'Category')</th>
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