// $(document).ready(function() {
//   $('.result_search').hide()
//     $('#search_input').on("keyup",function(){
//       var word=$(this).val();
//       if(word==""){
//         $('.result_search').hide();
//       }else{
//         $('.result_search').show();
//       }
//       $.ajax({
//         url:"/search_pr",
//         method:"GET", 
//         data:{'word':word},
//         success:function(data){
//           var html='';
//           console.log(data);
//           data.forEach(element => {
//             var productSlug = createSlug(element.Name_product);
//             html+=`
//             <a href="/chi-tiet/${element.id}-${productSlug}">
//               <div class="product_search d-flex align-items-center justify-content-center justify-content-evenly " >
//                 <div class="image_product_search me-2">
//                   <img style="width: 60px; border-radius: 50%" src="/assets/Clients/Image/product/${element.Image_product}" alt="">
//                 </div>
//                 <div class="name_product_search me-2">
//                   <span><strong class="text-black">${element.Name_product}</strong></span>
//                 </div>
//                 <div class="price_product_search">  
//                   <span class="me-1"><strong class="text-black">${element.Reduced_product}</strong></span>
//                   <span><del class="text-black" style="font-size: 14px">${element.Cost_product}</del></span>
//                 </div>
//                </div>
//              </a>
//               `
//           });
//           $('.result_search').html(html);
//         }
//       });
//     });
    
//   });
  // function createSlug(str) {
  //   str = str.replace(/^\s+|\s+$/g, ''); // Loại bỏ khoảng trắng ở đầu và cuối chuỗi
  //   str = str.toLowerCase(); // Chuyển đổi sang chữ thường
  //   str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); // Loại bỏ các dấu thanh từ các ký tự tiếng Việt
  //   str = str.replace(/[^a-z0-9 -]/g, '') // Loại bỏ các ký tự không phải chữ cái, số, khoảng trắng hoặc dấu gạch ngang
  //            .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu gạch ngang
  //            .replace(/-+/g, '-'); // Loại bỏ các dấu gạch ngang liên tiếp

  //   return str;
   

  // }
  $(document).ready(function() {
    $('#selectnamepricesearch, #selectlimitsearch').on('change',function(e) {
      e.preventDefault();
         var selectnamepricesearch=$('#selectnamepricesearch').val();
         var word=$('#selectnamepricesearch, #selectlimitsearch').data('word');
         console.log(word);
         var selectlimitsearch=$('#selectlimitsearch').val();
      $.ajax({
         url:"/search_pr1",
         method:'GET',
         data:{'selectnamepricesearch':selectnamepricesearch,'word':word, 'selectlimitsearch':selectlimitsearch},
         success:function(data){
             $('#resultpr').html(data); 
             
           }
      });
    }) ;
 });