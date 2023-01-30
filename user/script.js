$(document).ready(function() {
    $("#search-form").submit(function(e) {
        e.preventDefault();

        var searchInput = $("#search-input").val();
        alert(searchInput);
        $.ajax({
            type: "POST",
            url: "search.php",
            data: {query: searchInput},
            success: function(data) {
                var results = JSON.parse(data);
                console.log(results);
            }
        });
    });
});