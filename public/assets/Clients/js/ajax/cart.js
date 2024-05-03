
//  delete product by id 
$(document).ready(function() {
    $('.btndelete').on('click', function() {
    var id = $(this).data('id');
    if(confirm("Bạn có muốn xóa sản phẩm này không ?")){
      $.ajax({
        url:"/Cart/remove/"+id,
        method:"GET", 
        success:function(data){
          window.location.reload(); 
        }
      });
    } 
  })
})
$('.delete-all').on('click',function(){
  if(confirm('Bạn có muốn xóa hết giỏ hàng')){
    $.ajax({
      url:"/Cart/removeall",
      method:"GET", 
      success:function(data){
        window.location.reload(); 
      }
    });
  }
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
$(document).ready(function() {
  $('.inputquan').on('blur'   ,function(){
    var quan=$(this).val();
    var id=$(this).data('id');
    // console.log(id);
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
  });
});


