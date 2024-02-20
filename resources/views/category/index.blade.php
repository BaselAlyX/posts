@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Categories Page</h1>
            @include('messages.success')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <a href="{{'categories/'.$category->id}}" target="_blank">{{$category->name}}</a>
                        </td>
                        <td><a href="{{url('categories/'.$category->id.'/edit')}}" class="btn btn-info">Edit</a> </td>
                        <td>
                            <form action="{{url('categories/'.$category->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>
</div>

@endsection