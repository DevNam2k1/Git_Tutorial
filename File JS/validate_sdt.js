$(document).ready(function() {
    $('body').on('click','.checkmobile', function() {
    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var mobile = $('#mobile').val();
    if(mobile !==''){
        if (vnf_regex.test(mobile) == false) 
        {
            alert('Số điện thoại của bạn không đúng định dạng!');
        }else{
            alert('Số điện thoại của bạn hợp lệ!');
        }
    }else{
        alert('Bạn chưa điền số điện thoại!');
    }
    });
});