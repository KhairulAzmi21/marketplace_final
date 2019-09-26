@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <img src="https://dummyimage.com/200x200/000/fff" alt="...">
            </div>
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><h4 class="text-muted">Price <b>RM1000</b> </h4></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="" action="/comment/{{$product->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="body" class="form-control" rows="8" cols="80"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Add Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h4>All Comments</h4>
                    @foreach ($product->comments as $comment)
                        <div class="card mt-3">
                            <div class="card-header">
                                {{ $comment->user->name }}
                                <span class="float-right">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="card-body">
                                {{ $comment->body }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
