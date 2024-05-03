$(document).ready(function() {
    $('#province').on('change',function() {
    var matp=$(this).val();
        $.ajax({
            url:"/getdistrict",
            method:"GET",
            data:{'matp':matp},
            success:function(data){
                var html='<option value="">Chọn</option>';
              $.each(data,function(index,district) {
                html+='<option value="">'+district.name+'</option>'
              })
                $('#result').html(html);
              
            }
        });
})
})