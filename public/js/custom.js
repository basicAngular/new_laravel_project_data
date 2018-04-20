$(document).ready(function() {
    $('#role').on('change', function() {
        var id = $(this).val();
        var roleUrl = ('rolemenu');
        $.ajax({
            type:"GET",
            url: roleUrl + '/' + id,
            success:function(res){
                if(res){
                    $.each(res, function (key, value) {
                         
                    })
                    $("#roleMenu-data").append(JSON.stringify(res));
                    $("#roleMenudata").append(res);
                    $("#state").append('<option>Select</option>');
                    $("#city").append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+value+'">'+value+'</option>');
                    });
                }else{
                    $("#roleMenu-data").empty();
                }
            }
        });
    });
});
