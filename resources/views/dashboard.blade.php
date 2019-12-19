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
                                <a href="#">Dislike </a>
                                @if (Auth::user()==$post->user)
                                    |
                                    <a href="{{route('editpost', ['post' => $post])}}">Edit </a>|
                                    <a href="{{route('delete_post', ['post' => $post])}}">Delete</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id='editModal'>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                  <div class="form-group">
                      <label for="post-body">Edit the Post</label>
                      <textarea name="post-body" id="post-body" class="form-control" rows="10"></textarea>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <script>
$(document).ready(function () {

    // $('.editpost').on('click', function(event) {
    //     event.preventDefault();

        // var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
        // $('#post-body').val(postBody);
        // $('#editModal').modal();
   // });
});
    </script>
@endsection



