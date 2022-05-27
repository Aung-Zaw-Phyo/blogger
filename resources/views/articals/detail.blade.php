

@extends('layouts/app')

@section('content')
    
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title fs-5 text-center">
                            {{$artical->title}}
                        </div>
                        <div class="card-subtitle mt-1 text-secondary text-center">
                            {{$artical->created_at->diffForHumans()}} / By {{$artical->user->name}}
                        </div>
                        <div class="card-subtitle text-secondary text-center">
                            Category: {{$artical->category->name}}
                        </div>
                        <div class="card-text my-2 text-center">
                            {!!$artical->body!!}
                        </div>
                        <div class="d-flex">
                            <a href="{{ url()->previous()==URL::current() ? "/": url()->previous() }}" class="btn btn-warning me-2">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row d-flex justify-content-center">
            <div class="col-md-8">

                <div class="card p-3 my-2">
                    @auth
                    <form action="/comments/add" method="POST">
                        @csrf
                        <input type="hidden" name="artical_id" value="{{$artical->id}}">
                        
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Comment</label>
                          <textarea name="content" class="form-control" id="exampleInputEmail1" cols="10" rows="4" placeholder="Enter message"></textarea> 
                            @error('content')
                                <div class="text-danger"> {{$message}} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @else
                    Please login to participate in thid discussion! <a href="/login">login</a>
                    @endauth
                </div>

            </div>
        </div>

        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-8">
                <ul class="list-group mb-2">
                    <li class="list-group-item active" aria-current="true">Comments {{$artical->comments->count()}}</li>
                    @foreach ($artical->comments()->latest()->paginate(5) as $comment)
                        <li class="list-group-item"> 
                            <div class="fst-italic fw-bold">{{$comment->user->name}}</div>
                            <div class="fst-italic text-secondary">{{$comment->created_at->diffForHumans()}}</div>
                            <div class=" d-flex justify-content-between mt-2">
                                <div class="text-primary">{{$comment->content}}</div>
                                @if (Gate::allows('comment', $comment))
                                <a href="/comments/delete/{{$comment->id}}" class="btn btn-close"></a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{$artical->comments()->latest()->paginate(5)->links()}}
            </div>
        </div>
    </div>

@endsection