// $(document).ready(function(){
//     $('#choose_province').on('change',function() {
//         var id=$(this).val();
//         $.ajax({
//             url:'/getdistrict/'+id,
//             method:"GET",
//             dataType: 'json',
//             success:function(data) {
//                 $.each(data, function(key, value) {
//                     $('.show_district').append('<option value="'+ value.matp +'">'+ value.name +'</option>');
//                 });
//             }
//         });
//     })
// })
$(document).ready(function(){
    $('#province').on('change',function(){
        var id=$(this).val();
        $.ajax({
        url:'/getdistrict',
                        method:"GET",
                        data:{'id':id},
                        dataType: 'json',
                        success:function(data) {
                            console.log(data);
                            $(".show").empty();
                            $.each(data, function(key, value) {
                                $(".show").append('<option value="'+ value.matp +'">'+ value.name +'</option>');
                            });
                        }
                    });
    })
})