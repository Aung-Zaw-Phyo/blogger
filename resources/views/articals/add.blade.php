
@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="text-center my-3 text-warning h4">Artical add form</div>
            <div class="col-md-8">
                <div class="card p-4">
                    <form action="/articals/add" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleFormControlInput1" >
                            @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                            <textarea class="form-control editor" name="body" id="exampleFormControlTextarea1" rows="3" >{{old('body')}}</textarea>
                            @error('body')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" class="form-control" id="category">
                                @foreach ($categories as $category)
                                <option value="{{$category['id']}}" {{ $category->id == old('category_id') ? "selected" : "" }} > {{$category['name']}} </option>
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

