$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $(document).on("click", ".btn-toggle-fav", function(){
        var postdata = "bookmarks_id=" + $(this).attr("data-id");
        $.ajax({
            url: "/ajax/toogle",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){
                let json = $.parseJSON(response)
                $('.container').prepend('<div class="message success" >'+json.message+'</div>');
                setTimeout(function() {
                    $('.message').css('display', 'none');
                }, 3000);
            }
        });
    });
});