$("#new-record-form").submit(function(e){
    e.preventDefault();
    let id = $(this).val();
    alert(id);
   
});
$(document).on('click', '.category', function(e) {
    e.preventDefault();
    var categoryId = $(this).val();
    $.ajax({
        url: 'controller/BookController.php',
        type: 'GET',
        data: {
            displayBook_id: categoryId
        },
        success: function(data) {
            $('.bookBody').html(data);
        }
    });
});



 