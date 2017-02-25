@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <canvas id="usage" width="320px" height="100px" style="float:right;"></canvas>
</div>

<script type="text/javascript">
    var canvas = document.getElementById("usage");
	var ctx = canvas.getContext("2d");
    var rate = {{ $num_projects }}*20/100;

    ctx.lineWidth=15;
    ctx.fillStyle = "#ffffff";
    ctx.strokeStyle = "#000000";
    ctx.beginPath();
	ctx.arc(65,35,25,0,rate*Math.PI,true);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
    ctx.strokeStyle = "#ffffff";
    ctx.lineWidth=20;
    ctx.beginPath();
	ctx.arc(65,35,25,0,rate*Math.PI,false);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
    ctx.strokeStyle = "#000000";
    ctx.fillStyle = "#000000";
	ctx.font = "10px Arial";
    ctx.fillText("{{ $num_projects }} / 10 projects",35,85);

    var rate = {{ $num_pages }}*20/100;
    ctx.linewidth = 15;
    ctx.fillStyle = "#ffffff";
    ctx.strokeStyle = "#000000";
    ctx.beginPath();
	ctx.arc(160,35,25,0,rate*Math.PI, true);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
    ctx.linewidth = 20;
    ctx.strokeStyle = "#ffffff";
    ctx.beginPath();
	ctx.arc(160,35,25,0,rate*Math.PI, false);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
    ctx.strokeStyle = "#000000";
    ctx.fillStyle = "#000000";
	ctx.font = "10px Arial";
    ctx.fillText("{{ $num_pages }} / 10 pages",130,85);

    var rate = {{ $num_images }}*2/100;
    ctx.linewidth = 15;
    ctx.fillStyle = "#ffffff";
    ctx.strokeStyle = "#000000";
    ctx.beginPath();
	ctx.arc(255,35,25,0,rate*Math.PI, true);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
    ctx.linewidth = 20;
    ctx.strokeStyle = "#ffffff";
    ctx.beginPath();
	ctx.arc(255,35,25,0,rate*Math.PI, false);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
    ctx.strokeStyle = "#000000";
    ctx.fillStyle = "#000000";
	ctx.font = "10px Arial";
    ctx.fillText("{{ $num_images }} / 100 images",225,85);



</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Settings
                </div>

                <div class="panel-body">
                    <form method="post" action="{{ url('/admin/account/setting_save') }}" enctype="multipart/form-data">{{ csrf_field() }}
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success btn-sm" name="btn_save" id="btn_save" value="Save Changes" style="float:right;">
                    </div>
                    <div class="col-sm-6">
                        <br>
                        <label class="form">Site Title</label>
                        <input type="text" class="form form-control" name="site_title" value="{{ $account->site_title }}">
                        <br>
                        <label class="form">Portfolio URL</label>
                        <div class="col-sm-12" style="padding:0px;">
                            <div class="col-sm-8" style="padding:0px;">
                                <input type="text" class="form form-control" name="portfolio_url" value="{{ $account->portfolio_url }}">
                            </div>
                            <div class="col-sm-4" style="padding:5px;">
                                <label>.domain.com</label>
                            </div>
                        </div>

                        <br>
                        &nbsp;&nbsp;
                        <label class="form" style="float:right;">
                            &nbsp;&nbsp;
                            Available
                        </label>
                        @if($account->available)
                        <input type="checkbox" class="form" name="available" style="float:right;" checked="true">
                        @else
                        <input type="checkbox" class="form" name="available" style="float:right;">
                        @endif
                        <br><br>
                        <label class="form">Custom Domain</label>
                        <div class="col-sm-12" style="padding:0px;">
                            <div class="col-sm-1" style="padding:5px;">
                                <label>www.</label>
                            </div>
                            <div class="col-sm-11" style="padding:0px;">
                                <input type="text" class="form form-control" name="custom_domain" value="{{ $account->custom_domain }}">
                                <br>
                            </div>

                        </div>

                        <br>
                        <label class="form">Password Protected</label>
                        <input type="text" class="form form-control" name="password_protected" value="{{ $account->password_protected }}">

                        <br>
                        <label class="form text-left">Meta Title - If you want to overwrite the sitewide meta title</label>
                        <input type="text" class="form form-control" name="meta_title" value="{{ $account->meta_title }}">

                        <br>
                        <label class="form">Meta Description - If you want to overwrite the sitewide meat dec</label>
                        <textarea class="form form-control col-sm-12" name="description" placeholder="" style="height:70px; margin-bottom:25px; ">{{ $account->meta_description }}</textarea>
                    </div>
                    <div class="col-sm-6">
                        <br>
                        <label class="form text-left">Google Analytics</label>
                        <input type="text" class="form form-control" name="google_analytics" value="{{ $account->google_analytics }}">
                        <br><br>
                        @if($account->show_domain)
                        <input type="checkbox" class="form" name="show_domain" style="float:left;" checked="true">
                        @else
                        <input type="checkbox" class="form" name="show_domain" style="float:left;">
                        @endif
                        <label class="form" style="float:left;">&nbsp;&nbsp;Show Domain.com Credit</label>
                        <br><br><br>
                        <label class="form">Site Logo</label>
                        <br>
                        <div class="col-sm-2" style="padding-left:0px; margin-bottom:10px;">
                            @if($account->logo_image)
                            <img id="logo" class="img-rounded" src="{{ URL::asset('logo_image') }}/{{ $account->logo_image }}" width="100px" height="100px">
                            @else
                            <img id="logo" class="img-rounded" src="{{ URL::asset('main_resource/images/placeholder.png') }}" width="100px" height="100px">
                            @endif

                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-9" style="padding-left:0px;">
                            <div id="img_preview_logo" class="btn btn-default col-sm-3" style="background-color: grey;">
                                <input type="file" class="form col-sm-12" name="btn_logo" id="btn_logo" style="opacity:0; position:absolute;">
                                UPLOAD
                            </div>
                            <br><br>
                            <a id="btn_logo_delete" href="javascript::void(0)">X REMOVE</a>
                        </div>
                        <br><br><br><br><br><br>
                        <label class="form">Favicon / Apple Icon / Shortcut Icon</label>
                        <br>
                        <div class="col-sm-2" style="padding-left:0px; margin-bottom:10px;">
                            @if($account->favicon_image)
                            <img id="favicon" class="img-rounded" src="{{ URL::asset('favicon_image') }}/{{ $account->favicon_image }}" width="80px" height="80px">
                            @else
                            <img id="favicon" class="img-rounded" src="{{ URL::asset('main_resource/images/placeholder.png') }}" width="80px" height="80px">
                            @endif

                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-9" style="padding-left:0px;">
                            <div id="img_preview_favicon" class="btn btn-default col-sm-3" style="background-color: grey;">
                                <input type="file" class="form col-sm-12" name="btn_favicon" id="btn_favicon" style="opacity:0; position:absolute;">
                                UPLOAD
                            </div>
                            <br><br>
                            <a id="btn_favicon_delete" href="javascript::void(0)">X REMOVE</a>
                        </div>
                        <br><br><br><br><br><br>
                        <img src="{{ URL::asset('main_resource/images/trush.png') }}" width="40px" height="20px">
                        <a id="btn_delete_account" href="javascript::void(0)">Delete Account</a>
                        <br><br>
                        <div class="col-sm-12">
                            <input type="button" class="btn btn-default" name="btn_upload_upgrade" value="UPGRADE" style="background-color: grey;">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

document.getElementById("btn_logo").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("logo").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

document.getElementById("btn_favicon").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("favicon").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};

</script>

<script>
    $(document).ready(function(){
        $("#btn_logo_delete").click(function(){
            $.post(
                "{{ url('/admin/account/logodelete') }}",
                {},
                function(data){
                    $("#logo").attr("src", "{{ URL::asset('main_resource/images/placeholder.png') }}");
                }
            );
        });

        $("#btn_favicon_delete").click(function(){
            $.post(
                "{{ url('/admin/account/favicondelete') }}",
                {},
                function(data){
                    $("#favicon").attr("src", "{{ URL::asset('main_resource/images/placeholder.png') }}");
                }
            );
        });

        $("#btn_delete_account").click(function(){
            $.post(
                "{{ url('/admin/account/accountdelete') }}",
                {},
                function(data){
                    alert("Successfully your account is deleted.");
                    location.reload();
                }
            );
        });

    });
</script>

@endsection
