@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        {{-- @include('includes.message-block') --}}
        <section class="new-post dbody1">
            <div class="">
                <header><h3>What do you have to say?</h3></header>

                <form action="/posts/create" enctype="multipart/form-data" method="post">

                    @csrf

                    <div class="form-group">

                        <textarea id='body' class="@error('body') is-invalid @enderror form-control " name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>

                        {{-- show error messages if the body content doesn't follow the validation rules in the controller --}}
                        @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </section>
    </div>

    <div class="line"></div>
    <br>

     <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3 dbody2">
            {{-- <section class="row posts"> --}}
            @if(!$posts ?? '' )
                <div class="card">
                    <div class="card-body">
                      No posts yet.
                    </div>
                  </div>
            @else
                @foreach ($posts as $post)
                    <div class="card" style="width: 35rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><p>{{$post->body}}</p></li>
                            <li class="list-group-item info">Posted by {{ $post->user->name}} on {{ $post->created_at }} </li>
                            <li class="list-group-item">
                                <a href="#">Like </a>|
                                <a href="#">Dislike </a>|
                                <a href="#">Edit </a>|
                                <a href="#">Delete</a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            @endif
              {{--  @foreach ($posts as $post)
                    <article class="post">
                        <p>{{$post->body}}</p>
                        <div class="info">
                            Posted by {{ Auth::user()->name }} on {{$post->created_at}}
                        </div>
                        <div class="interaction">
                            <a href="#">Like</a>
                            <a href="#">Dislike</a>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    </article>
                @endforeach --}}


                {{-- <article class="post">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati voluptate sed dignissimos quo modi delectus natus est pariatur molestias illum reiciendis laboriosam fugit magni ut quae itaque sapiente, necessitatibus nihil.</p>
                    <div class="info">
                        Posted by XXX on YY.TT.YUHJ
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a>
                        <a href="#">Dislike</a>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </div>
                </article> --}}
            {{-- </section> --}}
        </div>
    </div>



    <script>

    </script>
@endsection



