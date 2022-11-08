$(".deleteRecord").click(function(){
    var parent = $(this).closest('tr')
   
   
    var id = $(this).attr("data-post-id");
    var token = $("meta[name='csrf-token']").attr("content");
    var url = `/dashboard/posts/${id}`
    $.ajax({
  
        url: url,
        type: 'DELETE',
        data: {"id": id,"_token": token},

        success: function (){
          parent.css('display','none')
        }  
  
    });
  
  
});

let catBox = document.querySelector('.catBox');
// catBox.style.display = 'none'

let catBoxHeader = document.querySelector('.catBoxHeader')

catBoxHeader.addEventListener('click',(e)=>{
  catBox.classList.toggle('showCatBox')
})