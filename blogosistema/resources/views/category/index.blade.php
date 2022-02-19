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
                <a class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>
                <div class="card">
                        <table class="table table-striped">
                            <tr>
                                <th>@sortablelink('id', 'Id')</th>
                                <th>@sortablelink('title', 'Category')</th>
                                <th>@sortablelink('description', 'Description')</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('category.edit', [$category])}}">Edit</a>
                                        <a class="btn btn-secondary" href="{{route('category.show', [$category])}}">Show</a>
                                        <form method="post" action="{{route('category.destroy', [$category])}}">
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