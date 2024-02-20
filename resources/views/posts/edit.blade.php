@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
        <h1>Edit Post</h1>

            <form action="{{url('posts/'.$post->id)}}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            @include('messages.success')
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger p-1 my-1">{{$error}}</div>
            @endforeach
            @endif
                <div class="mb-3">
                    <label for="">Post Title</label>
                    <input class="form-control" value="{{$post->title}}" name="title" type="text">
                </div>
                <div class="mb-3">
                    <label for="">Post Description</label>
                    <textarea  name="description"  class="form-control" >{{$post->description}}</textarea>
                </div>
                <div class="mb-3">
                <input class="form-control bg-success" value="Save" type="submit" type="submit">

                </div>
            </form>
        </div>
    </div>
</div>
@endsection