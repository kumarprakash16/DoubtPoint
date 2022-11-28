$('#userEror').hide();
$('#contactEror').hide();
var usernameError=false;

$('#inputUsername').keyup(function(){
    validateInputUsername();
});


function validateInputUsername(){
    var usernameValue=$('#inputUsername').val();

    if(usernameValue.length<3||usernameValue.length>10){
        $('#userEror').show();
        return false;
    }
    else{
        $('#userEror').hide();
        return true;
    }
}    
$('#signUPSubmit').on("click",function(event){
    if(validateInputUsername()==false){
        event.preventDefault();
        return false;
    }
});    

$('#contact').keyup(function(){
    validateInputContact();
});

function validateInputContact(){
    var contactValue=$('#contact').val();

    if(contactValue.length!=10){
        $('#contactEror').show();
        return false;
    }
    else{
        $('#contactEror').hide();
        return true;
    }
}