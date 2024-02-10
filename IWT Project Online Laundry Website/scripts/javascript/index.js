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


$("#order-btn").click(function(){
    var mass = $("#mass").val();
    var address = $("#address").val();
    var count = $("#count").val();

    if (!$('#laundry').is(":checked") && !$('#dry-c').is(":checked") && !$('#ironing').is(":checked"))
    {
      alert("Select service type.");
      return;
    }

    if (!$('#fabric').is(":checked") && !$('#silk').is(":checked") && !$('#cotton').is(":checked"))
    {
      alert("Select clothe type.");
      return;
    }

    if(mass == "" || address == "" || count == "") {
        alert("Fields can not be empty.");
        return;
    }

    if (!$('#pfh').is(":checked") && !$('#bts').is(":checked"))
    {
      alert("Select pickup type.");
      return;
    }

    if (!$('#dth').is(":checked") && !$('#pfs').is(":checked"))
    {
      alert("Select delivery method.");
      return;
    }

    $("#orderForm").submit();
})


$("#pfh").click(function(){
  $( "#bts" ).prop( "checked", false );
})

$("#bts").click(function(){
  $( "#pfh" ).prop( "checked", false );
})

$("#dth").click(function(){
  $( "#pfs" ).prop( "checked", false );
})

$("#pfs").click(function(){
  $( "#dth" ).prop( "checked", false );
})


$("#logout-btn").click(function(){
    document.cookie = "userEmail=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/laundry;";
    window.location.href = "../../laundry/login.php";
})