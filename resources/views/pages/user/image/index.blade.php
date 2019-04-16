<!DOCTYPE html>

<html lang="en">
<head>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <meta charset="utf-8" />
    <title>JavaScript Load Image</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ url('static/user/css/vendor/jquery.Jcrop.css') }}" />
    <link rel="stylesheet" href="{{ url('static/user/css/demo.css') }}" />
</head>
<body>
<p><input type="file" id="file-input" /></p>
<p>Or <strong>drag &amp; drop</strong> an image file onto this webpage.</p>
<h2>Result</h2>
<p id="actions" style="display:none;">
    <button type="button" id="edit">Edit</button>
    <button type="button" id="crop">Crop</button>
    <button type="button" id="cancel">Cancel</button>
</p>
<div id="result">
    <p>
        This demo works only in browsers with support for the
        <a href="https://developer.mozilla.org/en/DOM/window.URL">URL</a> or
        <a href="https://developer.mozilla.org/en/DOM/FileReader">FileReader</a>
        API.
    </p>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
        var listContent = [];
        var i = 0;

        function clickImage(event,img){
            console.log('You clicked at');
            i += 1;
            listContent.push(i);
            console.log(listContent);
            var div = $("<div class='image-wrapper div_content_"+i+"'>")
                    .css({
                        "left": event.offsetX + 'px',
                        "top": event.offsetY + 'px'
                    });
                    {{--.append($('<img src="{{ url('static/user/images/funny-icon.jpeg') }}" alt="myimage" />'));--}}
            console.log(div);
            $( ".image" ).append(div);

                    $("#form-content").append('<input type="text" name="connent" content="'+i+'" class="content-input content_'+i+'" onkeyup="formPress('+i+')">')
        }
        function editForm(item) {
            console.log(item.value);
            $(".div_content_"+i).append('<p>'+item.value+'</p>')
        }

        $( document ).ready(function() {
            $(".image").click(function() {
                console.log('abcdef');

            });
            console.log('123456');

        });

        $(document).ready(function(){
            $("p").click(function(){
                alert("The paragraph was clicked.");
            });
        });
        function formPress(i)
        {
            console.log(i);
            $(".div_content_"+i).html('<p>'+$('.content_'+i)[0].value+'</p>')
            console.log($('.content_'+i));
        }



    function getImageCoords(event,img) {
        var posX = event.offsetX?(event.offsetX):event.pageX-img.offsetLeft;
        var posY = event.offsetY?(event.offsetY):event.pageY-img.offsetTop;
        alert("You clicked at: ("+posX+","+posY+")");
    }
</script>
<form id="form-content">
</form>
<div class="image">
    <img onclick="clickImage(event,this);" src="{{ url('images/outputv1.jpg') }}"/>
</div>
<div id="exif" style="display:none;">
    <h3>Exif meta data</h3>
    <p id="thumbnail" style="display:none;"></p>
    <table></table>
</div>
<div id="iptc" style="display:none;">
    <h3>IPTC meta data</h3>
    <table></table>
</div>
<script src="{{ url('static/user/js/load-image.js') }}"></script>
<!--
  jQuery and Jcrop are not required by JavaScript Load Image,
  but included for the demo
-->
<script src="{{ url('static/user/js/vendor/jquery.js') }}"></script>
<script src="{{ url('static/user/js/vendor/jquery.Jcrop.js') }}"></script>
<script src="{{ url('static/user/js/demo/demo.js') }}"></script>
</body>
</html>
