@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Listing</div>

                <div class="card-body">
                    <form class="" action="/product/{{$product->id}}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="">Title</label>
                            <input class="form-control" type="text" name="title" value="{{ $product->title}}">
                        </div>
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="body" class="form-control" rows="8" cols="80">{{ $product->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input class="form-control" type="text" name="price" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="category">
                                <option value="mobile" {{ $product->category == "mobile" ? "selected" : " "}}>Mobile</option>
                                <option value="electronic"  {{ $product->category == "electronic" ? "selected" : " "}}>Electronic</option>
                                <option value="furniture"  {{ $product->category == "furniture" ? "selected" : " "}}>Furniture</option>
                                <option value="fashion"  {{ $product->category == "fashion" ? "selected" : " "}}>Fashion</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Mark as</label>
                            <select class="form-control" name="status">
                                <option value="sold" {{ $product->category == "sold" ? "selected" : " "}}>Sold</option>
                                <option value="reserved" {{ $product->category == "reserved" ? "selected" : " "}}>Reserved</option>
                                <option value="available" {{ $product->category == "available" ? "selected" : " "}}>Available</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="button">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
