@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-group">
                @forelse ($images as $image)
                <div class="gallery">
                    <h2><a class="text-center" href="{{ route( 'admin.posts.show' ,[ 'post' => $image->post->id ]) }} "> {{$image->post->title}} </a></h2>
                      <img src="{{asset('posts-img/'.$image->imgName)}}" width="600" height="400">
                    </a>
                    <div class="desc">{{$image->post->body}}</div>
                    <a class="btn btn-warning" href="{{route('admin.posts.edit',['post'=>$image->post->id])}}">Edit</a>
                    <form method="POST" action="{{route('admin.posts.destroy',['post'=>$image->post_id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>   
                  </div>
                {{-- <li class="list-group-item">
                    <h2><a class="text-dark" href="{{ route( 'admin.posts.show' ,[ 'post' => $image->post->id ]) }} "> {{$image->post->title}} </a></h2>
                    <img class="img-post"  src="{{asset('posts-img/'.$image->imgName)}}">
                    <p>{{$image->post->body}}</p>
                    <em>{{$image->post->created_at->diffForHumans()}}</em>
                    <a class="btn btn-warning" href="{{route('admin.posts.edit',['post'=>$image->post->id])}}">Edit</a>
                    <form method="POST" action="{{route('admin.posts.destroy',['post'=>$image->post_id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>   
                </li> --}}
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