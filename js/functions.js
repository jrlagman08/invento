//--- Logout Redirect ---//
function logoutSuccessRedirect() {
    location.href = "login.php";
}

//--- Confirm Login ---//
function loginSuccessRedirect() {
    location.href = "index.php";
}

//--- Reset Password ---//
function resetSuccessRedirect() {
    infoNotif("Password reset sent to your email!");
    location.href = "login.php";
}

//--- Validate Email ---//
function validateEmail() {
    var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(document.getElementById("email").value.match(mailformat)) {
        document.getElementById("email").focus();
        return true;
    }
    else {
        errorNotif("Invalid email address.");
        document.getElementById("email").focus();
        throw new Error("Invalid email address.");
    }
}  

//--- Validate Email ---//
function validateEmailID(emailID) {
    var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(document.getElementById(emailID).value.match(mailformat)) {
        document.getElementById(emailID).focus();
        return true;
    }
    else {
        errorNotif("Invalid email address.");
        document.getElementById(emailID).focus();
        throw new Error("Invalid email address.");
    }
}

//--- Accept Number Only ---//
function onlyNumberKey(e) {
    // Only ASCII character in that range allowed
    var ASCIICode = (e.which) ? e.which : e.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

//--- Password Matching Validation ---//
function validatePassword(pword,cpword){ 
    if(pword != cpword) {   
        errorNotif("Passwords did not match");  
        document.getElementById("pword").focus();
        throw new Error("Passwords did not match");
    }
}

//--- Password Matching Validation on User Management ---//
function validatePassword(pwordupdate,cpwordupdate){ 
    if(pwordupdate != cpwordupdate) {   
        errorNotif("Passwords did not match");  
        document.getElementById("pwordupdate").focus();
        throw new Error("Passwords did not match");
    }
}

//--- Toast Notification with Reload ---//
function successNotif(msg) {
    toastr.success(msg);
    setTimeout(function(){
        window.location.reload();
     }, 1500);
}
function errorNotif(msg) {
    toastr.error(msg);
    setTimeout(function(){
        window.location.reload();
     }, 1500);
}
function infoNotif(msg) {
    toastr.info(msg);
    setTimeout(function(){
        window.location.reload();
     }, 1500);
}
function warningNotif(msg) {
    toastr.warning(msg);
    setTimeout(function(){
        window.location.reload();
     }, 1500);
}

//--- Toast Notification Static (No reload) ---//
function successNotifNoload(msg) {
    toastr.success(msg);
}
function errorNotifNoload(msg) {
    toastr.error(msg);
}
function infoNotifNoload(msg) {
    toastr.info(msg);
}
function warningNotifNoload(msg) {
    toastr.warning(msg);
}


//--- Clear form when closed ---//
function resetForm(btnID, formAdd) {
    const closeBtn = document.querySelector(btnID);
    closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const resetAddForm = document.querySelector(formAdd);
        resetAddForm.reset();
    });
}
