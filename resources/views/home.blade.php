@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="d-flex align-items-center">
                    <h3 class="mr-auto p-3">My Tickets</h3>
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" style="margin-right: 1em">Create new ticket</button>
                    </div>
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
                            <a class="navbar-brand" href="/ticket/{{ $thread->id }}">{{$thread->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>



                <div class="slide-down" style="margin: 1em">
                    <h3>New Ticket</h3>
                    <form action="/create" method="post">
                        <div class="form-group">
                            <label for="TitleInput">Title</label>
                            <input type="text" class="form-control" id="TitleInput" name="title" placeholder="Title">
                            <br>
                            <label for="Textarea1">Message</label>
                            <textarea class="form-control" id="Textarea1" name="content" rows="3"></textarea>
                            <br>
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="category">
                                <option value="1">Sales</option>
                                <option value="2">Accounts</option>
                                <option value="3">IT</option>
                            </select>

                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember my
                                    preference</label>
                            </div>
                            <br>
                            {{ csrf_field() }}   <!-- token to protect againts cross-site request forgery-->
                            <button type="submit" class="btn btn-primary my-1">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
