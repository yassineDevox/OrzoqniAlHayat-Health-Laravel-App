@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center bg-danger">News Feed</h1>
            <ul class="list-group">
                @forelse ($images as $image)
                <li class="list-group-item col-md-8 display:center;">
                    <h2><a href="{{ route( 'admin.posts.show' ,[ 'post' => $image->post->id ]) }} "> {{$image->post->title}} </a></h2>
                    <img  src="{{asset('posts-img/'.$image->imgName)}}">
                    <p>{{$image->post->body}}</p>
                    <h1>{{"storage/app/post-images/$image->imgName"}}</h1>
                    <em>{{$image->post->created_at->diffForHumans()}}</em>
                    <a class="btn btn-warning" href="{{route('admin.posts.edit',['post'=>$image->post->id])}}">Edit</a>
                    <form class="form-inlining" method="POST" action="{{route('admin.posts.destroy',['post'=>$image->post->id])}}">
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