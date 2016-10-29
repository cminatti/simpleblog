
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// Validation comment
$(document).on('submit', '#comment-form', function(e) {  
    e.preventDefault();

    var form = $(this);
    
    //clear errors
    $('#comment-form small.control-label').remove();
    $('#comment-form .form-group').removeClass('has-error');
        
    $.ajax({
        method: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize()
    })
    .done(function(data) {
        console.log(data);
        $comment = $('.comment.template').clone().removeClass('template');
        $comment.find('.name').html(data.name);
        $comment.find('.body').html(data.body);
        $('#comments-list').append($comment);
        form[0].reset();
    })
    .fail(function(data) {
        //validation errors
        var errors = data.responseJSON;
//        console.log(errors);
        $.each(errors, function(index, value) {
            var group = $('#comment-form [name='+index+"]").parents('.form-group')
            group.addClass('has-error');
            group.append('<small class="control-label">'+value+'</small>');
        });
    });
    
    $(document).on('click', '#comment-form button.cancel', function(e) {  
        $('#comment-form')[0].reset();
    }); 
    
});
