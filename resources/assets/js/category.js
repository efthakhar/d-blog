////
$(".deleteRecord").click(function(){
    var parent = $(this).closest('tr')
   
   
    var id = $(this).attr("id");
    var token = $("meta[name='csrf-token']").attr("content");
    var url = `/dashboard/categories/${id}`
    $.ajax({
  
        url: url,
  
        type: 'DELETE',
  
        data: {
  
            "id": id,
  
            "_token": token,
  
        },
  
        success: function (){
          parent.css('display','none')
        }
        
  
    });
  
  
  
    });
  