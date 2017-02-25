@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Project
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <label class="text-info">/{{ $project->title }}</label>
                    </div>
                    <div class="col-sm-6">
                        <div style="float:right;">

                            <a id="btn_delete_project" href="{{ url('/admin/project/delete-update', [$project->id]) }}">Delete&nbsp;&nbsp;&nbsp;</a>

                            @if($project->is_active == 1)
                            <input type="button" class="btn btn-primary btn-sm" id="btn_on_off{{ $project->id }}" name="btn_new" value="Off">&nbsp;&nbsp;&nbsp;
                            @else
                            <input type="button" class="btn btn-primary btn-sm" id="btn_on_off{{ $project->id }}" name="btn_new" value="On">&nbsp;&nbsp;&nbsp;
                            @endif
                            <input type="button" class="btn btn-success btn-sm" name="btn_save" id="btn_save" value="Save Changes">
                        </div>
                    </div>

                    <div class="col-sm-12" style="padding-top:10px;">
                        <div class="clearfix col-sm-3">
                            <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                                    <img style="height:190px; padding:0px; width:190px;" class="col-sm-12" src="{{ URL::asset('project_image') }}/{{ $project->img_name }}">
                                    <img style="height:30px;width:30px;position:absolute;left:20px;bottom:185px;" class="" src="{{ URL::asset('main_resource/images/star.png') }}">
                                <div class="col-sm-12" style="padding:0px;padding-top:10px;">
                                    <label class="text-success form">Project Thumbnail Image</label>
                                </div>
                            </div>
                        </div>
                        <div id="images">
                            @if($images)
                            @foreach($images as $ima)
                            <div id="image{{ $ima->id }}" class="clearfix col-sm-3">
                                <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                                        <img style="height:190px; padding:0px; width:190px;" class="col-sm-12" src="{{ URL::asset('embeded_image') }}/{{ $ima->image_name }}">
                                    <div class="col-sm-12" style="padding:0px;padding-top:10px;">
                                        @if($ima->is_active == 1)
                                        <input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $ima->id }}" value="Off">
                                        @else
                                        <input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $ima->id }}" value="On">
                                        @endif
                                        <a href="javascript::void(0)" id="btn_delete{{ $ima->id }}">&nbsp;&nbsp;&nbsp;Delete</a>
                                        @if($ima->is_saved == 1)
                                        <label class="text-success form">&nbsp;&nbsp;It is saved.</label>
                                        @else
                                        <label class="text-success form">&nbsp;&nbsp;It is not saved.</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="clearfix col-sm-3" style="">
                            <div class="col-sm-12" style="padding: 10px;padding-bottom:0px;">
                                    <img style="height:190px; padding:0px; width:190px; border: 2px dashed lightgrey;" class="col-sm-12" src="">
                                    <div id="img_preview" class="" style="border:none;width:180px;height:180px;position:absolute;left:15px;top:15px;">
                                        <form id="form_image" method="post" action="{{ url('/admin/project/save_image') }}" enctype="multipart/form-data">
                                            <input type="file" class="btn btn-default col-sm-12" name="image_file" id="image_file" style="opacity:0; position:absolute; width:180px; height:180px;">
                                            <br><br><br>&nbsp;&nbsp;&nbsp;Click here for Browsing to<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Upload
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </div>
                                <div class="col-sm-12" style="padding:0px;padding-top:10px;">
                                    <label class="text-success form">Embeded Image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-top:20px; padding: 0px;border-bottom: 1px solid lightgrey;padding-bottom:20px;">
                        <div class="col-sm-12 text-center" style="padding: 0px;padding-top: 10px;border-bottom: 1px solid lightgrey;padding-bottom:20px;background-color:lightgrey;">
                            <p>Your current template displays images at a maximum of 880px x any height or 1760px x any     height for HiDPI displays.<br>
                                If your images are bigger than the sizes above, we'll crop them for you (upload size limited to less than 5000px).</p>
                        </div>
                    </div>

                    <form id="form_save" method="post" action="{{ url('/admin/project/update/save') }}">{{ csrf_field() }}
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="col-sm-12">
                        <br>
                        <label class="form">Title</label>
                        <input type="text" class="form form-control" name="title" value="{{ $project->title }}">
                        <br>
                        <label class="form">Description</label>
                        <textarea class="form form-control col-sm-12" name="description" placeholder="Rich Text Editor" style="height:150px; margin-bottom:25px; ">{{ $project->description }}</textarea>
                        <br>
                        <label class="form text-left">Meta Title - If you want to overwrite the sitewide meta title</label>
                        <input type="text" class="form form-control" name="meta_title" value="{{ $project->meta_title }}">

                        <br>
                        <label class="form">Meta Description - If you want to overwrite the sitewide meat dec</label>
                        <textarea class="form form-control col-sm-12" name="meta_description" placeholder="" style="height:70px; margin-bottom:25px; ">{{ $project->meta_description }}</textarea>
                        <br>
                        <label class="form text-left">Date</label>
                        <input type="text" class="form form-control" name="date" value="{{ $project->date }}">
                        <br>
                        <label class="form text-left">Client</label>
                        <input type="text" class="form form-control" name="client" value="{{ $project->client }}">
                        <br>
                        <label class="form text-left">Role</label>
                        <input type="text" class="form form-control" name="role" value="{{ $project->role }}">
                        <br>
                        <label class="form text-left">Permalink</label>
                        <input type="text" class="form form-control" name="permalink" value="{{ $project->permalink }}">
                        <br><br>
                        <label class="form text-left">Tags</label>
                        <input type="text" class="form form-control" name="tags" value="{{ $project->tags }}">
                        <br>
                        <label class="form text-left">Password Protected</label>
                        <input type="text" class="form form-control" name="password" value="{{ $project->password_protected }}">
                        <br>
                        <label class="form text-left">Project External URL</label>
                        <input type="text" class="form form-control" name="external_url" value="{{ $project->project_external_url }}">
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#image_file").change(function(){
            $("#form_image").submit();
            /*
            $("#form_image").ajaxForm(options);
            var options = {
                complete: function(response)
                {
                	if($.isEmptyObject(response.responseJSON.error)){
                		//$("input[name='title']").val('');
                		alert('Image Upload Successfully.');
                	}else{
                		//printErrorMsg(response.responseJSON.error);
                        alert('Image Upload Failed.');
                	}
                }
            };
            */
        });

        $("#btn_save").click(function(){
            $("#form_save").submit();
        });

        $("#btn_on_off{{ $project->id }}").click(function(){
            var id_str = {{ $project->id }};
            var id = parseInt(id_str);
            $.post(
                "{{ url('admin/project/onoff') }}",
                {'id':id},
                function(data){
                    //alert(data.toString());
                    $("#btn_on_off{{ $project->id }}").attr("value", data.toString());
                }
            );
        });

        @foreach($images as $ima)
        $("#btn_on_off{{ $ima->id }}").click(function(){
            var id_str = {{ $ima->id }};
            var id = parseInt(id_str);
            $.post(
                "{{ url('admin/project/update/onoff') }}",
                {'id':id},
                function(data){
                    //alert(data.toString());
                    $("#btn_on_off{{ $ima->id }}").attr("value", data.toString());
                }
            );
        });
        $("#btn_delete{{ $ima->id }}").click(function(){
            var id_str = {{ $ima->id }};
            var id = parseInt(id_str);
            $.post(
                "{{ url('admin/project/update/delete') }}",
                {'id':id},
                function(data){
                    $("#image{{ $ima->id }}").remove();
                    alert(data);
                }
            );
        });
        @endforeach

    });
</script>



@endsection
