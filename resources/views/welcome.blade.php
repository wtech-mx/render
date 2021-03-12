<html>
	<head>
		<title>Uso de Render Sections L5</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	</head>

	<body>
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-md-8">
                    <h1>renderSections()</h1>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary pull-right" id="addImage" role="button">
                        Agregar Imagen
                    </a>
                </div>
            </div>
        </div>

        <div id="principalPanel">
            @section('contentPanel')
            @show
        </div>
    </div>
    <script  src="https://code.jquery.com/jquery-3.2.1.js"></script>


 <script >
$(document).ready(function(){

// var tiempo = 5000;
//
// var interval = setInterval(function() {
//   $('#addImage').trigger('click');
//
// }, tiempo);
//
// $('#addImage').click(function() {
//   console.log('clic en addImage');
// });

    /* --ADD IMAGE--*/
     $('#addImage').click(function(event){
        $(this).ajaxPost('{{ route('post.store') }}','GET','{{ route('images.index') }}');
    })

    /* --ELEMENTALS FUNCTIONS*/
    $.fn.ajaxPost = function(url,method,sectionToRender) {

        $.ajax(
                {
                    type: method,
                    url: url,
                    dataType: 'json',
                        success: function (data) {
                            ajaxRenderSection(sectionToRender)
                        },
                        error:function(){
                            alert("hay un error");
                        }
                }
            );
    }

    function ajaxRenderSection(url) {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('#principalPanel').empty().append($(data));
                //se toma la data en formato json,
                // luego se borra el Div padre de el Sections y se pinta el json (data) como html
            },
            error:function(){alert("hay un error");}
        });
    }

});
    </script>
	</body>
</html>
