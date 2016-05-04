var http = createRequestObject();
var areal = Math.random() + "";
var real = areal.substring(2,6);

function createRequestObject() {
	var xmlhttp;
	try { xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }
  catch(e) {
    try { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
    catch(f) { xmlhttp=null; }
  }
  if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
  	xmlhttp=new XMLHttpRequest();
  }
	return  xmlhttp;
}

function sendRequest() {
	var rnd = Math.random();

	var locations = document.getElementById("locations");
	var location = escape(locations.options[locations.selectedIndex].text);

	var services = document.getElementById("services");
	var service = escape(services.options[services.selectedIndex].text);

	var name = escape(document.getElementById("name").value);
	var phone = escape(document.getElementById("phone").value);
	var email = escape(document.getElementById("email").value);


	
	try{
    http.open('POST',  'http://www.lab211.com/howardmechanical/test/wp-content/themes/realto/realto/pform.php');
    http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = handleResponse;
	http.send('location='+location+'&service='+service+'&name='+name+'&phone='+phone+'&email='+email+'&rnd='+rnd);
	alert("HTTP SENT");
	}
	catch(e){alert("Big Problem" + location + service + name + phone + email);}
	finally{}
}

function check_values() {
	
	var valid = '';
	var locations = document.getElementById("locations");
	var location = locations.options[locations.selectedIndex].text;

	var services = document.getElementById("services");
	var service = services.options[services.selectedIndex].text;

	var name = document.getElementById("name").value;
	var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").value;
	
	if(trim(location) == "" ||
		trim(service) == "" ||
		trim(name) == "" ||
		trim(phone) == "" ||		
		trim(email) == "") {
			alert("Please complete all fields" + location + service + name + phone + email + "test");
	} else {
		if(isEmail(email)) {
			document.getElementById("submit").disabled=true;
			document.getElementById("submit").value='Please Wait..';
			sendRequest();
		} else {
			alert("Email appears to be invalid\nPlease check and try again");
			document.getElementById("email").focus();
			document.getElementById("email").select();
		}
	}
}

function handleResponse() {
	try{

    if((http.readyState == 4)&&(http.status == 200))
	{
    	var response = http.responseText;
        document.getElementById("submit").value = response;
    	document.getElementById("submit").disabled = false;
		
		setTimeout(function(){document.getElementById("submit").value = "Request Service";},3000);
	}
  }
	catch(e){}
	finally{}
}

function isUndefined(a) {
   return typeof a == 'undefined';
}

function trim(a) {
	return a.replace(/^s*(S*(s+S+)*)s*$/, "$1");
}

function isEmail(a) {
   return (a.indexOf(".") > 0) && (a.indexOf("@") > 0);
}
