$(document).ready(function() {
    $('#search_input').on("keyup",function(){
      var word=$(this).val();
      $.ajax({
        url:"/search"   ,
        method:"GET", 
        data:{'word':word},
        success:function(data){
          // $('.result_search').html(data);
          console.log('Thành công');
        }
      });
    });
  });