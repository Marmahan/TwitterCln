@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="mb-5" style="border-bottom: 1px solid #808080; width:50%;">
            <h1>Edit Profile</h1>
        </div>

    </div>
    <div class="row justify-content-center" style="max-width:50%; margin:auto;">

        <div class="col-md-9 personal-info" >
            {{-- <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div> --}}
            <h3>Personal info</h3>

            <form class="form-horizontal" action="/profile/{profile}/update" role="form" method='POST' enctype="multipart/form-data">

                {{-- because we can't add PUT directly in the method --}}
                @method('PUT')

                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Jane">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Photo:</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="janesemail@gmail.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">URL:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="janesemail@gmail.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Birthdate:</label>
                    <div class="col-lg-8">
                        <input id="datepicker" width="276" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script>

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        //for testing
        $('#datepicker').change(function(){
            console.log($('#datepicker').val());
        });

</script>

@endsection



