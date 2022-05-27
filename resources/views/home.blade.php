
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->get('success'))
            <div class="text-primary h5 text-center py-2">
                {{session('success')}}
            </div>
            @endif
            <div class="text-center h1 my-3 text-warning">Your Articals</div>
            @if (!$articals->count() == 0)
            @foreach ($articals as $artical)
            <div class="card my-3">
                <div class="card-body ">
                    <div class="card-title fs-5">
                        {{$artical->title}}
                    </div>
                    <div class="card-subtitle">
                        {{$artical->category->name}}
                    </div>
                    <div class="card-subtitle text-secondary my-2">
                        {{$artical->created_at->diffForHumans()}}
                    </div>
                    <div class="">
                        {!!$artical->body!!}
                    </div>
                </div>
                <div class="card-footer d-flex ">
                    <a href="/articals/edit/{{$artical->id}}" class="btn btn-warning mx-2">Edit</a>
                    <form action="/articals/delete/{{$artical->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a class="card-link text-decoration-none ms-auto" href="/articals/detail/{{$artical->id}}"> View detail &raquo</a>
                </div>
            </div>

            @endforeach
            
            {{$articals->links()}}
            
            @else
                <div class="alert alert-info text-center h5 fst-italic">
                    There is no artical you have posted!
                </div>
            @endif




            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
