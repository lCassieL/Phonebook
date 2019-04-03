function addPhoneField(){
    var pcount = document.getElementById('pcount');
    var delPhone = document.getElementById('disablePhone');    
    var newPhoneField = document.createElement('div');
    newPhoneField.innerHTML = "<input type='checkbox' name='_pubp"+pcount.value+"' value='yes'>"+
    "<input type='text' name='p"+pcount.value+"'>";
    pcount.value++;
    var phones = document.getElementById('phones');
    phones.insertBefore(newPhoneField, delPhone);
}

function addEmailField(){
    var pcount = document.getElementById('ecount');
    var delEmail = document.getElementById('disableEmail');    
    var newEmailField = document.createElement('div');
    newEmailField.innerHTML = "<input type='checkbox' name='_pube"+ecount.value+"' value='yes'>"+
    "<input type='text' name='e"+ecount.value+"'>";
    ecount.value++;
    var emails = document.getElementById('emails');
    emails.insertBefore(newEmailField, delEmail);
}

function displayInform(link,number){
    // if(document.getElementsByClassName('c'+number)[0].style.display == "grid"){
    //     document.getElementsByClassName('c'+number)[0].style.display = "none";
    //     link.innerHTML = 'View details';    
       
    // } else{
    //     document.getElementsByClassName('c'+number)[0].style.display = "grid";
    //     link.innerHTML = 'Hide details';
         
    // }
    var details = document.getElementsByClassName('c'+number)[0];
    if(details.classList.contains('userInformDisplayNone')){
        details.classList.remove('userInformDisplayNone');
        details.classList.add('userInform');
        link.innerHtml = 'View details';
    } else{
        details.classList.remove('userInform');
        details.classList.add('userInformDisplayNone');
        link.innerHtml = 'Hide details';
    }
}