$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    // Edit films //
    $('.film-update-btn').click(function () {
        var film_id = $(this).data('id');
        var film_name = $(this).closest('tr').find('.film-name-inp').val();
        var film_votes = $(this).closest('tr').find('.film-votes-inp').val();
        var fade_and_set = $('.error-or-success').fadeIn(1000) + setTimeout(function(){$('.error-or-success').fadeOut(1000);}, 3000);
        $.post('editFilm', {
            ajax_film_id: film_id,
            ajax_film_name: film_name,
            ajax_film_votes: film_votes
        }, function (result) {
            if(result == 'error') {
                $('.error-or-success').css({
                    "background-color": "#ff9999",
                    "border": "1px solid #ff8080"
                });
                $('.error-or-success').text('error');
                fade_and_set;
            }
            else {
                $('.error-or-success').css({
                    "background-color": "#e6ffcc",
                    "border": "1px solid #d9ffb3",

                });
                $('.error-or-success').text('success');
                fade_and_set;
            }
        });
    });
    // ....... //

    // delete films //
    $('.del-film').click(function(){
        window.film_id = $(this).data('id');
        window.this_tr = $(this).closest('tr');
    });
    $('.yes').click(function(){
        $.post('deleteFilm', {
            ajax_film_id: film_id
        }, function (result) {
            this_tr.remove();
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
        $.post('voteFilm', {
            ajax_film_id: film_id
        }, function (result) {
            if(result == 'error') {
                return false;
            }
            else {
                console.log(result);
                $('.progress-bar').each(function(index){
                    $(this).css('width',result[index]);
                    $(this).closest('.row').find('.progress-completed').text(result[index]);
                })
                $('.vote').val('');
                this_radio.val(1);
                $('.voting-success').fadeIn(1000);
                setTimeout(function(){
                    $('.voting-success').fadeOut(1000);
                }, 3000);
            }
        });
    });
    // ....... //
})


