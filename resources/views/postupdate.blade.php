@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        {{-- @include('includes.message-block') --}}
        <section class="new-post dbody1">
            <div class="">
                <header><h3>Update your post</h3></header>

                <form action="/posts/{{$post->id}}" enctype="multipart/form-data" method="post">

                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">

                    <textarea id='body' class="@error('body') is-invalid @enderror form-control " name="body" id="new-post" rows="5" placeholder="Your Post">{{$post->body}}</textarea>

                        {{-- show error messages if the body content doesn't follow the validation rules in the controller --}}
                        @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </section>
    </div>

    <div class="line"></div>


    <script>
    </script>
@endsection



