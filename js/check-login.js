
function checkCookie() {
	document.getElementById("email").value = getCookie("member_name");
	document.getElementById("password").value = getCookie("member_pass");
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
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


function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}
function handleError(){
  var email=document.getElementById("email").value;
  var pass=document.getElementById("password").value;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (!(email.match(validRegex))){
    msg="*Invalid email" ;   
  }
  else if (pass.length <2 || pass.length > 30){
    msg="*Password is too short or too long"    ;
  }
  else{
    msg="*Invalid email or password"    ;
  }
  document.getElementById("error-msg").innerHTML = msg;
}
function checkLogin() {    
	$.ajax({
        url: 'include/check-login.php',
        type: 'POST',
        data: {
            email: document.getElementById("email").value,
            password: document.getElementById("password").value,
            remember: document.getElementById("remember").checked
        },
        success: function(response){
            console.log(response);
		    if (response.indexOf("Location:") != -1) {
		        var curDir = response.replaceAll("Location:", "");
			    location.replace(curDir);
		    } else {
                handleError();
		    }
        }
     });	
}
/*function checkLogin2() {    
	console.log(document.getElementById("remember").checked);    
	//deleteAllCookies();
	var data = new FormData();
    data.append("email", document.getElementById("email").value);
    data.append("password", document.getElementById("password").value);
	data.append("remember", document.getElementById("remember").checked);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "http://localhost/shop1/eshopper/login.php");
	xhr.send(data);
    xhr.onload = function() {
        // This is where you handle what to do with the response.
        // The actual data is found on this.responseText
        //table.insertAdjacentHTML("afterend", this.responseText); // Will alert: 42
		console.log(this.responseText);
		if (this.responseText.indexOf("Location:") != -1) {
		    var curDir = this.responseText.replaceAll("Location:", "");
			location.replace(curDir);
		} else {

			handleError();
		}		
	  };	
}*/