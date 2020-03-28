function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function isPhone(contact) {
    var regex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
    return regex.test(contact);
}

function ajax_call(fn_name){
    var data = $('#signup-form').serialize();
    console.log(data);
    $.ajax({ 
        type      : 'POST',
        url       : './app/functions.php?action='+fn_name,
        data      : data,
        success   : function(res) {
            alert(res);
        }
    });
}