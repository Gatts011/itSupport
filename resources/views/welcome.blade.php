@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="d-flex align-items-center">
                    <h3 class="mr-auto p-3">Support Tickets</h3>

                  </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                    @foreach ($threads as $thread)
                    <li class="list-group-item">
                        <a  class="navbar-brand" href="/ticket/{{ $thread->id }}" >{{$thread->title}}</a>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
