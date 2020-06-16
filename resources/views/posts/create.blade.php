@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-align : center">New Post</h1>
            <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="{{route('posts.store')}}">
                @csrf
                @include('posts.form')
            
                <div class="col-md-8 offset-md-4">
                    <button class="btn btn-primary" type="submit">Add post</button>
                </div>
            </form>   
        </div>
    </div>
</div>
@endsection