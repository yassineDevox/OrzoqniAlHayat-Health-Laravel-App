@extends('layouts.admin')

@section('content')
<h1 style="font-family: fantasy">Editing Post</h1>

<form method="POST" enctype="multipart/form-data" action="{{route('admin.posts.update',['post'=>$post->id])}}">
    @csrf
    @method('PUT')
    
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-left">Your title</label>
        <div class="col-md-12">
            <input class="form-control" name="title" id="title" type="text" value="{{old('title',$post->title ?? null)}}">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="body" class="col-md-4 col-form-label text-md-left">Your content</label>
        <div class="col-md-12">
        <textarea class="form-control" name="body" id="body" type="text">{{old('body',$post->body ?? null)}}</textarea>
        </div>
    
    </div> 
    <div class="form-group row">
        <label for="imgName" class="col-md-4 col-form-label text-md-left">Your Image</label>

        <div class="col-md-12">
        <img class="col-md-10 " src="{{asset('posts-img/'.$image->imgName)}}">
        </div>
        <div class="col-md-12">
            <input class="form-control" type="file" name="imgName" id="imgName">
        </div>
    </div>
    
    @if ($errors->any())
    
    
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
        @endforeach
        
    </ul>
    
    @endif

    <div style="display: inline" class="form-group col-sm-5">
        <button class="btn btn-danger" type="submit">Update</button>
        <a class="btn btn-success float-right" href="{{route('admin.posts.index')}}" >Return</a>
    </div>
    <div class="form-group col-sm-5"></div>

</form>   
@endsection