$(document).ready(function() {
    $('#search_input').on("keyup",function(){
      var word=$(this).val();
      if(word.trim()==""){
        $('.result_search').html('');
      }else{

      
      $.ajax({
        url:"/search_pr",
        method:"GET", 
        data:{'word':word},
        success:function(data){
          $('.result_search').html(data);
          console.log('Thành công');
        }
      });
    }
    });
    
  });