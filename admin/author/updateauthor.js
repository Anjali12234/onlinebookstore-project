function updateAuthor(authid){
    $.ajax({    //create an ajax request to get product details
        type: "POST",
        url: "update.php",
        dataType: "json",   //expect json to be returned
        data : {auth_id :authid},
        success: function(data){
            console.log(data);
            
           
            console.log("success getting product details");
            $('#updateProduct').modal('show');

        },
        error: function(response) {

            console.log('ERROR BLOCK');
            console.log(response);
        }

    });
}