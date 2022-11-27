$(document).on('change', '.limited', function() {
    var countShared = $('.limited:checked').length;

    if(countShared > 3) {
        $(this).prop('checked',false);
    }
});