

@extends('layouts/app')

@section('content')
    
<div class="container">
    @if (session()->get('success'))
        <div class="text-primary h5 text-center py-2">
            {{session('success')}}
        </div>
    @endif
    <div class="d-flex justify-content-end">
        {{$articals->links()}}
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <h3 class="text-warning">Articals</h3>
            <div>
                @foreach ($articals as $artical)
                <div class="card my-4">
                    <div class="card-body ">
                        <div class="card-title fs-5 text-center"> {{$artical->title}} </div>
                        <div class="mt-2 card-subtitle text-secondary text-center"> {{$artical->created_at->diffForHumans()}}  / By {{$artical->user->name}}</div>
                        <div class="my-3 card-text text-center"> {!!$artical->body!!} </div>
                        <a class="card-link text-decoration-none" href="/articals/detail/{{$artical->id}}"> View detail &raquo</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>    

@endsection
