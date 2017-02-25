@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Projects
                </div>

                @if($flag_project == 0)

                <div #id="none_body" class="panel-body">
                    <div class="col-sm-8">
                        <b>You're using 0 projects. You've got 10 left.</b>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="{{ url('/admin/project/new') }}"><input type="button" class="btn btn-success btn-sm" name="btn_new" value="New Project"></a>
                    </div>
                    <div class="panel panel-default col-sm-12 text-center" style="padding: 20px;margin-top: 40px; background-color: lightgrey;">
                        <h4>Create your first project.</h4><br>
                        <p>Use projects to showcase your lastest work.<br>
                            Once created you can upload images, audio and video.</p><br>
                        <a href="{{ url('/admin/project/new') }}"><input type="button" class="btn btn-success btn-sm" name="btn_new" value="New Project"></a>
                    </div>
                </div>

                @else

                <div class="panel-body">
                    <div id="field_message" class="col-sm-8">
                        <b>You're using {{ count($projects) }} projects. You've got {{ 10 - count($projects) }} left.</b>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="{{ url('/admin/project/new') }}"><input type="button" class="btn btn-success btn-sm" name="btn_new" value="New Project"></a>
                    </div>

                    @if($error_message)
                    <div class="col-sm-12 text-center" style="margin-top: 20px;padding: 10px;background-color: lightblue;">
                        {{ $error_message }}
                        <a href="#" style="float:right;">X</a>
                    </div>
                    @endif


                    <div class="col-sm-12" style="padding-top:10px;">
                        @foreach($projects as $project)
                        <div id="thumbnail{{ $project->id }}" class="clearfix col-sm-3">
                        @if($project->is_active == 1)
                        <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                            <a href="{{ url('/admin/project/update/project', [$project->id]) }}">
                                <img style="height:190px; padding:0px; width:190px;" class="col-sm-12" src="{{ URL::asset('project_image') }}/{{ $project->img_name }}">
                            </a>
                            <div class="col-sm-6" style="padding:0px;padding-top:10px;">
                                <input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $project->id }}" value="Off">
                                <a href="javascript::void(0)" id="btn_delete{{ $project->id }}">&nbsp;&nbsp;&nbsp;Delete</a>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                        @else
                        <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                            <a href="{{ url('/admin/project/update/project', [$project->id]) }}">
                                <img style="height:190px; padding:0px; width:190px;" class="col-sm-12" src="{{ URL::asset('project_image') }}/{{ $project->img_name }}">
                            </a>
                            <div class="col-sm-6" style="padding:0px;padding-top:10px;">
                                <input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $project->id }}" value="On">
                                <a href="javascript::void(0)" id="btn_delete{{ $project->id }}">&nbsp;&nbsp;&nbsp;Delete</a>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                        @endif
                        </div>
                        @endforeach
                    </div>

                </div>

                @endif

            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        @foreach($projects as $project)
            $("#btn_on_off{{ $project->id }}").click(function(){
                var id_str = {{ $project->id }};
                var id = parseInt(id_str);
                $.post(
                    "{{ url('/admin/project/onoff') }}",
                    {'id':id},
                    function(data){
                        //alert(data.toString());
                        $("#btn_on_off{{ $project->id }}").attr("value", data.toString());
                    }
                );
            });
            $("#btn_delete{{ $project->id }}").click(function(){
                var id_str = {{ $project->id }};
                var id = parseInt(id_str);
                $.post(
                    "{{ url('/admin/project/delete') }}",
                    {'id':id},
                    function(data){
                        var num_str = data.toString();
                        var num = parseInt(num_str);

                        var extra = 10 - num;
                        var str = "<b>You're using " + num + " projects. You've got " + extra + " left.</b>";
                        alert("Selected project is deleted.");
                        $("#thumbnail{{ $project->id }}").remove();
                        $("#field_message").children().remove();
                        $("#field_message").append(str);

                    }
                );
            });
        @endforeach
    });

</script>



@endsection
