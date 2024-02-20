@extends('layouts.app')
@section('content')
<!-- <h1>Contact Page</h1> -->
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto my-3" >
            <form action="{{route('send-message')}}" method="POST" class="form border p-3">
            @csrf
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Message</label>
                    <textarea name="message" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Send" class="form-control bg-success">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection