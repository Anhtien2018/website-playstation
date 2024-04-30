$(document).ready(function() {
    $('#id').on('change',function() {
        var id=$(this).val();
        $.ajax({
            url:"/filter_product",
            method:"GET", 
            data:{'id':id},
            success:function(data){
              $('#body_table').html(data);
            }
          });
    })
})