$(document).ready(function(){
    $('#submit').on('click',function(e){
        e.preventDefault();

        var emailid = $('#emailid').val();
        var contact = $('#phone-no').val();
        $("#first-name, #last-name, #emailid, #phone-no").each(function() {
            if ($(this).val() == '') {
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
        alert('Submitted');
    });
});