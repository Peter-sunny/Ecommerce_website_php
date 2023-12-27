function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}

function notif(form,text,link) {
    // Create a new element input, this will be our hashed password field. 
    if (text.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    if(link.value == ''){
        link.value = '#';
    }
    form.submit();
    return true;
}

function notific(form,ev_id,text) {
    // Create a new element input, this will be our hashed password field. 
    if (text.value == '' || ev_id.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    form.submit();
    return true;
}

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
 
function regformhash(form, branch,category,username, email, type, pin, phone_number, password, conf) {
    //alert(pin.value);
    // Check each field has a value
    if (email.value == ''     ||
        password.value == ''  ||
        phone_number.value == '' ||
        pin.value == '' ||
        category.value == '' ||
        branch.value == '' ||
        conf.value == '') {

        alert('You must provide all the requested details. Please try again');
        return false;
    }

    // Check the username

    re = /^\w+$/;
    if(!re.test(form.username.value)) {
        alert("Username must contain only letters, numbers and underscores. Please try again");
        form.username.focus();
        return false;
    }

     if( !isValidEmailAddress( email.value ) ){
        alert('Please provide a valid email address. Please try again');
        return false;
        }

    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
    if (phone_number.value.length != 10) {
        alert('Please provide a valid Phone Number');
        form.phone_number.focus();
        return false;
    }

    // At least one number, one lowercase and one uppercase letter
    // At least six characters

    // var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    // if (!re.test(password.value)) {
    //     alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
    //     return false;
    // }

    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }

    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent.
    password.value = "";
    conf.value = "";

    // Finally submit the form.
    //form.submit();
    var dataString = 'username='+ username.value + '&email='+ email.value + '&pin='+ pin.value + '&phone_number='+ phone_number.value + '&p='+ p.value +'&type='+ type.value+'&category='+ category.value+'&branch='+ branch.value;
    // alert(dataString);
    $.ajax({
        type: "POST",
        url: "member_add.php",
        data: dataString,
        cache: false,
        success: function(result){
            if(result=="success"){
            alert(result);
            window.location.reload();
            $(this).closest('form').find("input[type=text],input[type=email],input[type=tel], textarea").val("");
            }
            else alert(result);
        }
    });
    return false;
}
function upformhash(form, branch, category,iid,username, email, type, pin, phone_number, password, conf) {
    //alert(pin.value);
    // Check each field has a value
    if (email.value == ''     ||
        password.value == ''  ||
        phone_number.value == '' ||
        branch.value == '' ||
        category.value == '' ||
        pin.value == '' ||
        iid.value == '' ||
        type.value == '' ||
        conf.value == '') {

        alert('You must provide all the requested details. Please try again');
        return false;
    }

    // Check the username

    re = /^\w+$/;
    if(!re.test(form.username.value)) {
        alert("Username must contain only letters, numbers and underscores. Please try again");
        form.username.focus();
        return false;
    }

    if( !isValidEmailAddress( email.value ) ){
        alert('Please provide a valid email address. Please try again');
        return false;
        }

    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
    if (phone_number.value.length != 10) {
        alert('Please provide a valid Phone Number');
        form.phone_number.focus();
        return false;
    }

    // At least one number, one lowercase and one uppercase letter
    // At least six characters

    // var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    // if (!re.test(password.value)) {
    //     alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
    //     return false;
    // }

    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }

    // Create a new element input, this will be our hashed password field.
    var p = document.createElement("input");

    // Add the new element to our form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);

    // Make sure the plaintext password doesn't get sent.
    password.value = "";
    conf.value = "";

    // Finally submit the form.
    //form.submit();
    var dataString = 'iid='+iid.value+'&username='+ username.value + '&email='+ email.value + '&pin='+ pin.value + '&phone_number='+ phone_number.value + '&p='+ p.value +'&type='+ type.value+'&branch='+ branch.value+'&category='+ category.value;
    // alert(dataString);
    $.ajax({
        type: "POST",
        url: "member_up.php",
        data: dataString,
        cache: false,
        success: function(result){
            if(result=="success"){
            alert(result);
            window.location.reload();
            $(this).closest('form').find("input[type=text],input[type=email],input[type=tel], textarea").val("");
            }
            else alert(result);
        }
    });
    return true;
}