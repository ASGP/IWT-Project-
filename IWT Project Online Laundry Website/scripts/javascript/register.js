$("#register-btn").click(function(){
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phonr").val();
    var password = $("#password").val();

    if(name == "" || email == "" || phone == "" || password == "") {
        alert("Fields can not be empty.");
    } else if(!ValidateEmail(email)){
        alert("Invalid email.");
    }else {
        $("#registerForm").submit();
    }
});

function ValidateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}