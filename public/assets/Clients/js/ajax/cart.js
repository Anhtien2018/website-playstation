
//  delete product by id 
$(document).ready(function() {
    $('.btndelete').on('click', function() {
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        url:"/Cart/remove/"+id,
        method:"GET", 
        success:function(data){
          // window.location.reload();
          $('#result_cart').html(data);
        }
      });
    })
})
// change quantity cart
function changequantityhight(id) {
  $.ajax({
    url:"/Cart/changequantityhight",
    method:"GET",
    data:{'id':id},
    success:function(data) {
      window.location.reload();
    }
  })
}
  function changequantitylow(id) {
    $.ajax({
      url:"/Cart/changequantitylow",
      method:"GET",
      data:{'id':id},
      success:function(data) {
        window.location.reload();
      }
    })
  // change onkeyup
  
}
function writequantity(id) {
var quan=document.getElementById('quantity').value;
  if(parseInt(quan)==0){
    $.ajax({
      url:"/Cart/remove/"+id,
      method:"GET", 
      success:function(response){
        window.location.reload();
      }
    });
  }else{
    $.ajax({
      url:"/Cart/changequantitywrite",
      method:"GET",
      data:{'id':id, 'quan':quan},
      success:function(data) {
        window.location.reload();
      }
    })
  }
}
