// require('./bootstrap');
require('./squad');

// require('alpinejs');
// require('aos');
// require('glightbox');

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#searchForm').keydown(function (event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // Ajax Search
    $('#search').keyup(function(){
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
        e.preventDefault();
        let itemId = $('#toLike').attr('data-id');
        $.get("/user/like", {id:itemId}, function(data){
            $('#likeSvg').css('fill', 'red');
        });
    });

    // Ajax Favorites
    $('#toFavorites').click(function(e){
        e.preventDefault();
        let itemId = $('#toFavorites').attr('data-id');
        $.get("/user/favorites", {id:itemId}, function(data){
            $('#favoriteSvg').css('fill', 'red');
            $('#navFavorites').css('color', '#faa3a3');
        });
    });

    // Ajax Comment
    $('#toCommentLink').click(function () {
        $('#commentForm').trigger("reset");
    });

    $("#toCommentBtn").click(function (e) {
        e.preventDefault();
        var formData = {
            good_id: $('#goodId').val(),
            user_id: $('#userId').val(),
            comment: $('#comment').val(),
            _token: $('meta[name="csrf-token"]').attr('content'),
        };
        $.ajax({
            type: 'POST',
            url: '/user/comment',
            data: formData,
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#toCommentSvg').css('fill', 'red')
            },
            error: function (e) {
                console.log(e)
                $('#toCommentSvg').css('fill', 'blue')
            }
        });
    });

});



