@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customize
                </div>

                <div class="panel-body" style="padding:0px;height:100vh;">

                    <div class="col-sm-3" style="height: 100%; padding:0px;background-color:lightgrey;">

                        <div class="col-sm-12 text-center" style="background-color:grey; padding:5px;">
                            <div class="col-sm-9" style="padding:10px;">
                            <a href="#" style="float:left;">Design&nbsp;&nbsp;</a>
                            <a href="#" style="float:left;">CSS&nbsp;&nbsp;</a>
                            <a href="#" style="float:left;">Html</a>
                            <a href="#" style="float:right;">Close</a>
                            </div>
                            <div class="col-sm-3" style="padding:5px;">
                            <input style="float: right;" type="submit" class="btn btn-success btn-sm" value="Save">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h3 class="text-success">Customizing</h3>
                        </div>
                        <div class="col-sm-12" style="padding:0px;">

                        <style>
                            @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
                            .panel-title > a:before {
                                float: right !important;
                                font-family: FontAwesome;
                                content:"\f056";
                                padding-right: 5px;
                            }
                            .panel-title > a.collapsed:before {
                                float: right !important;
                                content:"\f055";
                            }
                            .panel-title > a:hover,
                            .panel-title > a:active,
                            .panel-title > a:focus  {
                                text-decoration:none;
                            }

                        </style>

                        <div class="col-md-12" style="padding:0px;">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Logo
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="col-sm-12" style="border-bottom:1px solid lightgrey; padding:10px;">
                                            <input type="button" class="col-sm-12 btn btn-success" value="Upload Logo">
                                        </div>
                                        <div class="col-sm-12" style="border-bottom:1px solid lightgrey; padding:10px;">
                                            <input type="button" class="col-sm-12 btn btn-success" value="Upload Retina Logo">
                                        </div>
                                        <div class="col-sm-12" style="border-bottom:1px solid lightgrey; padding:10px;">
                                            <input type="button" class="col-sm-12 btn btn-success" value="Upload Favicon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Content
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="col-sm-12">
                                            <label class="form">Site Tagline</label>
                                            <input type="text" class="form form-control" name=""><br>
                                            <label class="form">Footer Text</label>
                                            <textarea class="form form-control" style="height:80px;" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Colors
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Site Title</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#000000">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#000000;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Main BG</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#ffffff">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#ffffff;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Sidebar Text</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#ffffff">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#ff00ff;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Navigation</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#4a324f">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#4a324f;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Link/Accent</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#129324">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#129324;">
                                            </div>
                                        </div>


                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Footer Text</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#340493">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#340493;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Panel BG</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#fffff2">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#fffff2;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Panel Text</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#495302">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#495302;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Page/Project Title</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#495932">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#495932;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Image Captions</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#876392">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#876392;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Meta Data</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#192920">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#192920;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Thumbnail Titles</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#2309fa">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#2309fa;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Border</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#6472aa">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#6472aa;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Form Label</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#aa8912">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#aa8912;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Form Input Borders</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#ee2312">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#ee2312;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Form Input BG</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#394203">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#394203;">
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Form Button Text</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form form-control" type="text" name="title_color" value="#09129b">
                                            </div>
                                            <div class="col-sm-2 img-rounded" style="height:35px; padding:5px;border:2px solid lightgrey; background-color:#09129b;">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Typography
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Site Title</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Sidebar Text</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Navigation</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Footer Text</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Panel Text</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Page/Project Title</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Meta Data</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Thumbnail Title</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Form Label</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">Chess</option>
                                                    <option id="2">Kevin</option>
                                                    <option id="3">Man</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Font Size
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Site Title</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Sidebar Text</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Navigation</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Footer Text</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Panel Text</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Page/Project Title</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Meta Data</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Thumbnail Title</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="padding:0px; margin-bottom:10px;">
                                            <div class="col-sm-5 text-center" style="padding:5px;">
                                                <label class="form">Form Label</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="form form-control" name="title_font_size">
                                                    <option id="1">12px</option>
                                                    <option id="2">24px</option>
                                                    <option id="3">32px</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            


                        </div>
                        </div>

                        </div>

                    </div>

                    <div class="col-sm-9">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
