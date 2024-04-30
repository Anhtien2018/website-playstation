$(document).ready(function() {
   $('#selectnameprice, #selectlimit').on('change',function() {
        var selectnameprice=$('#selectnameprice').val();
        var id=$('#selectnameprice, #selectlimit').data('id');
        var selectlimit=$('#selectlimit').val();
     $.ajax({
        url:'/filter_productbycategory',
        method:'GET',
        data:{'selectnameprice':selectnameprice,'id':id, 'selectlimit':selectlimit},
        success:function(data){
            $('#productbycategoryresult').html(data);
            // alert('thành công')
          }
     });
   }) ;
   // $('#selectlimit').on('change',function() {
   //      var id=$(this).data('id');
   //      var selectlimit=$(this).val();
   //       $.ajax({
   //          url:'/filter_productbycategory',
   //          method:'GET',
   //          data:{'selectlimit':selectlimit,'id':id},
   //          success:function(data){
   //              $('#productbycategoryresult').html(data);
   //            }
   //       });
   // })
  
});