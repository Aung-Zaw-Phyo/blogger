
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center my-3 h1 text-warning">Artical Edit Form</div>
        <div class="col-md-8 mx-auto">
            <div class="card p-3">
                <div class="card-body">
                    <form action="/articals/update/{{$artical->id}}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" name="title" value="{{old('title', "$artical->title")}}" class="form-control" id="exampleFormControlInput1" required>
                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                            <textarea class="form-control editor" name="body" id="exampleFormControlTextarea1" rows="3" required>{!!old('body', "$artical->body")!!}</textarea>
                            @error('body')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" class="form-control" id="category">
                                @foreach ($categories as $category)
                                <option value="{{$category['id']}}" {{ $category->id == old('category_id', $artical->category->id) ? "selected" : "" }} > {{$category['name']}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
