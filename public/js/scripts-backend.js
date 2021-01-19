$(function() {
    $(document).on('click','.edit-event', function(){
        var id = $(this).attr('data-id');
        $('.card-fixed-'+id).addClass('active');
        $('.overlay').addClass('active');
    });
    $('.overlay').on('click', function(){
        $('.card-fixed').removeClass('active');
        $('.overlay').removeClass('active');
    });
    
    $(document).on('click','.delete-event', function(){
        var id = $(this).attr('data-id');
        $('.delete-card-'+id).addClass('active');
        $('.overlay').addClass('active');
    });

    $(document).on('change','.checkbox-action', function(){
        if($(this).is(":checked")){
            $(this).val("1");
        } else {
            $(this).val("0");
        }
        var id = $(this).attr('data-id');
        var form = $('#change-status-'+id);
        form.trigger('submit');
    });

    $(document).on('click', '.approve-button', function(){
        var id = $(this).attr('data-id');
        $('.approve-card-'+id).addClass('active');
        $('.overlay').addClass('active');
    });
    
    $(document).on('click', '.disapprove-button', function(){
        var id = $(this).attr('data-id');
        $('.disapprove-card-'+id).addClass('active');
        $('.overlay').addClass('active');
    });
 });