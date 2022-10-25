//// category delete 
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
  
// filter category on serach input
 let filtercatbtn = document.querySelector('.filtercat') 
 let filtercatname = document.querySelector('.filtercatinput')
 filtercatbtn.addEventListener('click',function(e){
    serachCat()
 })  
 filtercatname.addEventListener("keyup",function(e){
    if (e.key === "Enter") {
        serachCat()
      }
 })  



 function serachCat(){
    
    var url = new window.URL(document.location); 
    url.searchParams.set("q", filtercatname.value);
    url.searchParams.set("page", "1");
   
     window.history.replaceState(null, null, url.toString() );
     window.location.reload()
 }