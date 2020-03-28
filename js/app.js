$(document).ready(function(){
    $('#submit').on('click',function(e){
        e.preventDefault();

        var emailid = $('#emailid').val();
        var contact = $('#phone-no').val();
        $("#first-name, #emailid").each(function() {
            if ($.trim($(this).val()) == '') {
               alert('Fields cannot be empty');
               return false;
            }
        });
        console.log(isEmail(emailid));
        if(!isEmail(emailid)){
            alert('Email is not valid');
            return false;
        }
        if(!isPhone(contact)){
            alert('Phone number is not valid');
            return false;
        }
        ajax_call('submit_form')
    });
});