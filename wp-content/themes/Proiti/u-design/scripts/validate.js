 var reqd = new Array ( "FirstName", "LastName", "DateofBirth", "Email", "MobileNumber", "CurrentCity", "status", "HomeCity", "YearStd10", "SchoolStd10", "PostGradCollege", "GradCollege", "SchoolStd12", "collintern[0]", "collintern[1]", "CV");
 
function form_load()
{
var i;
var cities = new Array("Ankleshwar","Asansol","Aurangabad","Bardhaman","Bareilly","Bathinda","Belgaum","Bellary","Bengaluru/Bangalore","Bhagalpur","Bharuch","Bhavnagar","Bhillai","Bhopal","Bhubaneshwar","Bhuj","Bidar","Bilaspur","Bokaro","Calicut","Chandigarh","Chennai","Cochin","Coimbatore","Cuddalore","Cuttack","Dadra&amp;NagarHaveli-Silvassa","Dalhousie","Daman&amp;Diu","Darjeeling","Dehradun","Delhi","Dhanbad","Dharmasala","Dharwad","Dimapur","Durgapur","Ernakulam","Erode","Faizabad","Faridabad","Gandhinagar","Gangtok","Ghaziabad","Gir","Gorakhpur","Gulbarga","Guntakal","Guntur","Gurgaon","Guwahati","Gwalior","Haldia","Hisar","Hosur","Howrah","Hubli","Hyderabad/Secunderabad","Imphal","Indore","Itanagar","Jabalpur","Jaipur","Jaisalmer","Jalandhar","Jalgaon","Jammu","Jamnagar","Jamshedpur","Jodhpur","Kakinada","Kalimpong","Kandla","Kannur","Kanpur","Kharagpur","Kharagpur","Kochi","Kolar","Kolhapur","Kolkata","Kolkata","Kollam","Kota","Kottayam","Kozhikode","Kulu/Manali","Kurnool","Kurukshetra","Lucknow","Ludhiana","Madurai","Mangalore","Mathura","Meerut","Mohali","Moradabad","Mumbai","MumbaiSuburbs","Mysoru/Mysore","Nagercoil","Nagpur","Nasik","NaviMumbai","Nellore","Nizamabad","Noida","Ooty","Palakkad","Palghat","Panipat","Panjim/Panaji","Paradeep","Pathankot","Patiala","Patna","Pondicherry","Porbandar","Pune","Puri","Raipur","Rajkot","Ranchi","Rohtak","Roorkee","Rourkela","Salem","Shillong","Shimla","Silchar","Siliguri","Solapur","Srinagar","Surat","Thanjavur","Thrissur","Tirunalveli","Tirupati","Trichy","Trivandrum","Tuticorin","Udaipur","Ujjain","Vadodara/Baroda","Valsad","Vapi","Varanasi/Banaras","VascoDaGama","Vellore","Vijayawada","Visakhapatnam","Warangal");

for (i = 0; i <cities.length; i++)
{	
	document.getElementById('Current City').innerHTML += '<option value=' + cities[i] + '>' + cities[i] + '</option>';
	document.getElementById('Home City').innerHTML += '<option value=' + cities[i] + '>' + cities[i] + '</option>';
}

}

// Checkbox function for address
function copy_address(thisCheck){
	
	var cadd = document.getElementsByClassName("Cadd");
	var padd = document.getElementsByClassName("Padd");
		
	var len_c = cadd.length;
	if (thisCheck.checked == true)
	{			
		for(i = 0; i < len_c; i++)
		{			
			if (cadd[i].id == 'Current City')
				padd[i].options[cadd[i].selectedIndex].selected = true;
			else
				padd[i].value = cadd[i].value;
		} 
	}
	else
	{
		for(i = 0;i <len_c; i++)
			padd[i].value = "";
		
		padd[0].focus();
	}
}
// field validation
function validate_form(thisForm) 
{
	//Reset Errors
	var nDiv = document.getElementsByTagName('form')[0].getElementsByTagName('div');
	var i;
	
	for (i=0; i<nDiv.length; i++)
	{
		nDiv[i].innerHTML = "";
		nDiv[i].style.display = "none";
	}
			
	var error = "";
	
	// First Name validation
	error += validate_reqd(thisForm.FirstName);
	error += validate_len(thisForm.FirstName, 1, 15);	
	error += isText(thisForm.FirstName);
	
	// Middle Name
	error += validate_len(thisForm.MiddleName,0,15);
	
	// Last Name
	error += validate_reqd(thisForm.LastName);
	error += validate_len(thisForm.LastName, 1, 15);
	error += isText(thisForm.LastName);
	
	// DOB
	error += validate_reqd(thisForm.DateofBirth);
	
	// Email Address
	error += validate_reqd(thisForm.Email);
	error += validate_len(thisForm.Email, 5, 30);
	error += validate_email(thisForm.Email);
	
	// Mobile Number
	error += validate_reqd(thisForm.MobileNumber);
	error += isNumeric(thisForm.MobileNumber);	
	error += validate_len(thisForm.MobileNumber, 10, 20);
	
	// Address Line 1
	error += validate_len(thisForm.caddress1, 0, 60);
	
	// Address Line 2 
	error += validate_len(thisForm.caddress2, 0, 60);
	
	// Current City
	error += validate_reqd(thisForm.CurrentCity);
	
	// State
	error += isText(thisForm.cstate);
	error += validate_len(thisForm.cstate, 0, 30);
	
	// Pin Code
	error += isNumeric(thisForm.cpin);
	error += validate_len(thisForm.cpin, 5, 10);
	
// Permanent Address Validation	
	if(thisForm.check.checked == false)
	{
			// Address Line 1
		error += validate_len(thisForm.paddress1, 0, 60);
			// Address Line 2 
		error += validate_len(thisForm.paddress2, 0, 60);
			// Current City
		error += validate_reqd(thisForm.HomeCity);
			// State
		error += isText(thisForm.pstate);
		error += validate_len(thisForm.pstate, 0, 30);
			// Pin Code
		error += isNumeric(thisForm.ppin);
		error += validate_len(thisForm.ppin, 5, 10);
	}
	
// Educational Qualification

	// Current Status
	error += validate_reqd(thisForm.status);
	
	//  Year Of Completion 10th
	error += validate_reqd(thisForm.YearStd10);
	error += isNumeric(thisForm.YearStd10);
	error += validate_len(thisForm.YearStd10, 4, 4);
	// School 10th
	error += validate_reqd(thisForm.SchoolStd10);
	
	// validation on basis of educational status selection
	var sel = document.getElementById('Qualification Status'); 
	var char = sel.options[sel.selectedIndex].value;
	switch(char)
	{
		case '5': 
		{
			// Post Graduation Degree
			//error += isText(thisForm.PostGraduation);
			error += validate_len(thisForm.PostGraduation, 2, 30);
			// Year of Completing Post Grad
			error += isNumeric(thisForm.YearPostGraduation);
			error += validate_len(thisForm.YearPostGraduation, 4, 4);
			// College
			error += validate_reqd(thisForm.PostGradCollege);
		}
		case '4': 
		case '3': 
		{
			// Graduation Degree
			//error += isText(thisForm.Graduation);
			error += validate_len(thisForm.Graduation, 2, 30);
			// Year of Completing Grad
			error += isNumeric(thisForm.YearGraduation);
			error += validate_len(thisForm.YearGraduation, 4, 4);
			// College
			error += validate_reqd(thisForm.GradCollege);
		}
		case '2': 
		case '1': 
		{
			// Year Of Completion 12th
			error += isNumeric(thisForm.YearStd12);
			error += validate_len(thisForm.YearStd12, 4, 4);
			// School 12th
			error += validate_reqd(thisForm.SchoolStd12);
		}
		default: break;
	}
	
	// Time period of internship
	error += validate_reqd(thisForm.DurationOfInternship);
	
	// Work Ex Numeric
	error += isNumeric(thisForm.workex);
	error += validate_len(thisForm.workex, 1, 2);
	
	// Internship as part of your curriculum
	
	if(thisForm.collintern[0].value == "" && thisForm.collintern[1].value == null)
		error += error_result(thisForm.collintern[0], "Please enter a valid Purpose of Internship.");
	
	// CV reqd field
	error += validate_file(thisForm.CV);
	
	alert('There is some error in your application form. Please review and Submit again.');
	if ((error == "") || (error == null))
		return true;
	else 
		return false;
}
	
// required fields validation
function validate_reqd(thisElement)
{
	var error = "";
	 
	if (thisElement.value==null||thisElement.value=="")
	{
	error = error_result(thisElement, "Please enter a Valid "+thisElement.id + "");
	//setTimeout("thisElement.focus();", 1000);
	//setTimeout("thisElement.select();",1000);
	}
	return error; 
}


// email format verification
function validate_email(thisElement)
{
	var error="";
	var mString = thisElement.value;
	var regexp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+$/; 
	
	if(regexp.test(mString))
		error = "";
	else
		 error = error_result(thisElement, "Please enter a Valid Email ID.");
	return error;
	
}

// validate the file extension
function validate_file(thisElement)
{
	var error = "";
	var fileName = thisElement.value;
	if (fileName != "")
	{
		var arr = fileName.split('.');
		var l = arr.length;
		if ( (arr[l-1] != "doc") && (arr[l-1] != "docx") && (arr[l-1] != "txt") && (arr[l-1] != "pdf") )
			error = error_result(thisElement, "Please upload .doc .docx .pdf or .txt files only.");
	}
	else
		error = error_result(thisElement, "Please upload .doc .docx .pdf or .txt files only.");		
	return error;	
}

// validate against the minimum and maximum length of the field allowed	
function validate_len(thisElement, minm, maxm)
{
	var error = "";
	if ((thisElement.value == "") || (thisElement.value == null) )
		return error;

	var len = thisElement.value.length;
		
	if( len < minm || len > maxm)
		var error = error_result(thisElement, "" + thisElement.id + " value out of length bound.");					
	
	return error;
}
	

// text, brackets and dots only validation
function isText(thisElement)
{
	var error = "";
	var mString = thisElement.value;
	var alphaExp = /^[a-zA-Z().]+$/;
	
	if ((thisElement.value == "") || (thisElement.value == null) )
		return error;
		
	if(alphaExp.test(mString))
		error = "";
	else
		error = error_result(thisElement, "Please enter a Text Only " + thisElement.id + " value.");
	
	return error;	
}
	
// numeric validation  
function isNumeric(thisElement)
{	
	var error = "";
	var strValidChars = "0123456789";
	var strChar;
	var mString = thisElement.value;
   
   if ((thisElement.value == "") || (thisElement.value == null) )
		return error;
    
   for (i = 0; i < mString.length; i++)
   {
      strChar = mString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
    	{
		error = error_result(thisElement, "Please enter a valid " + thisElement.id + ".");
	      break;   
	}
   }

   return error;
}
	
// error action : background color and message
function error_result(thisElement, message)
{
	thisElement.style.background='#FCF';
	
	switch(thisElement.className)
	{
		case "PI" : {error_display('1', message); break;} 
		case "CI": {error_display('2', message); break;}
		case "Cadd": { error_display('3', message); break;}
		case "Padd": { error_display('4', message); break;}
		case "EI": { error_display('5', message); break;}
		case "ProI": { error_display('6', message); break;}
		case "CV": { error_display('7', message); break;}
	}
	return ("ERROR");
}
		
		
function error_display (num, message)
{
	var exp = document.getElementById("error" + num);
	exp.style.display = "block"; 
	exp.innerHTML = exp.innerHTML + message + '<br />';
	return ;
}

// show the hidden qualification divs
function opt_qualification(sel)
{		
	var char = sel.options[sel.selectedIndex].value;
	var arr = new Array("PGrad", "Grad", "12th");
	for(var i = 0; i < 3 ; i ++)
	{
		var tableRow = document.getElementsByClassName(arr[i]);
		var len = tableRow.length;
		for(var j = 0; j < len ; j ++)
			tableRow[j].style.display = "none";
	}
	switch(char)
	{
		case 'Post Grad': T("PGrad");
		case 'Finished Grad': 
		case 'Pursuing Grad': T("Grad");
		case 'Finished 12th': 
		case 'Pursuing 12th': T("12th");
		default: break;
	}
	return;	
}

function T(val)
{	
	var tableRow = document.getElementsByClassName(val);
	var len = tableRow.length;
	
	for(var i = 0; i < len ; i ++)
		tableRow[i].style.display = "table-row";

	return;
}