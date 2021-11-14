$('#change-password').change(function() {
    let status = !$(this).is(":checked")
    showChange(status)
})

$("#btn-reset-edit-user").click(function(){
    showChange(true);
})

function showChange(status){
    $('#password').attr('readonly',status)
    $('#password-confirm').attr('readonly',status)

    $('#password').val("")
    $('#password-confirm').val("")
}
$(".btn-del-confirm").click(function(){
    let url = $(this).data('url')
    if(!confirm('Bạn có chắc xóa tài khoản không?')){
        return;
    }else{
        window.location.href=url;
    }
})