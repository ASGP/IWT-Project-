var cookiesEmail = getCookie("email");
var cookiesUser = getCookie("user");
if(cookiesEmail == "" || cookiesUser != "admin") {
    //window.location.href = "../../login.html";
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

//user logout function
function UserLogout() {
    auth.signOut()
    .then(()=>{
        document.cookie = "userType=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "./index.html";
    })
    .catch((error) => {
        alert(error.message);
    });
}

$(document).ready(function () {
    $("#add-notice-btn").click(function () {
        $("#notice-add-container").css("display", "block");
    });
});

$(document).ready(function () {
    $("#add-notice-cancel-btn").click(function () {
        $("#notice-add-container").css("display", "none");
    });
});


var URL1 = 'http://127.0.0.1/pharmaceutical-firms-api/api/get-notice.php'; //Main API
var URL2 = 'http://127.0.0.1/pharmaceutical-firms-backup-api/api/get-notice.php'; //Backup API

const noticeList = document.getElementById('notice-list-container')

GetNoticesURLChecking();

function GetNoticesURLChecking() 
{
    fetch(URL1,{method:'GET'})
    .then(function(resp) {
        //URL working
        GetNoticesURLResponseChecking(URL1);
    })
    .catch(function(err) {
        //URL not working
        GetNoticesURLResponseChecking(URL2);
    });
}


function GetNoticesURLResponseChecking(URL) 
{
    var request = new XMLHttpRequest()
    request.open('GET', URL, true)
    request.onload = function() 
    {
        var data = JSON.parse(this.response)

        if(request.status >=200 && request.status < 400) 
        {
            //Responsiveed
            GetNotices(URL);
        } 
        else 
        {
            //Not responsive
            GetNotices(URL2);
        }
    }
request.send()
}

function GetNotices(URL) 
{
    var request = new XMLHttpRequest()
    request.open('GET', URL, true)
    request.onload = function() 
    {
        var data = JSON.parse(this.response)

        if(request.status >=200 && request.status < 400) 
        {
            data.forEach(notice => {

                const noticeCard = document.createElement('div')
                noticeCard.setAttribute('class', 'notice-card')

                const title = document.createElement('h1')
                title.textContent = notice.title;

                const des = document.createElement('p')
                des.textContent = notice.des;

                const date = document.createElement('h5')
                date.textContent = notice.date;
    
                noticeCard.appendChild(title)
                noticeCard.appendChild(des)
                noticeCard.appendChild(date)
                noticeList.appendChild(noticeCard)
        
            })
        } 
        else 
        {
            console.log('error')
        }
    }
request.send()
}



var URL3 = 'http://127.0.0.1/pharmaceutical-firms-api/api/add-notice.php'; //Main API
var URL4 = 'http://127.0.0.1/pharmaceutical-firms-backup-api/api/add-notice.php'; //Backup API

var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;

$("#add-notice-save-btn").click(function(){
    var title = $("#notice-title").val();
    var des = $("#notice-des").val();

  if(title == "" || des == "") {
      alert("Fields can not be empty.");
  } else {
      AddNoticeURLChecking(URL3);
  }
});

function AddNoticeURLChecking(URL) 
{
  fetch(URL,{method:'POST'})
  .then(function(resp) {
      //URL working
      AddNoticeUrlResponseChecking(URL3);
  })
  .catch(function(err) {
      //URL not working
      AddNoticeUrlResponseChecking(URL4);
  });
}

function AddNoticeUrlResponseChecking(URL) 
{
  var request = new XMLHttpRequest()
  request.open('POST', URL, true)
  request.onload = function() 
  {
      if(request.status >=200 && request.status < 400) 
      {
        AddNotice(URL);
      } 
      else 
      {
        AddNotice(URL4);
      }
  }
request.send()
}

function AddNotice(URL) 
{
    var title = $("#notice-title").val();
    var des = $("#notice-des").val();

  fetch(URL,{
      method:'POST',
      headers: {
          'Accept':'application/json, text/plain, */*',
          'Content-type':'application/json'
      },
      body:JSON.stringify({
          title: title,
          des: des,
          date: dateTime
      })
  })
  .then((res) => res.json())
  .then((data) => {
      console.log(data)
      const result = JSON.stringify(data.message);
      if(result === "\"Added Succesfully\"") {
        $("#notice-add-container").css("display", "none");
        alert(result);
        location.reload();
    } else {
        alert(result);
    }
  })
}

$("#logout-btn").click(function(){
    document.cookie = "email=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.href = "../../login.html";
})

