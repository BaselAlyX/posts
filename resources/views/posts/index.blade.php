@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Posts Page</h1>
            @include('messages.success')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>Category</th>
                        <th>description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->description}}</td>
                        <td><a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-info">Edit</a> </td>
                        <td>
                            <form action="{{url('posts/'.$post->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
</div>

@endsection