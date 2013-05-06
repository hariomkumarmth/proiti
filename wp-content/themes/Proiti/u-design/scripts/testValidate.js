
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
	error += validate_reqd(thisForm.Day);
	error += validate_reqd(thisForm.Month);
	error += validate_reqd(thisForm.Year);
	
	// Email Address
	error += validate_reqd(thisForm.Email);
	error += validate_len(thisForm.Email, 5, 30);
	error += validate_email(thisForm.Email);
	
	// Mobile Number
	error += validate_reqd(thisForm.MobileNumber);
	error += isNumeric(thisForm.MobileNumber);	
	error += validate_len(thisForm.MobileNumber, 10, 20);
	
	// Address Line 1
	error += validate_reqd(thisForm.caddress1);
	error += validate_len(thisForm.caddress1, 0, 60);
	
	// Address Line 2 
	error += validate_len(thisForm.caddress2, 0, 60);
	
	// Current State & City
	error += validate_reqd(thisForm.CurrentCity);
	error += validate_reqd(thisForm.cstate);
	
	// Pin Code
	error += isNumeric(thisForm.cpin);
	error += validate_len(thisForm.cpin, 5, 10);
	
	// Permanent Address Validation	
	if(thisForm.check.checked == false)
	{
	// Address Line 1
		error += validate_reqd(thisForm.paddress1);
		error += validate_len(thisForm.paddress1, 0, 60);
	// Address Line 2 
		error += validate_len(thisForm.paddress2, 0, 60);
	// Current City
		error += validate_reqd(thisForm.HomeCity);
	// State
		error += validate_reqd(thisForm.pstate);
	// Pin Code
		error += isNumeric(thisForm.ppin);
		error += validate_len(thisForm.ppin, 5, 10);
	}
	
// Educational Qualification

	// Current Status
	error += validate_reqd(thisForm.status);
	
	// Validation on basis of educational status selection
	var sel = document.getElementById('Qualification Status'); 
	var char = sel.options[sel.selectedIndex].value;
	switch(char)
	{
		case 'PHD':
		{
			error += validate_reqd (thisForm.PHDSpecialization);
			error += validate_reqd (thisForm.PHDCollege);
			error += validate_reqd (thisForm.YearPHD);
			
			error += validate_len  (thisForm.PHDSpecialization, 2, 20);
			error += validate_len (thisForm.PHDCollege, 2, 50);
			error += validate_len (thisForm.YearPHD, 4, 4);
			error += validate_len (thisForm.PHDUniv, 2, 50);
			
			error += isNumeric(thisForm.YearPHD);
		}
			
		case 'Post Grad': 
		{
			// Post Graduation Degree
			error += validate_reqd (thisForm.PostGradDegree);
			error += validate_reqd (thisForm.PostGradSpecialization);
			error += validate_reqd (thisForm.PostGradCollege);
			error += validate_reqd (thisForm.YearPostGrad);
						
			
			error += validate_len (thisForm.PostGradUniv, 2, 50);
			error += validate_len (thisForm.PostGradDegree, 2, 20);
			error += validate_len (thisForm.PostGradSpecialization, 2, 20);
			error += validate_len (thisForm.PostGradCollege, 2, 50);
			error += validate_len (thisForm.YearPostGrad, 4, 4);
			
			error += isNumeric(thisForm.YearPostGrad);
		}
		case 'Finished Grad': 
		case 'Pursuing Grad': 
		{
			// Graduation Degree
			error += validate_reqd (thisForm.GraduationDegree);
			error += validate_reqd (thisForm.GraduationSpecialization);
			error += validate_reqd (thisForm.GradCollege);
			error += validate_reqd (thisForm.YearGraduation);
						
			
			error += validate_len (thisForm.GradUniv, 2, 50);
			error += validate_len (thisForm.GraduationDegree, 2, 20);
			error += validate_len (thisForm.GraduationSpecialization, 2, 20);
			error += validate_len (thisForm.GradCollege, 2, 50);
			error += validate_len (thisForm.YearGraduation, 4, 4);
			
			error += isNumeric(thisForm.YearGraduation);			
		}
		case 'Finished 12th': 
		case 'Pursuing 12th': 
		{
			// Year Of Completion 12th
			error += isNumeric(thisForm.YearStd12);
			error += validate_len(thisForm.YearStd12, 4, 4);
			
			// School 12th
			error += validate_reqd(thisForm.SchoolStd12);
			error += validate_reqd(thisForm.YearStd12);
		}
		case 'Finished 10th':
		{
			error += validate_reqd(thisForm.YearStd10);
			error += validate_reqd(thisForm.SchoolStd10);
			error += isNumeric(thisForm.YearStd10);
			error += validate_len(thisForm.YearStd10, 4, 4);		
		}
		default: break;
	}
	
	// Time period of internship
	error += validate_reqd(thisForm.DurationOfInternship);
	
	// Work Ex Numeric
	error += isNumeric(thisForm.workex);
	error += validate_len(thisForm.workex, 1, 2);
	
	// Internship as part of your curriculum
	if (thisForm.collintern[0].checked == false && thisForm.collintern[1].checked == false)
		error += error_result(thisForm.collintern[0], "Please enter a valid Purpose of Internship.");
	
	// CV reqd field
	error += validate_file(thisForm.CV);
	
	//How did you come to know
	error+=validate_reqd(thisForm.Rcorp);
	
	if ((error == "") || (error == null))
		return true;
	else 
		return false;
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
		case "rcorpOptions": { error_display('8', message); break;}
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



function form_load()
{
	loadStates('CurrentState');
	loadStates('PermanentState');

	var MonthS = 
	new Array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	var buildMonths = '';
	for (i = 0; i < 12; i++)
	{
		buildMonths += '<option value="' + (i + 1) + '">'+ MonthS[i] + '</option>'; 
	}
	document.getElementsByName('Month')[0].innerHTML = '<option value=""> Month </option>';
	document.getElementsByName('Month')[0].innerHTML += buildMonths;
	
	set_days('January');
	
	var buildYears = '';
	for (i = 2011; i > 1900; i--)
	{
		buildYears += '<option value="' + i + '">'+ i + '</option>'; 
	}
	document.getElementsByName('Year')[0].innerHTML = '<option value=""> Year </option>';
	document.getElementsByName('Year')[0].innerHTML += buildYears;
}

function set_days(month)
{
	var days = -1;
	switch (month)
	{
		case 'January':
		case 'March':
		case 'May':
		case 'July':
		case 'August':
		case 'October':
		case 'December':	days = 31; break;	
		case 'February':	days = 29; break;			
		default:	      days = 30; break; 
	}
	
	var buildDays = '';
	for (var i = 1; i <=days; i++)
		buildDays += '<option value="' + i + '">'+ i + '</option>';
		
	document.getElementsByName('Day')[0].innerHTML = '<option value=""> Day </option>';
	document.getElementsByName('Day')[0].innerHTML += buildDays;
}


// Checkbox function for address
function copy_address(thisCheck)
{
	
	//loadStates('PermanentState');

	//caddress1
	//caddress2
	//cstate
	//CurrentCity
	//cpin
	
	//paddress1
	//paddress2
	//pstate
	//HomeCity
	//ppin
	
	//var len_c = cadd.length;
	if (thisCheck.checked == true)
	{			
		document.getElementsByName('paddress1')[0].value = document.getElementsByName('caddress1')[0].value;
		document.getElementsByName('paddress2')[0].value = document.getElementsByName('caddress2')[0].value;
		document.getElementsByName('ppin')[0].value = document.getElementsByName('cpin')[0].value;
		
		var pState = document.getElementsByName('pstate')[0];
		var cState = document.getElementsByName('cstate')[0];
		
		pState.selectedIndex = cState.selectedIndex;
		
		loadCities(cState.options[cState.selectedIndex].value, 'PermanentCity', 
			function()
			{
				var cCity = document.getElementsByName('CurrentCity')[0];
				var pCity = document.getElementsByName('HomeCity')[0];
		
				pCity.selectedIndex = cCity.selectedIndex;
			});
		
		//alert(pState.options[pState.selectedIndex].value);
	}
	/*else
	{
		for(i = 0;i <len_c; i++)
			padd[i].value = "";
		
		padd[0].focus();
	}*/
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
	

// show the hidden qualification divs
function opt_qualification(sel)
{		
	var char = sel.options[sel.selectedIndex].value;
	var arr = new Array("PHD", "PGrad", "Grad", "12th");
	for(var i = 0; i < arr.length ; i ++)
	{
		var tableRow = document.getElementsByClassName(arr[i]);
		var len = tableRow.length;
		for(var j = 0; j < len ; j ++)
			tableRow[j].style.display = "none";
	}
	switch(char)
	{
		case 'PHD': T("PHD");
		case 'PHD':
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



///CITY STATE ///

function loadStates(id)
{
	// console.log(id);
// $.ajax(
// {
// type: "GET",
// url: "../../careers/intern/state.xml",
// dataType: "xml",
// success: function(xml) 
// {
// var select = $('#' + id);
// select.html('');
// $(xml).find('states').each(function()
// {
// $(this).find('state').each(function()
// {
// var value = $(this).attr('id');
// var label=$(this).attr('name');
// select.append("<option value='"+ value +"'>"+label+"</option>");
// });
// });
// select.prepend('<option value="" selected="selected">Please Select a State </option>');
// $('#PermanentCity').append('<option value="" selected="selected">Please Select a City</option>');
// $('#CurrentCity').append('<option value="" selected="selected">Please Select a City</option>');

// } //sucess close
// }); 
}


 
function loadCities(statev, id, checkbox_func)
{
	console.log(id);
	console.log(statev);
	console.log(checkbox_func);
	$(id);
	// console.log('dsfskljhlsk');
$('#' + id).html('');
// $.ajax(
// {
// type: "GET",
// url: "../../careers/intern/city.xml",
// dataType: "xml",
// success: function(xml) 
// {
// 	var select = $('#' + id);
// 	$(xml).find('cities').each( function()
// 	{
// 		$(this).find(statev).each(function()
// 		{
// 			var label=$(this).attr('name');
// 			select.append("<option value='"+ label +"'>"+label+"</option>");
// 		});
// 	});
// select.prepend('<option value="" selected="selected">Please Select a City</option>');
// if (checkbox_func != undefined)
// 	checkbox_func();
// } //sucess close
// });
}
