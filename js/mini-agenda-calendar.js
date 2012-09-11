$(document).ready(function(){
    $('a.date').live('click', function(e){

        e.preventDefault();
        var date = $(this).attr('href');
        $('.agenda-container').hide().addClass('hide').removeClass('show-icon');
        $(date).addClass('show-icon').fadeIn().removeClass('hide');

    });
    $('a.calendar-title').live('click', function(e){

        e.preventDefault();
        $('.agenda-container').hide();
        $('.show-icon').removeClass('show-icon');
        $('.agenda-container:first-child').addClass('show-icon');
        $('.agenda-container.hide').fadeIn().removeClass('hide');

    });
});
