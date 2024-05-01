$(window).on('hashchange',function() {
   if(window.location.hash){
    var page=window.location.hash.replace('#','');
    if(page==Number.NaN || page<=0){
        return false
    }    
        fetch_data(page);
   }

});
$(document).ready(function() {
    $('.pagination a').on('click', function(e) {
        e.preventDefault();
       // Xóa active class từ tất cả các liên kết phân trang
       $('.pagination a').removeClass('active');
       // Thêm active class cho liên kết phân trang được click
       $(this).addClass('active');
      var page= $(this).attr('href').split('page=')[1];
      fetch_data(page);
        });
});
    function fetch_data(page) {
        $.ajax({
            url:"/?page="+page,
            success:function(data){
             $('#resultpr').html(data);
             location.hash=page;       
            },error:function(err){
                console.log('Thất Bại');
            }
        });
    }
