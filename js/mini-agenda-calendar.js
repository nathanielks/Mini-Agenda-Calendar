jQuery(document).ready(function($){
    $('a.date').live('click', function(e){

        e.preventDefault();
        var date = $(this).attr('href');
        $('.agenda-container').hide().addClass('hide').removeClass('show-icon');
        $(date).addClass('show-icon').fadeIn().removeClass('hide');

    });
    $('#ai1ec-calendar-view').delegate('a.calendar-title', 'click', function(e){

        e.preventDefault();
        $('.agenda-container').addClass('hide').hide();
        $('.show-icon').removeClass('show-icon');
        $('.agenda-container:first-child').addClass('show-icon');
        $('.agenda-container.hide').fadeIn().removeClass('hide');

    });
});
