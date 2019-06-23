$(document).ready(function () {
    $('#example').DataTable();

    $('.flash_message').slideDown(3000, function () {
        $(this).delay(500).slideUp(5000);
    });    
});