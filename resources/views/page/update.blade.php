@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Page
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <label class="text-info">/{{ $page->title }}</label>
                    </div>
                    <form id="form_save" method="post" action="{{ url('/admin/page/update/save') }}" enctype="multipart/form-data">{{ csrf_field() }}
                    <div class="col-sm-6">
                        <div style="float:right;">

                            <a id="btn_delete_project" href="{{ url('/admin/page/delete-update', [$page->id]) }}">Delete&nbsp;&nbsp;&nbsp;</a>

                            @if($page->is_active == 1)
                            <input type="button" class="btn btn-primary btn-sm" id="btn_on_off{{ $page->id }}" name="btn_new" value="Off">&nbsp;&nbsp;&nbsp;
                            @else
                            <input type="button" class="btn btn-primary btn-sm" id="btn_on_off{{ $page->id }}" name="btn_new" value="On">&nbsp;&nbsp;&nbsp;
                            @endif

                            <input type="submit" class="btn btn-success btn-sm" name="btn_save" id="btn_save" value="Save Changes">
                        </div>
                    </div>

                        <input type="hidden" name="page_id" value="{{ $page->id }}">
                    <div class="col-sm-6">
                        <br>
                        <label class="form">Title</label>
                        <input type="text" class="form form-control" name="title" value="{{ $page->title }}">
                        <br>
                        <label class="form">Description</label>
                        <textarea class="form form-control col-sm-12" name="description" placeholder="Rich Text Editor" style="height:150px; margin-bottom:25px; ">{{ $page->description }}</textarea>

                        <div class="col-sm-5">
                            <div id="img_preview" class="btn btn-default col-sm-12">
                                <input type="file" class="form col-sm-12" name="image_file" id="image_file" style="opacity:0; position:absolute;">
                                Browse to Upload
                            </div>
                            <img id="image" src="{{ URL::asset('page_image') }}/{{ $page->image_name }}" class="col-sm-12" style="padding:0px;padding-top:10px;">
                        </div>

                        <div class="col-sm-7 text-center" style="margin-bottom:25px;">
                            <p>
                                <br>
                                Your current template displays images at a<br>
                                 maximum of 2000px x any height or 4000px x<br>
                                  any height for HiDPI displays.<br>
                                If your images are bigger than the size above,<br>
                                 we will crop them for you (upload size limited to<br>
                                  less than 5000px.)
                            </p>
                        </div>

                        <br>
                        <label class="form text-left">Meta Title - If you want to overwrite the sitewide meta title</label>
                        <input type="text" class="form form-control" name="meta_title" value="{{ $page->meta_title }}">

                        <br>
                        <label class="form">Meta Description - If you want to overwrite the sitewide meat dec</label>
                        <textarea class="form form-control col-sm-12" name="meta_description" placeholder="" style="height:70px; margin-bottom:25px; ">{{ $page->meta_description }}</textarea>

                    </div>
                    <div class="col-sm-6">

                        <br>
                        <label class="form text-left">Permalink</label>
                        <input type="text" class="form form-control" name="permalink" value="{{ $page->permalink }}">

                        <br>
                        <label class="form text-left">Password Protected</label>
                        <input type="text" class="form form-control" name="password" value="{{ $page->password_protected }}">
                        <br>
                        <label class="form text-left">Nav Menu Label</label>
                        <input type="text" class="form form-control" name="menu_label" value="{{ $page->nav_menu_label }}">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

document.getElementById("image_file").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

</script>


<script>
$("#btn_on_off{{ $page->id }}").click(function(){
    var id_str = {{ $page->id }};
    var id = parseInt(id_str);
    $.post(
        "{{ url('admin/page/onoff') }}",
        {'id':id},
        function(data){
            //alert(data.toString());
            $("#btn_on_off{{ $page->id }}").attr("value", data.toString());
        }
    );
});
</script>


@endsection
