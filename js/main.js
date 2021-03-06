var mainIndex = document.getElementsByClassName('mainIndex');
var mainLogin = document.getElementsByClassName('mainLogin');
var mainContact = document.getElementsByClassName('mainContact');
console.log(mainIndex[0]);
console.log(mainLogin[0]);
console.log(mainContact[0]);
mainIndex[0].onclick = function(){
    alert('mainIndex');
};
mainLogin[0].onclick = function(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', location.origin + '/main/login');
    xhr.onreadystatechange = function () {
        // if (xhr.readyState === 4 && xhr.status === 200) {
        //     var json = xhr.responseText;
        //     var articles = JSON.parse(json);
        //     if (articles) {
        //         showArticles(articles);
        //     }
        // }
    };
    xhr.send();
};
// mainContact[0].onclick = function(){
//     alert('mainContact');
// };

function addPhoneField(){
    var pcount = document.getElementById('pcount');
    var delPhone = document.getElementById('disablePhone');    
    var newPhoneField = document.createElement('div');
    newPhoneField.innerHTML = "<input type='checkbox' name='_pubp"+pcount.value+"' value='yes'>"+
    "<input type='tel' name='p"+pcount.value+"' pattern='[\+][0-9]{12}'>";
    pcount.value++;
    var phones = document.getElementsByClassName('myphones')[0];
    phones.insertBefore(newPhoneField, delPhone);
}

function addEmailField(){
    var pcount = document.getElementById('ecount');
    var delEmail = document.getElementById('disableEmail');    
    var newEmailField = document.createElement('div');
    newEmailField.innerHTML = "<input type='checkbox' name='_pube"+ecount.value+"' value='yes'>"+
    "<input type='email' name='e"+ecount.value+"' pattern='^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$'>";
    ecount.value++;
    var emails = document.getElementsByClassName('myemails')[0];
    emails.insertBefore(newEmailField, delEmail);
}

function displayInform(link,number,id){
    var details = document.getElementsByClassName('c'+number)[0];
    if(details.classList.contains('userInformDisplayNone')){
        
        var xhr = new XMLHttpRequest();
        var body = 'id=' + encodeURIComponent(id);
        xhr.open('POST', location.origin + '/main/ajaxInf', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var json = xhr.responseText;
            var allInform = JSON.parse(json);
            if (allInform) {
                var contact = allInform[0];
                var emails = allInform[1];
                var phones = allInform[2];
                innerInform(details, contact, phones, emails);
                link.innerHTML = 'Hide details';
                details.classList.remove('userInformDisplayNone');
                details.classList.add('userInform');
            }
        }
        };
        xhr.send(body);

    } else{
        link.innerHTML = 'View details';
        details.classList.remove('userInform');
        details.classList.add('userInformDisplayNone');
    }
}

function innerInform(details, contact, phones, emails){
    console.log(contact);
    console.log(phones);
    console.log(emails);
    var str = "<div class='address'>"+
              "<h5>ADDRESS</h5>"+
              "<div>"+contact[0]['address']+"</div>"+
              "<div>"+contact[0]['city']+"</div>"+
              "<div>"+contact[0]['country']+"</div>"+
              "</div>";
    str+="<div class='phones'>";
    str+="<h5>PHONE NUMBERS</h5>";
    phones.forEach(function(phone, index, phones){
        if(phone['publish'] === 'yes'){
            str+="<div>"+phone['phone']+"</div>";
        }
    });
    str+="</div>";

    str+="<div class='emails'>";
    str+="<h5>EMAILS</h5>";
    emails.forEach(function(email, index, emails){
        if(email['publish'] === 'yes'){
            str+="<div>"+email['email']+"</div>";
        }
    });
    str+="</div>";
    details.innerHTML = str;
}