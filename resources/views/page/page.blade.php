@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pages
                </div>

                @if($flag_page == 0)
                <div class="panel-body">
                    <div class="col-sm-8">
                        <b>You're using 0 pages. You've got 10 left.</b>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="{{ url('/admin/page/new') }}"><input type="button" class="btn btn-success btn-sm" name="btn_new" value="New Page"></a>
                    </div>
                    <div class="panel panel-default col-sm-12 text-center" style="padding: 20px;margin-top: 40px; background-color: lightgrey;">
                        <h4>Create your first page.</h4><br>
                        <p>Use pages to display additional information e.g. “about” or “contact”.<br>
                        Pages can be redirected to other websites such as social networks, blogs and shops.</p><br>
                        <a href="{{ url('/admin/page/new') }}"><input type="button" class="btn btn-success btn-sm" name="btn_new" value="New Page"></a>
                    </div>
                </div>
                @else

                <div class="panel-body">
                    <div id="field_message" class="col-sm-8">
                        <b>You're using {{ count($pages) }} pages. You've got {{ 10 - count($pages) }} left.</b>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="{{ url('/admin/page/new') }}"><input type="button" class="btn btn-success btn-sm" name="btn_new" value="New Page"></a>
                    </div>

                    @if($error_message)
                    <div class="col-sm-12 text-center" style="margin-top: 20px;padding: 10px;background-color: lightblue;">
                        {{ $error_message }}
                        <a href="#" style="float:right;">X</a>
                    </div>
                    @endif

                    <div class="col-sm-12" style="padding-top:10px;">
                        @foreach($pages as $page)
                        <div id="list{{ $page->id }}" class=" clearfix col-sm-12" style="padding-top:10px; border-bottom: 1px solid lightgrey;">
                            <div class="clearfix col-sm-6">
                                <a href="{{ url('/admin/page/update/page', [$page->id]) }}"><h4>{{ $page->title }}</h4></a>
                            </div>
                            <div class="clearfix col-sm-6" style="padding:5px;">
                            <div class="clearfix col-sm-6" style="padding:4px;">
                                <a href="javascript::void(0)" id="btn_delete{{ $page->id }}" style="float:right;">Delete</a>
                            </div>
                            <div class="clearfix col-sm-6" style="padding-right:0px;">
                                @if($page->is_active == 1)
                                    <input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $page->id }}" value="Off" style="float:right;">
                                @else
                                    <input class="btn btn-primary btn-sm" type="button" id="btn_on_off{{ $page->id }}" value="On" style="float: right;">
                                @endif
                            </div>
                            </div>
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
        @foreach($pages as $page)
            $("#btn_on_off{{ $page->id }}").click(function(){
                var id_str = {{ $page->id }};
                var id = parseInt(id_str);
                $.post(
                    "{{ url('/admin/page/onoff') }}",
                    {'id':id},
                    function(data){
                        //alert(data.toString());
                        $("#btn_on_off{{ $page->id }}").attr("value", data.toString());
                    }
                );
            });
            $("#btn_delete{{ $page->id }}").click(function(){
                var id_str = {{ $page->id }};
                var id = parseInt(id_str);
                $.post(
                    "{{ url('/admin/page/delete') }}",
                    {'id':id},
                    function(data){
                        var num_str = data.toString();
                        var num = parseInt(num_str);
                        var extra = 10 - num;
                        var str = "<b>You're using " + num + " pages. You've got " + extra + " left.</b>";
                        alert("Selected page is deleted.");
                        $("#list{{ $page->id }}").remove();
                        $("#field_message").children().remove();
                        $("#field_message").append(str);
                    }
                );
            });
        @endforeach
    });

</script>


@endsection
