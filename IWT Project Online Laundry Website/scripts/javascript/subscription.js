var cookiesEmail = getCookie("userEmail");
if(cookiesEmail == "") {
    window.location.href = "../../laundry/login.php";
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) { 
        return c.substring(name.length, c.length);
      }
    }
    return "";
}


$("#logout-btn").click(function(){
    document.cookie = "userEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/laundry;";
    window.location.href = "../../laundry/login.php";
})