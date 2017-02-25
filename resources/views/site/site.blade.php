
<div id="container" class="container">
    {{ $header_str }}
</div>
<script>

    $(document).ready(function(){

        var str = "{{ $header_str }}";
        alert(temp);
        $("#container").append(temp);
        {{ $js_str }}
    });

</script>
