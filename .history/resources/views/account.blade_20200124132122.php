@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
      <div class="d-flex p-2 mt-5">
        <div class="col-md-6 img" style="max-width: none; margin-right: 50px;">
          <img src={{ '/storage//' . $user->image }}  alt="" class="img-rounded"
          style="border-radius: 200px;">
        </div>
        <div class="col-md-6 details" style="border-left: 5px solid #ded4da;">
          <blockquote>
            <h5>Fiona Gallagher</h5>
            <small><cite title="Source Title">Chicago, United States of America  <i class="icon-map-marker"></i></cite></small>
          </blockquote>
          <p>
            fionagallager@shameless.com <br>
            www.bootsnipp.com <br>
            June 18, 1990
          </p>
          <div class="d-flex">
            <a href="/profile/1/edit" style="margin-right: 5px;">Profile Update</a>|
            <a href="#" style="margin-left: 5px;">Message me!</a>
          </div>
        </div>
      </div>
    </div>




@endsection



