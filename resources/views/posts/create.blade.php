@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="row">

        <div style="display: inline" class="col-lg-4">
            <img src="{{asset('img/healthcare.png')}}" width="320" height="320" alt="health icon">
        </div>

        <div style="display: inline" class="col-lg-6">
            <h1 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" class="text-center">New Post</h1>

            <form method="POST" enctype="multipart/form-data" action="{{route('admin.posts.store')}}">
                @csrf
                
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
            
                <div class="col-md-12">
                    <button class="btn btn-danger float-right col-md-12" type="submit">Add post</button>
                </div>
            </form>   
        </div>
    </div>
</div>
@endsection