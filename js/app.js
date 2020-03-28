$(document).ready(function(){
    $('#submit').on('click',function(e){
        e.preventDefault();
        var emptyfields;
        var emailid = $('#emailid').val();
        var contact = $('#phone-no').val();
        $("#first-name, #emailid").each(function() {
            if ($.trim($(this).val()) == '') {
               emptyfields =1;
               return false;
            }
        });
        if(emptyfields){
            showError('First name and EmailId cannot be empty');
            return false;
        }
        
        
        if(!isEmail(emailid)){
            showError('Email is not valid');
            return false;
        }
        if(!isPhone(contact)){
            showError('Phone number is not valid');
            return false;
        }
        ajax_call('submit_form');
    });
});