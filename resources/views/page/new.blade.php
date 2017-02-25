@extends('layouts.app')

@section('content')


<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 23px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(15px);
  -ms-transform: translateX(15px);
  transform: translateX(15px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 15px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add New Page
                </div>

                <div class="panel-body">
                <form role="form" action="{{ url('/admin/page') }}" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
                    <div class="col-sm-2">
                        <b>Active/Inactive</b>
                    </div>
                    <div class="col-sm-6">
                        <label class="switch">
                            <input name="is_active" type="checkbox">
                            <div class="slider round"></div>
                        </label>
                    </div>
                    <div class="col-sm-4 text-right">
                        <input type="submit" class="btn btn-success btn-sm" name="btn_save" value="Save Project">
                    </div>

                    <div class="col-sm-6">
                        <br>
                        <label class="form">Title</label>
                        <input type="text" class="form form-control" name="title" value="">
                        <br>
                        <label class="form">Description</label>
                        <textarea class="form form-control col-sm-12" name="description" placeholder="Rich Text Editor" style="height:150px; margin-bottom:25px; "></textarea>

                        <div class="col-sm-5">
                            <div id="img_preview" class="btn btn-default col-sm-12">
                                <input type="file" class="form col-sm-12" name="image_file" id="image_file" style="opacity:0; position:absolute;">
                                Browse to Upload
                            </div>
                            <img id="image" class="col-sm-12" style="padding:0px;padding-top:10px;">
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
                        <input type="text" class="form form-control" name="meta_title" value="">

                        <br>
                        <label class="form">Meta Description - If you want to overwrite the sitewide meat dec</label>
                        <textarea class="form form-control col-sm-12" name="meta_description" placeholder="" style="height:70px; margin-bottom:25px; "></textarea>

                    </div>
                    <div class="col-sm-6">

                        <br>
                        <label class="form text-left">Permalink</label>
                        <input type="text" class="form form-control" name="permalink" value="">

                        <br>
                        <label class="form text-left">Password Protected</label>
                        <input type="text" class="form form-control" name="password" value="">
                        <br>
                        <label class="form text-left">Nav Menu Label</label>
                        <input type="text" class="form form-control" name="menu_label" value="">
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

@endsection
