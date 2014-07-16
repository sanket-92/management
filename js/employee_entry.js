var _timer = 0;

function delay(data) {
    if (_timer)
        window.clearTimeout(_timer);
    _timer = window.setTimeout(function(){return;}, 500);
}
 document.getElementById("mybutton").onclick = function () {
     
        location.href = "logout.php";
    };
    
function emp_check(){
    delay();
    var x = document.getElementById("emp");
    x.value=x.value.replace(/\s/g, '');
    var filter = /^([0-9])+$/;    
    if(x.value == ''){
     show_image("img/miss.png",15,15,'Missing','emp-result');
    }
    else if (!filter.test(x.value)) {
    show_image("img/cross.jpeg",15,15,'wrong','emp-result');
    }
    else
    {        
        show_image("img/check.png",15,15,'Check','emp-result');
    }
    
}
function name_check(){
    delay();
    var x = document.getElementById("name");
    var filter = /^([a-zA-Z ])+$/;  
    if(x.value == ''){
     show_image("img/miss.png",15,15,'Missing','name-result');
    }
    else if (!filter.test(x.value)) {
    show_image("img/cross.jpeg",15,15,'wrong','name-result');
    }
    else
    {show_image("img/check.png",15,15,'correct','name-result');}
    
    
}
function age_check(){
   delay();
   var x = document.getElementById('age');
   x.value=x.value.replace(/\s/g, '');
   if(x.value == ''){
     show_image("img/miss.png",15,15,'Missing','age-result');
    }
    else if(x.value > 0 && x.value < 120){show_image("img/check.png",15,15,'correct','age-result');}
   else {show_image("img/cross.jpeg",15,15,'cross','age-result');}
   
   
}
function email_check(){
    delay();
    var x = document.getElementById("email");
    x.value=x.value.replace(/\s/g, '');
    
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(x.value == ''){
     show_image("img/miss.png",15,15,'Missing','email-result');
    }
    else if (!filter.test(x.value)) {
    show_image("img/cross.jpeg",15,15,'wrong','email-result');
    }
    else
    {show_image("img/check.png",15,15,'correct','email-result');}
        
}


	
function show_image(src, width, height, alt,data) {
    var img = document.createElement("img");
    img.src = src;
    img.width = width;
    img.height = height;
    img.alt = alt;
    var x=document.getElementById(data);
    var xChildren = x.childNodes;
    if(xChildren[0])
        x.replaceChild(img, xChildren[0]);
    else
        x.appendChild(img);
}

