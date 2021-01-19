$(function() {

    $('.tag-item').on('click', function(e){
        $('.tag-form').trigger('submit');
    });
    $('.reply-form-toggle').on('click', function(){
        var id = $(this).attr('data-id');
        $('.reply-form-'+id).toggleClass('d-none');
    })

    $('.button-toggle-right-sidebar').on('click', function(){
        $('.right-sidebar').toggleClass('active');
        $('#app').toggleClass('prevent-scroll');
        $('.overlay-sidebars').toggleClass('active');
    });
    
    $('.button-toggle-sidebar').on('click', function(){
        $('.sidbar-wrapper').toggleClass('active');
        $('#app').toggleClass('prevent-scroll');
        $('.overlay-sidebars').toggleClass('active');
    });

    $('.close-sidebars').on('click', function(){
        $('.sidbar-wrapper').removeClass('active');
        $('.right-sidebar').removeClass('active');
        $('#app').removeClass('prevent-scroll');
        $('.overlay-sidebars').removeClass('active');
    });

    $(document).on('click','.activity-form', function(){
        var id = $(this).attr('data-id');
        $('.card-fixed-'+id).addClass('active');
        $('.overlay').addClass('active');
    });
    $('.overlay').on('click', function(){
        $('.card-fixed').removeClass('active');
        $('.overlay').removeClass('active');
    });
 });