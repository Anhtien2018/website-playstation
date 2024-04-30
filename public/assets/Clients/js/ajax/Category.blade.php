<script>
   $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });


  $(document).ready(function() {
      $(document).on('click','.add_category',function(e) {
        e.preventDefault();
        let Name_category=$('#Name_category').val();
        $.ajax({
          url:"{{route('Category.Add_Category')}}",
          method:'post',
          data:{Name_category:Name_category},
          success:function(res){
            
          },error:function(err){
            let error= err.responseJSON; 
            $.each(error.errors,function (index,value  ) {
              $('.errMsg').append('<span class="text-danger" >'+value+ '</span>'+<br> )
            });
          }
    
        });
      })
  });
 </script>
 <span class="text-danger" ></span>
