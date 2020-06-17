@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center bg-danger">News Feed</h1>
            <ul class="list-group">
                @forelse ($posts as $post)
                <li class="list-group-item col-md-8 ">
                    <h2><a href="{{ route( 'admin.posts.show' ,[ 'post' => $post->id ]) }} "> {{$post->title}} </a></h2>
                    <img  src="{{ asset('storage/image/image-preview.png') }}" style="max-height: 150px;">
                    <p>{{$post->body}}</p>
                    <em>{{$post->created_at->diffForHumans()}}</em>
                    <a class="btn btn-warning" href="{{route('admin.posts.edit',['post'=>$post->id])}}">Edit</a>
                    <form class="form-inlining" method="POST" action="{{route('admin.posts.destroy',['post'=>$post->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>   
                </li>
                @empty
                <span class="badge badge-secondary"><h1>NO POSTS YET</h1></span>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection