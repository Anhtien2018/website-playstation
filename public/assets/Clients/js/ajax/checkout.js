$(document).ready(function(){
    $('#selectprovince').on('change',function() {
        var id=$(this).val();
        var communeOptions = '';
        $.ajax({
            url:'/getdistrict/'+id,
            method:"GET",
            dataType: 'json',
            success:function(data) {
                $('#resultdt').html(data.options);
            }
        });
    })
})