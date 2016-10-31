
$(document).ready(function(){
    // update films //
    $('.film-update-btn').click(function(){
        var film_id = $(this).attr('name');
        var film_name = $(this).parent().parent().children().children('.film-name-inp').val();
        var film_votes = $(this).parent().parent().children().children('.film-votes-inp').val();
        $.ajax({
            type:'post',
            url:'/adminaccount/updateFilm/',
            data:{
                ajax_film_id:film_id,
                ajax_film_name:film_name,
                ajax_film_votes:film_votes
            },
            success:function(result){
                if(result == 'error') {
                    $('.error-or-success').css({
                        "background-color": "#ff9999",
                        "display": "block",
                        "border": "1px solid #ff8080"
                    });
                    $('.error-or-success').text('error');
                    setTimeout(function(){ 
                        $('.error-or-success').css('display', 'none'); 
                    }, 3000);
                }
                else {
                    $('.error-or-success').css({
                        "background-color": "#e6ffcc",
                        "display": "block",
                        "border": "1px solid #d9ffb3",

                    });
                    $('.error-or-success').text('success');
                    setTimeout(function(){ 
                        $('.error-or-success').css('display', 'none'); 
                    }, 3000);
                }
            }
        });
    });
    // ....... //

    // delete films //
    $('.del-film').click(function(){
        window.film_id = $(this).attr('data');
        window.this_tr = $(this).parent().parent();
    });
    $('.yes').click(function(){
        $.ajax({
            type:'post',
            url:'/adminaccount/deleteFilm/',
            data:{
                ajax_film_id:film_id
            },
            success:function(result){
                this_tr.remove();
            }
        });
    });
    // ....... //

    // voting films //
    $('.vote').click(function(){
        if($(this).val() == 1){
            return false;
        }
        var film_id = $(this).data('id');
        var this_radio = $(this);
        $.ajax({
            type:'post',
            url:'/home/voting/',
            dataType: 'json',
            data:{
                ajax_film_id:film_id
            },
            success:function(result){
                if(result == 'error') {
                    return false;
                }
                else {
                    $('.progress-bar').each(function(index){
                        $(this).css('width',result[index]);
                        $(this).parent().parent().children('.progress').children('.progress-completed').text(result[index]);
                    })
                    $('.vote').val('');
                    this_radio.val(1);
                    $('.voting-success').fadeIn(1000);
                    setTimeout(function(){ 
                        $('.voting-success').fadeOut(1000);; 
                    }, 3000);
                }
            }
        });
    });
    // ....... //
});



