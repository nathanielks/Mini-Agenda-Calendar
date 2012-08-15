$(document).ready(function(){
    $('a.date').live('click', function(e){

        e.preventDefault();
        var date = $(this).attr('href');
        $('.agenda-container').hide().addClass('hide').removeClass('show-icon');
        $(date).addClass('show-icon').fadeIn().removeClass('hide');

    });
});
