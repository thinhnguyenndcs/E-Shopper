function checkSignup() { 
    var msg='';   
	var email= document.getElementById("email-signup").value;
    var pass= document.getElementById("password-signup").value;
    var name= document.getElementById("name-signup").value;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(name=='' || email=='' || pass==''){
        msg="*Blank input";
    }
    else if (name.length <2 || name.length >30){
        msg="*Name is too short or too long";
    }
    else if (!(email.match(validRegex))){
        msg="*Invalid email" ;   
    }
    else if (pass.length <2 || pass.length > 30){
        msg="*Password is too short or too long"    ;
    }
    //Front check
    if (msg==''){
        $.ajax({
            url: 'include/check-signup.php',
            type: 'POST',
            data: {
                email: document.getElementById("email-signup").value,
                password: document.getElementById("password-signup").value,
                name: document.getElementById("name-signup").value,
                phone: document.getElementById("phone-signup").value,
                
                address: document.getElementById("address-signup").value


            },
            success: function(response){  
                         		       
                handleMsg(response);		   
            }
         });	
    }
    else{
        document.getElementById("error-msg2").innerHTML = msg;
    }
}

function handleMsg(response){
    document.getElementById("error-msg2").innerHTML = response;
  }