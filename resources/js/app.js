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
});



