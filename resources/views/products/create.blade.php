@extends('layouts.app')
@section('main')
    <div class="container">
        <h1>New Products</h1>
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <div class="card mt-3 p-3">

              <form method="POST" action="/products/store" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Name:</label>
                  <input type="text" name="name" class="form-control" value="{{old('name')}}">
                  @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label>Description:</label>
                  <textarea name="description" class="form-control" id="" cols="30" rows="6">{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="">Image:</label>
                  <input type="file" name="image" id="" class="form-control">
                  @if ($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                  @endif
                </div>
                <button type="submit" class="btn btn-dark mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection