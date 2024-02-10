$("#login-btn").click(function(){
    var email = $("#email").val();
    var password = $("#password").val();

    if(email == "" || password == "" ) {
        alert("Fields can not be empty.");
    } else if(!ValidateEmail(email)){
        alert("Invalid email.");
    } else {
        $("#loginForm").submit();
    }
})


function ValidateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}