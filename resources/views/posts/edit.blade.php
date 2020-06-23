@extends('layouts.admin')

@section('content')
<h1>Editing Post</h1>
<form method="POST" action="{{route('admin.posts.update',['post'=>$post->id])}}">
    @csrf
    @method('PUT')
    
    @include('posts.form')

    <div class="form-group col-sm-5">
        <button class="btn btn-warning" type="submit" size>Update</button>
    </div>
</form>   
@endsection