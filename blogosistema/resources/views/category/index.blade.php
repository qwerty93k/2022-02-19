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


                    {{-- Surasysiu +- eiga cia kaip komentara  --}}
                    {{-- 1. Norint rikiuoti pagal kazkoki rysi(na pvz kaip cia pagal category post ) su sortable moduliu, pirma redaguoti modeli --}}
                    {{-- // cia pasakoma sortable moduliui kad rikiuosime pagal stulpeli kuris originaliai duomenu bazeje neegzistuoja. pavadinima galima suteikt
                    // bet koki, taciau kintamasis turi buti $sortableAs --}}
                    {{-- 2. ziurim controlleri --}}
                    {{-- 3.pakeitus controleri @sortablelink rasomas pavadinimas, koks yra $sortableAs kintamasis --}}
                    {{-- tuojau, iveliau klaida --}}

                <a class="btn btn-primary" href="{{route('category.create')}}">Create Category</a>
                <div class="card">
                        <table class="table table-striped">
                            <tr>
                                <th>@sortablelink('id', 'Id')</th>
                                <th>@sortablelink('title', 'Category')</th>
                                <th>@sortablelink('description', 'Description')</th>
                                <th>@sortablelink('post_count_count','Posts')</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{count($category->postCount)}}</td>
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