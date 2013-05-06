<?php 
/*
	template name: form
*/
?>
<?php
	if(isset($_REQUEST['button'])){
		$formid = $_REQUEST['formid'];
		$firstname = $_REQUEST['FirstName'];
		$middlename = $_REQUEST['MiddleName'];
		$lastname = $_REQUEST['LastName'];
		$month = $_REQUEST['Month'];
		$day = $_REQUEST['Day'];
		$year = $_REQUEST['Year'];
		$gender = $_REQUEST['gender'];
		$email = $_REQUEST['Email'];
		$mobile = $_REQUEST['MobileNumber'];
		$currentaddress1 = $_REQUEST['currentaddress1'];
		$currentaddress2 = $_REQUEST['currentaddress2'];
		$currentstate = $_REQUEST['currentstate'];
		$CurrentCity = $_REQUEST['currentcity'];
		$currentpin = $_REQUEST['currentpin'];
		$check = $_REQUEST['check'];
		$permanentaddress1 = $_REQUEST['permanentaddress1'];
		$permanentaddress2 = $_REQUEST['permanentaddress2'];
		$permanentstate = $_REQUEST['permanentstate'];
		$permanentcity = $_REQUEST['permanentcity'];
		$permanentpin = $_REQUEST['permanentpin'];
		$status = $_REQUEST['status'];
		$YearStd10 = $_REQUEST['yearstd10'];
		$SchoolStd10 = $_REQUEST['schoolstd10'];
		$YearStd12 = $_REQUEST['yearstd12'];
		$SchoolStd12 = $_REQUEST['schoolstd12'];
		$GraduationDegree = $_REQUEST['GraduationDegree'];
		$GraduationSpecialization = $_REQUEST['GraduationSpecialization'];
		$YearGraduation = $_REQUEST['YearGraduation'];
		$GradCollege = $_REQUEST['GradCollege'];
		$GradUniv = $_REQUEST['GradUniv'];
		$PostGradDegree = $_REQUEST['PostGradDegree'];
		$PostGradSpecialization = $_REQUEST['PostGradSpecialization'];
		$YearPostGrad = $_REQUEST['YearPostGrad'];
		$PostGradUniv = $_REQUEST['PostGradUniv'];
		$PostGradCollege = $_REQUEST['PostGradCollege'];
		$PHDSpecialization = $_REQUEST['PHDSpecialization'];
		$YearPHD = $_REQUEST['YearPHD'];
		$PHDCollege = $_REQUEST['PHDCollege'];
		$PHDUniv = $_REQUEST['PHDUniv'];
		$workex = $_REQUEST['workex'];
		$PreferredField1 = $_REQUEST['PreferredField1'];
		$PreferredField2 = $_REQUEST['PreferredField2'];
		$collintern = $_REQUEST['collintern'];
		$CV = $_REQUEST['CV'];
		$button = $_REQUEST['button'];
		$button2 = $_REQUEST['button2'];

        global $wpdb;
		$insertData=array('id'=>$formid,'FirstName' => $firstname,'MiddleName' => $middlename,'LastName' => $lastname,
			              'Gender' => $gender,'Mobile' => $mobile,'Email' => $email, 'CurrentAddress1' =>$currentaddress1,
			              'CurrentAddress2' => $caddress2, 'CurrentCity' => $CurrentCity, 'CurrentState' => $CurrentState,
			              'CurrentPin' => $currentpin,'PermanentAddress1' => $permanentaddress1,'PermanentAddress2'=>$permanentaddress2,
			              'PermanentCity' => $PermanentCity, 'PermanentState' => $permanentstate,'permanentpin' => $permanentpin,
			              '10std' =>$YearStd10,'12std' => $YearStd12, 'School10' => $SchoolStd10,'School12'=>$SchoolStd12,
			              'GradDegree' => $GraduationDegree,'GradSpe'=>$GraduationSpecialization,'GradYear' => $YearGraduation,
			              'GradCollege' =>$GradCollege,'GradUniv' =>$GradUniv,'PostGradDegree' => $PostGradDegree,
			              'PostGradSpe'=> $PostGradSpecialization,'PostGradYear' => $YearPostGrad,'PostGradCollege' => $PostGradCollege,
			              'PostGradUniv' =>$PostGradUniv,'PHDSpe'=>$PHDSpecialization,'PHDYear' => $YearPHD,
			              'PHDCollege' =>$PHDCollege,'PHDUniv' => $PHDUniv,'Workex' => $workex,'Status'=>$status,
			              'intern1' =>$PreferredField1,'intern2' =>$PreferredField2,'CollegeInternship'=>$collintern,
			              'CV' =>$CV );
         // print_r($insertData);

        $table='interns2';
		$ar= $wpdb->insert($table,$insertData);
		// print_r($ar);
		$upload_dir = wp_upload_dir();
		$filelocation= $upload_dir['basedir'].'/pdf_files/';
		// echo "$filelocation";
		$filename=$_FILES['CV']['name'];
		$tmp_name=$_FILES['CV']['tmp_name'];
		$filesize=$_FILES['CV']['size'];
		$filetype=$_FILES['CV']['type'];
		$extension=pathinfo($_FILES['CV']['name'], PATHINFO_EXTENSION);
		$max_size=1048576;
		if(!empty($filename) )	{
		if(($extension=='pdf') ||($extension=='.doc') ||($extension=='.docx') &&($filetype=='application/pdf') ||($filetype=='application/msword') ||($filetype=='application/vnd.openxmlformats-officedocument.wordprocessingml.document') &&($filesize<=$max_size)){			
			$uploadfilelocation=$filelocation;
			//echo $uploadfilelocation;
			$a= move_uploaded_file($tmp_name, $uploadfilelocation.$filename);
				        
	     }
		         
		 }
		    
				
		        }
?>
<?php
get_header();
$content_position = ( $udesign_options['pages_sidebar_6'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php       do_action('udesign_above_page_content'); ?>

<?php	    if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		    <div class="entry">
<?php			the_content(__('<p class="serif">Read the rest of this page &raquo;</p>', 'udesign'));
			wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		    </div>
		</div>
<?php		//( $udesign_options['show_comments_on_pages'] == 'yes' ) ? comments_template() : '';
	    endwhile; endif; ?>
	    <div class="clear"></div>
<?php	    //edit_post_link(esc_html__('Edit this entry.', 'udesign'), '<p class="editLink">', '</p>'); ?>
				
<style type="text/css">
.errDiv {
	padding:6px;
	display:none;
	border:1px solid #C00;
	color:#000;
	background-color:#FCF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:9pt;
	width:70%;
}

form {
	font-family:Arial, Helvetica, sans-serif;
	font-size:10pt;
}

tr {
	margin-top:10px;
}

td h3 {
	margin-bottom:10px;
}

td {
	margin:10px;
	padding:3px;
}

table { 
	width:100%; 
	margin-bottom:20px;
}

#button, #button2 {
	width:150px;
	height:40px;
	background-color:#004185;
	color:#FFF;
	font-size:13pt;
	font-family: Arial, sans-serif;
}

#input {
	background-color:#004185;
}
</style>


<form method="POST" name="formid" id="form1" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI'] ?>" onsubmit="return validate_form(this)">
<table>
<tbody><tr>
	<td colspan="4">
		<h3>Personal Information</h3>
	</td>
</tr>
<tr>
	<td>
	 First Name <small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="First Name">
		<input class="PI" type="text" name="FirstName" id="First Name"> 
		</label>
	</td>
	
	<td> Middle Name </td>
	<td> 
		<label for="Middle Name">
		<input type="text" name="MiddleName" id="Middle Name"> 
		</label>
	</td>

</tr>

<tr>
	<td> Last Name <small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="Last Name">
		<input class="PI" type="text" name="LastName" id="Last Name">
		</label>
	</td>
	
	<td> Date of Birth:<small style="color: red;"><sup>*</sup></small>
    		</td><td>
    		
			<select class="PI" name="Month" id="Month for Date of Birth" onchange="set_days(this.value)"><option value=""> Month </option><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>
           	<select class="PI" name="Day" id="Day for Date of Birth"><option value=""> Day </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
       		<select class="PI" name="Year" id="Year for Date of Birth"><option value=""> Year </option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option></select>
	</td>          
    	
	
</tr>

<tr>
	<td> Gender </td>
	<td>
		Male 	 <input type="radio" name="gender" id="male" value="male">
		Female <input type="radio" name="gender" id="female" value="female">
	</td>
</tr>

</tbody></table>
<div id="error1" class="errDiv"></div>

<table>
<tbody><tr>
	<td colspan="4">
		<h3>Contact Information</h3>
	</td>
</tr>

<tr>
	<td> E-mail Address <small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="Email">
		<input class="CI" type="text" name="Email" id="Email">
		</label>
	</td>

	<td> Mobile Number <small style="color: red;"><sup>*</sup></small> </td>

	<td> 
		<label for="Mobile Number">
		<input class="CI" type="text" name="MobileNumber" id="Mobile Number" maxlength="15">
		</label>
	</td>
</tr>

<tr>
	<td>&nbsp;  </td>
	<td>&nbsp;  </td>
	<td> 
		<small>Please do not prefix +91</small>
	</td>
</tr>
		

</tbody></table>
<div id="error2" class="errDiv"></div>

<table>

<tbody><tr>
	<td colspan="4"> <strong> Current Address </strong> </td><td>
</td></tr>

<tr>
	<td> Address Line 1 <small style="color: red;"><sup>*</sup></small></td>
	<td colspan="3"> 
		<label for="Current Address #1">
		<input type="text" size="40" name="currentaddress1" id="Current Address #1" class="Cadd">
		</label>
	</td>
</tr>

<tr>
	<td> Address Line 2 </td>
	<td colspan="3"> 
		<label for="Current Address #2">
		<input type="text" size="40" name="currentaddress2" id="Current Address #2" class="Cadd">
		</label>
	</td>
</tr>

<tr>
	<td> State <small style="color: red;"><sup>*</sup></small>  </td>
	<td colspan="3"> 
		<label for="CurrentState">
		<select name="currentstate" id="CurrentState" class="Cadd" onchange="loadCities(this.value, 'CurrentCity','ddd')">
			<option value="" selected="selected">Please Select a State </option>
			<option value="AN">Andaman and Nicobar Islands</option>
			<option value="AP">Andhra Pradesh</option>
			<option value="AR">Arunachal Pradesh</option><option value="AS">Assam</option><option value="BH">Bihar</option><option value="CH">Chandigarh</option><option value="CS">Chhattisgarh</option><option value="DN">Dadra and Nagar Haveli</option><option value="DD">Daman and Diu</option><option value="DL">Delhi</option><option value="GO">Goa</option><option value="GJ">Gujarat</option><option value="HR">Haryana</option><option value="HP">Himachal Pradesh</option><option value="JK">Jammu and Kashmir</option><option value="JH">Jharkhand</option><option value="KN">Karnataka</option><option value="KR">Kerala</option><option value="LK">Lakshadweep</option><option value="MP">Madhya Pradesh</option><option value="MH">Maharashtra</option><option value="MN">Manipur</option><option value="MG">Meghalaya</option><option value="MZ">Mizoram</option><option value="NG">Nagaland</option><option value="OS">Orissa</option><option value="PD">Pondicherry</option><option value="PB">Punjab</option><option value="RJ">Rajasthan</option><option value="SK">Sikkim</option><option value="TN">Tamil Nadu</option><option value="TP">Tripura</option><option value="UP">Uttar Pradesh</option><option value="UK">Uttarakhand</option><option value="WB">West Bengal</option>
		</select>
		</label>
	</td>
	
</tr>

<tr>
	<td> City <small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="CurrentCity">
		<select id="CurrentCity" name="currentcity" class="Cadd"><option value="" selected="selected">Please Select a City</option><option value="" selected="selected">Please Select a City</option></select>
		</label>
	</td>

	<td> Pin Code </td>
	<td> 
		<label for="Pin Code (Current)">
		<input type="text" name="currentpin" id="Pin Code (Current)" class="Cadd"> 
		</label>
	</td>
</tr>
</tbody></table>
<div id="error3" class="errDiv"> </div>

<table>
<tbody><tr>
	<td colspan="4"> 
	<input id="check" name="check" type="checkbox" onclick="copy_address(this)">
    <small> Check if Permanent Address and Current Address are same </small> 
	</td>
</tr>

<tr>
	<td colspan="4"> <strong> Permanent Address </strong> </td><td>
</td></tr>

<tr>
	<td> Address Line 1: <small style="color: red;"><sup>*</sup></small></td>
	<td colspan="3"> 
		<label for="Permanent Address #1">
		<input type="text" size="40" name="permanentaddress1" id="Permanent Address #1" class="Padd">
		</label>
	</td>
</tr>

<tr>
	<td> Address Line 2: </td>
	<td colspan="3"> 
		<label for="Permanent Address #2">
		<input type="text" size="40" name="permanentaddress2" id="Permanent Address #2" class="Padd">
		</label>
	</td>
</tr>


<tr>
	<td> State <small style="color: red;"><sup>*</sup></small> </td>
	<td colspan="3"> 
		<label for="PermanentState">
		<select name="permanentstate" id="PermanentState" class="Padd" onchange="loadCities(this.value, 'PermanentCity')"><option value="" selected="selected">Please Select a State </option><option value="AN">Andaman and Nicobar Islands</option><option value="AP">Andhra Pradesh</option><option value="AR">Arunachal Pradesh</option><option value="AS">Assam</option><option value="BH">Bihar</option><option value="CH">Chandigarh</option><option value="CS">Chhattisgarh</option><option value="DN">Dadra and Nagar Haveli</option><option value="DD">Daman and Diu</option><option value="DL">Delhi</option><option value="GO">Goa</option><option value="GJ">Gujarat</option><option value="HR">Haryana</option><option value="HP">Himachal Pradesh</option><option value="JK">Jammu and Kashmir</option><option value="JH">Jharkhand</option><option value="KN">Karnataka</option><option value="KR">Kerala</option><option value="LK">Lakshadweep</option><option value="MP">Madhya Pradesh</option><option value="MH">Maharashtra</option><option value="MN">Manipur</option><option value="MG">Meghalaya</option><option value="MZ">Mizoram</option><option value="NG">Nagaland</option><option value="OS">Orissa</option><option value="PD">Pondicherry</option><option value="PB">Punjab</option><option value="RJ">Rajasthan</option><option value="SK">Sikkim</option><option value="TN">Tamil Nadu</option><option value="TP">Tripura</option><option value="UP">Uttar Pradesh</option><option value="UK">Uttarakhand</option><option value="WB">West Bengal</option></select>
		</label>
	</td>
	
</tr>

<tr>
	<td> City </td>
	<td> 
		<label for="PermanentCity">
		<select id="PermanentCity" name="permanentcity" class="Padd"> <option value="" selected="selected">Please Select a City</option><option value="" selected="selected">Please Select a City</option></select>
		</label>
	</td>	

	
	<td> Pin Code </td>
	<td>
		<label for="Pin Code (Permament)">
		<input type="text" name="permanentpin" id="Pin Code (Permament)" class="Padd"> 
		</label>
	</td>
</tr>

</tbody></table>
<div id="error4" class="errDiv"> </div>

<table>

<tbody><tr>
	<td colspan="2">
		<h3>Educational Information</h3>
	</td>
</tr>

<tr>
	<td>What is your current status? <small style="color: red;"><sup>*</sup></small></td>

	<td> 
	<select id="Qualification Status" class="EI" name="status" onchange="javascript: opt_qualification(this);">
		<option value="Finished 10th">Finished 10th Standard</option>
		<option value="Pursuing 12th">Pursuing 12th Standard</option>
		<option value="Finished 12th">Finished 12th</option>
		<option value="Pursuing Grad">Pursuing Graduation</option> 
		<option value="Finished Grad">Finished Graduation</option>
		<option value="Post Grad">Post Graduation</option>
        	<option value="PHD">PHD</option>
	</select>
	</td>
</tr>

<tr>
	<td> Year of completing 10<small><sup>th</sup></small> standard: <small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="Year of Completion-Std10">
		<input type="text" size="4" name="yearstd10" id="Year of Completion-Std10" class="EI"> 
		</label>
	</td>
</tr>

<tr>
	<td> School (10<small><sup>th</sup></small> standard): <small style="color: red;"><sup>*</sup></small></td>
	<td> 
		<label for="School Std10">
		<input type="text" name="schoolstd10" id="School Std10" class="EI"> 
		</label>
	</td>
</tr>

<tr class="12th" style="display: none; border-top:thin solid #004185;" id="12 yr">
	<td> Year of completing 12 <small><sup>th</sup></small> standard:<small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="Year of Completion-Std12">
		<input type="text" size="4" name="yearstd12" id="Year of Completion-Std12" class="EI"> 
		</label>
	</td>
</tr>

<tr class="12th" style="display: none;">
	<td> School (12<small><sup>th</sup></small> standard): <small style="color: red;"><sup>*</sup></small></td>
	<td> 
		<label for="School Std12">
		<input type="text" name="schoolstd12" id="SchoolStd12" class="EI"> 
		</label>
	</td>
</tr>

<tr class="Grad" style="display: none; border-top:thin solid #004185;">
	<td> Graduation Degree:<small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="Graduation Degree Name">
		<input type="text" name="GraduationDegree" id="Graduation Degree Name" class="EI"> 
		</label>
	</td>
</tr>

<tr class="Grad" style="display: none;">
	<td> Graduation Specialization:<small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="Graduation Specialization Name">
		<input type="text" name="GraduationSpecialization" id="Graduation Specialization Name" class="EI"> 
		</label>
	</td>
</tr>

<tr class="Grad" style="display: none;">
	<td> Year of Completion:<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="Year of Completion-Graduation">
		<input type="text" size="4" name="YearGraduation" id="Year of Completion-Graduation" class="EI"> 
		</label>
	</td>
</tr>

<tr class="Grad" style="display: none;">
	<td> College (Graduation):<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="Graduation College">
		<input type="text" name="GradCollege" id="Graduation College" class="EI"> 
		</label>
	</td>
</tr>

<tr class="Grad" style="display: none;">
	<td> University (Graduation):</td>
	<td> 
		<label for="Graduation University">
		<input type="text" name="GradUniv" id="Graduation University" class="EI"> 
		</label>
	</td>
</tr>

<tr class="PGrad" style="display: none; border-top:thin solid #004185;">
	<td> Post Graduation Degree:<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="Post-Graduation Degree Name"><input type="text" name="PostGradDegree" id="Post-Graduation Degree Name" class="EI"> 
		</label>
	</td>
</tr>

<tr class="PGrad" style="display: none;">
	<td> Post Graduation Specialization:<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="Post-Graduation Specialization Name"><input type="text" name="PostGradSpecialization" id="Post-Graduation Specialization Name" class="EI"> 
		</label>
	</td>
</tr>

<tr class="PGrad" style="display: none;">
	<td>Year of Completion: <small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="Year of Completion-Post Graduation">
		<input class="EI" type="text" size="4" name="YearPostGrad" id="Year of Completion-Post Graduation"> 
		</label>
	</td>
</tr>

<tr class="PGrad" style="display: none;">
	<td> College (Post Grad):<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="College Post Graduation">
		<input class="EI" type="text" name="PostGradCollege" id="College Post Graduation"> 
		</label>
	</td>
</tr>


<tr class="PGrad" style="display: none;">
	<td> University (Post Grad):</td>
	<td> 
		<label for="University Post Graduation">
		<input class="EI" type="text" name="PostGradUniv" id="University Post Graduation"> 
		</label>
	</td>
</tr>

<tr class="PHD" style="display: none; border-top:thin solid #004185;">
	<td> PHD Specialization:<small style="color: red;"><sup>*</sup></small> </td>
	<td>
		<label for="PHD Specialization Name">
		<input type="text" name="PHDSpecialization" id="PHD Specialization Name" class="EI"> 
		</label>
	</td>
</tr>

<tr class="PHD" style="display: none;">
	<td> Year of Completion:<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="Year of Completion-PHD">
		<input type="text" size="4" name="YearPHD" id="Year of Completion-PHD" class="EI"> 
		</label>
	</td>
</tr>

<tr class="PHD" style="display: none;">
	<td> College (PHD):<small style="color: red;"><sup>*</sup></small> </td>
	<td> 
		<label for="PHD College">
		<input type="text" name="PHDCollege" id="PHD College" class="EI"> 
		</label>
	</td>
</tr>

<tr class="PHD" style="display: none;">
	<td> University (PHD):</td>
	<td> 
		<label for="PHD University">
		<input type="text" name="PHDUniv" id="PHD University" class="EI"> 
		</label>
	</td>
</tr>

</tbody></table>
<div id="error5" class="errDiv"> </div>

<table>
<tbody><tr>
<td colspan="2">
<h3>Professional Information</h3>
</td>
</tr>
<!-- <tr>
<td colspan="2">Time period of Internship:<small style="color: red;"><sup>*</sup></small> </td>
<td> 
<select id="Duration of Internship" class="ProI" name="DurationOfInternship">

<option value="">Choose One</option>
<option value="6w">6 Weeks</option>
<option value="3m">3 Months</option>
<option value="6m">6 Months</option> 
<option value="6more">More than 6 Months</option>
<option value="perm">Permanent Job</option>
</select>
</td>
</tr> -->

<tr>
<td colspan="2"> Work Experience: </td>
<td> 
<label for="Work Experience">
<input type="text" size="10" name="workex" id="Work Experience" class="ProI"> <sub><small>in months</small></sub>
</label>
</td>
</tr>

<tr>
<td colspan="3"> Will the Internship be part of your College Curriculum? <small style="color: red;"><sup>*</sup></small></td>
<td> 
	Yes <input type="radio" name="collintern" id="Yes" value="Yes" class="ProI"> 
	No  <input type="radio" name="collintern" id="No" value="No" class="ProI">
</td>
</tr>
</tbody></table>


<div id="error6" class="errDiv">
</div>

<table>
<tbody><tr>
<td colspan="4">
<h3> Curriculum Vitae </h3>
</td>
</tr>

<tr>
<td colspan="4"> 
<label for="file">
Please upload your CV (Only .doc .docx .txt or .pdf). Max Size: 1 MB

<small style="color: red;"><sup>*</sup></small> <input type="file" name="CV" id="CV" class="CV">
</label>

</td>
</tr>

</tbody></table>
<div id="error7" class="errDiv"></div>

<table>
<tbody><tr>
<td colspan="4">
<label for="Rcorp">How did you come to know about Us? <small style="color: red;"><sup>*</sup></small> </label>
<select name="Rcorp" id="option for how you got to know about RCorp?" class="rcorpOptions">
	<option value="">Please Select an Option</option>
	<option value="Google or other Search Engines">Google or other Search Engines</option>
	<option value="Facebook">Facebook</option>
	<option value="Twitter">Twitter</option>
	<option value="LinkedIn or other Social Networks">LinkedIn or other Social Networks</option>
	<option value="Classifieds or some other Website">Classifieds or some other Website</option>
	<option value="Word of Mouth / Friends">Word of Mouth / Friends</option>
	<option value="College (Noticeboard, Announcements)">College (Noticeboard, Announcements)</option>
	<option value="Flyer/Poster/Ad of RCorp">Flyer/Poster/Ad of RCorp</option>
	<option value="Our Marketing Representatives">Our Marketing Representatives</option>
</select>
</td>
</tr>
</tbody></table>
<div id="error8" class="errDiv"></div>

<table>
<tbody><tr>
	<td colspan="4" align="right">
		<label for="button">
		<input type="submit" name="button" id="button" value="Send my details.">
		</label>        
		
		<label for="button2">
		<input type="reset" name="button2" id="button2" value="I want to Reset.">
		</label>
	</td>
</tr>

</tbody></table>

<script type="text/javascript">
	var i = form_load();
</script>

</form>
						<!-- InstanceEndEditable -->
	</div>				

</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php //if( sidebar_exist('PagesSidebar6') ) { get_sidebar('PagesSidebar6'); } ?>


<?php get_footer(); ?>



