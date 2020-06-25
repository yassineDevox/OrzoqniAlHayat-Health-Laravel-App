@extends('layouts.admin')

@section('content')
<h2 class="text-center" style="font-family: fantasy">{{$post->title}}</h2>

<div class="col-md-12">
    <img class="col-md-12" src="{{asset('posts-img/'.$image->imgName)}}">
    <p style="text-align:justify; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" class="col-md-12">{{$post->body}}</p>
    <form class="col-md-12" style="display: inline" method="POST" action="{{route('admin.posts.destroy',['post'=>$post->id])}}">
        @csrf
        @method('DELETE')
        <button style=" background-color:rgb(189, 134, 134)"" class="btn float-right col-md-2" type="button">
        <a style="color: white;" href="{{route('admin.posts.edit',['post'=>$post->id])}}">Edit</a>
        </button>
        <button style="background-color:rgba(255, 0, 0, 0.767) "class="btn btn-danger float-right col-md-2" type="submit">Delete</button>
    </form>   
</div>

@endsection