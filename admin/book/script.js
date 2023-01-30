$(document).ready(function(){
    
    $('#search-input').on('keyup', function(){
      var search = $(this).val();
     
      $.ajax({
        type:'GET',
        url:'search.php',
        data:{search:search},
        success:function(data){
          $('#search-results').html(data);
        }
      });
    });
  });
  