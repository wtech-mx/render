$(document).ready(function(){

    /*
        --DELETE IMAGE--
    */
    $(document).on('click','.deleteImage',function(event){
        var id = $(this).attr('data-id');
        $(this).ajaxPost('images/'+id,'DELETE','/');
    });


    /*
        --ADD IMAGE--
    */
    $(document).on('click','.addImage',function(event){
        $(this).ajaxPost('CreateImage','POST','/');
    })


    /*
        --ELEMENTALS FUNCTIONS
    */

    $.fn.ajaxPost = function(url,method,sectionToRender) {
        $.ajax({
            type: method,
            url: url,
            dataType: 'json',
            success: function (data) {
                ajaxRenderSection(sectionToRender)
            },
            error: function (data) {
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }

    function ajaxRenderSection(url) {
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                $('#principalPanel').empty().append($(data)); //se toma la data en formato json, luego se borra el Div padre de el Sections y se pinta el json (data) como htlm
            },
            error: function (data) {
                var errors = data.responseJSON;
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
    }

});