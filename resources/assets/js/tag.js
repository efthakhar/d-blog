//// tag delete 
$(".deleteRecord").click(function(){
    var parent = $(this).closest('tr')
   
   
    var id = $(this).attr("data-tag-id");
    var token = $("meta[name='csrf-token']").attr("content");
    var url = `/dashboard/tags/${id}`
    $.ajax({
  
        url: url,
        type: 'DELETE',
        data: {"id": id,"_token": token},

        success: function (){
          parent.css('display','none')
        }  
  
    });
  
  
});
  
// filter tag on serach input
let filtertagbtn = document.querySelector('.filtertag') 
let filtertagname = document.querySelector('.filtertaginput')

filtertagbtn.addEventListener('click',function(e){
    serachTag()
})  

filtertagname.addEventListener("keyup",function(e){

    if (e.key === "Enter")
    {
        serachTag()
    }

})  

function serachTag(){

    var url = new window.URL(document.location); 
    url.searchParams.set("q", filtertagname.value);
    url.searchParams.set("page", "1");

    window.history.replaceState(null, null, url.toString() );
    window.location.reload()
}