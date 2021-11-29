$(function() {
    // data table
    // configuration table
    $('#table-dinas').DataTable({
        'scrollX': true,
    })

    // alert flash
    setTimeout(function() {
        $('.flash').slideUp(500);
    }, 3000);

    // dashboard card
    $('.card-dashboard').each(function(idx, res) {
        $(this).mouseover(function() {
            $(this).addClass('shadow');
            $(this).css('cursor', 'pointer');
        });
        $(this).mouseleave(function() {
            $(this).removeClass('shadow');
        });

        $(this).click(function() {
            window.location.href = $(this).data('target');
        });
    })

    // select2
    $("select.select2").each(function() {
        let text = $(this).data('placeholder');
        $(this).select2({
            'placeholder': text,
        });
    });
});