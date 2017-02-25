@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Template
                </div>

                <div class="panel-body">

                    @foreach($templates as $template)
                    <div id="thumbnail{{ $template->id }}" class="clearfix col-sm-3" style="padding-bottom:20px;">
                    <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                        <a href="#">
                            <img style="height:190px; padding:0px; width:190px;" class="col-sm-12 img-rounded" src="{{ URL::asset('templates') }}/{{ $template->title }}/screenshot.jpg">
                        </a>
                        <div class="col-sm-12" style="padding:0px;padding-top:10px;">
                            @if($template->title == $account->template_name)
                            <a href="{{ url('/admin/customize') }}"><input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $template->id }}" value="Customize"></a>
                            <label>&nbsp;&nbsp;&nbsp;{{ $template->title }}</label>
                            @else
                            <form method="post" action="{{ url('/admin/template/activate') }}">{{ csrf_field() }}
                            <input type="hidden" name="template_id" value="{{ $template->id }}">
                            <input class="btn btn-success btn-sm" type="submit" id="btn_on_off{{ $template->id }}" value="Activate">
                            <label>&nbsp;&nbsp;&nbsp;{{ $template->title }}</label>
                            </form>
                            @endif
                        </div>
                    </div>
                    </div>
                    @endforeach

                    <!--
                    <div class="col-sm-3">
                    <div class="col-sm-12 thumbnail" style="background-color:lightblue; padding: 10px;padding-bottom:0px;">
                        <img style="height:250px; padding:0px;" class="img-rounded col-sm-12" src="{{ URL::asset('main_resource/temp_images/bricks-template.jpg') }}">
                        <div class="col-sm-6" style="padding-left:0px;">
                            <h3 style="margin:5px;">God</h3>
                            <label>This is cool.</label>
                        </div>
                        <div class="col-sm-6" style="padding-right:0px;"><br>
                            <input style="float: right;" type="button" class="btn btn-primary" name="btn_activate" value="Customize">
                        </div>
                    </div>
                    </div>
                    -->

                    <div id="thumbnail" class="clearfix col-sm-3" style="padding-bottom:20px;">
                    <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                        <a href="#">
                            <img style="height:190px; padding:0px; width:190px;" class="col-sm-12 img-rounded" src="{{ URL::asset('main_resource/images/add_theme.jpg') }}">
                        </a>
                        <div class="col-sm-6" style="padding:0px;padding-top:10px;">

                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
