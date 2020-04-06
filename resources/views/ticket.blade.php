@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="d-flex align-items-center">
                    <h3 class="mr-auto p-3">{{$messages[0]->title}}</h3>
                </div>

                <div class="card-body">

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul class="list-group">
                        @foreach ($messages as $message)
                        <div class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$message->name}}</h5>
                                <small>{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ $message->content}}</p>
                            <small>attachment</small>
                            </a>
                        </div>
                        @endforeach
                    </ul>

                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" style="margin: 1em">reply</button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
