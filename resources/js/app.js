// require('./bootstrap');
require('./squad');

// require('alpinejs');
// require('aos');
// require('glightbox');

$(document).ready(function(){

    $('#searchForm').keydown(function (event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // Ajax Search
    $('#search').keyup(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var search = $('#search').val();
        if(search == ""){
            $("#searchList").html("");
            $('#searchResult').hide();
        }
        else{
            $.get("/user/search",{search:search}, function(data){
                $('#searchList').empty().html(data);
                $('#searchResult').show();
            })
        }
    });

    // Ajax Like
    $('#toLike').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let itemId = $('#toLike').attr('data-id');
        $.get("/user/like", {id:itemId}, function(data){
            $('#likeSvg').css('fill', 'red');
        });
    });

    // Ajax Favorites
    $('#toFavorites').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        let itemId = $('#toFavorites').attr('data-id');
        $.get("/user/favorites", {id:itemId}, function(data){
            $('#favoriteSvg').css('fill', 'red');
            $('#navFavorites').css('color', '#faa3a3');
        });
    });

    // $("#btn-request").click(function (e) {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') // Обязательно для передачи!!!
    //         }
    //     });
    //     e.preventDefault();
    //     var is_checked = jQuery('#favorites').prop("checked") ? 1 : 0
    //     var predefined = $('#predefined').val()
    //     var methods = [
    //         'GET',
    //         'POST',
    //         'PUT',
    //         'DELETE'
    //     ];
    //     var formData = {
    //         name: jQuery('#task_name').val(),
    //     };
    //     $.ajax({
    //         type: methods[1],
    //         url: '/api/tasks',
    //         data: formData,
    //         dataType: 'json',
    //         success: function (data) {
    //             console.log(data);
    //             jQuery('#formModal').modal('hide')
    //         },
    //         error: function () {
    //             jQuery('#formModal').modal('hide')
    //         }
    //     });
    // });

});



