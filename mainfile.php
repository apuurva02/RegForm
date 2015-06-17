 <?php 
    
    include('val.php');
	include('connect.php');
	function selected($department, $choice) 
	{
		if($department==$choice) echo "selected";
	}
	function select($year, $ch)
	{
		if($year==$ch) echo "selected";
	}
	

?>	

<html>

<head>

<title> Registration Form </title>

<script>
function validate()
  {
     var rollno = document.regForm.RollNo;
	 var name = document.regForm.Name;
	 var dept = document.regForm.Department;
	 var year = document.regForm.Year;
	 var email = document.regForm.Email;
	 var password1 = document.regForm.pwd;
	 var password2 = document.regForm.repwd;
	 
	 if (rollno.value == "")
	 {
	   window.alert("Please Enter your Roll Number!");
	   rollno.focus();
	   return false;
	 }
	 
	 if (rollno.value <100000000 || rollno.value > 999999999)
	 {
	    window.alert("Please Enter a valid 9 digit Roll Number");
		rollno.focus();
		return false;
	 }
	 
	 if (isNaN(rollno.value ))
	 { 
	   window.alert("Please Enter a VALID Roll Number!!");
	   rollno.focus();
	   return false;
	   }
	   
	if (name.value == "")
    {  
      window.alert("Please enter your name.");
      name.focus();
      return false;	
	}	
	
		
    var chk = /[A-Za-z.]/;
    if (!chk.test(name.value))
    {
	  window.alert("Name must contain only alphabets!");
	  name.focus();
	  return false;
	  
	}

	if (name.value.length < 3 || name.value.length > 20)
	{
		window.alert("Name should be within 3-20 characters long");
		name.focus();
		return false;
	}
	
	if(dept.selectedIndex < 1)
	{
	   window.alert("Please Select your Department");
	   dept.focus();
	   return false;
	   }
     
	 if (year.selectedIndex < 1)
	 {
	   window.alert("Please Select your Year of Study");
	   year.focus();
	   return false;
	 }
	 
	if(email.value == "")
    {
	  window.alert("Please Enter your E-Mail Address!");
	  email.focus();
	  return false;
	}	
	 
	chk = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!chk.test(email.value))
    {
	  window.alert("Please Enter a VALID E-Mail Address!!");
	  email.focus();
	  return false;
	}
    
	
	 
	 if (password1.value != "" && password1.value == password2.value)
	 {
	   if(password1.value.length < 6)
	   {
	     window.alert("Please Enter a password of minimum 6 characters!");
		 password1.focus();
		 return false;
	   
	   }
	   
	   if(password1.value.length > 20)
	   {
	     window.alert("Please Enter a password of maximum 20 characters!");
		 password1.focus();
		 return false;
	   
	   }
	   
	   chk = /[0-9]/;
	   if(!chk.test(password1.value))
	   {
	     window.alert("Password must contain atleast one number (0-9)!");
		 password1.focus();
		 return false;
	   }
	   
	   chk = /[a-z]/;
	   if(!chk.test(password1.value))
	   {
	     window.alert("Password must contain atleast one Lowercase letter!");
		 password1.focus();
		 return false;
		}
		
		chk = /[A-Z]/;
	   if(!chk.test(password1.value))
	   {
	     window.alert("Password must contain atleast one Uppercase letter!");
		 password1.focus();
		 return false;
		}
					   
	 }
	 
	 else if (password1.value == "")
	 {
	   window.alert("Please Enter a Password!");
	   password1.focus();
	   return false;
	 }
	 
	 else if (password2.value == "")
	 {
	   window.alert("Please Re-enter your Password!");
	   password2.focus();
	   return false;
	   
	 }
	 
	 else if (password1.value != password2.value)
	 {
	   window.alert("Please Re-enter your Password correctly!");
	   password2.focus();
	   return false;
	 }
	 
	 
	 return true;
	 }
	 
</script>

<body>



<form action="mainfile.php" name="regForm" onsubmit="return (validate());" method="post" enctype="multipart/form-data">
   <p> Please Fill up the form below and submit</p>
   
   <p>Roll Number: <input type="text" name="RollNo" value="<?php echo $rollno; ?>"/> <?php echo $rollnoErr;?> </p>
   <p>Name: <input type="text" name="Name" value="<?php echo $name; ?>" /> <?php echo $nameErr;?> </p>
   <p>Department: 
       <select type="text" name="Department" value="<?php echo $department; ?>">
	        <option value="0" > Select your Department </option>
	        <option value="1" <?php selected(@$department, 1)?>> Architecture </option>
			<option value="2" <?php selected(@$department, 2)?>> Chemical Engineering </option>
			<option value="3" <?php selected(@$department, 3)?>> Civil Engineering </option>
			<option value="4" <?php selected(@$department, 4)?>> Computer Science and Engineering </option>
			<option value="5" <?php selected(@$department, 5)?>> Electrical and Electronics Engineering </option>
			<option value="6" <?php selected(@$department, 6)?>> Electronics and Communication Engineering </option>
			<option value="7" <?php selected(@$department, 7)?>> Instrumentation and Control Engineering </option>
			<option value="8" <?php selected(@$department, 8)?>> Mechanical Engineering </option>
			<option value="9" <?php selected(@$department, 9)?>> Metallurgical and Materials Engineering </option>
			<option value="10" <?php selected(@$department, 10)?>> Production Engineering </option>
		</select>
	<?php echo $departmentErr;?> </p>
	<p>Year of Study:
    	<select type="text" name="Year">
		    <option value="0">Select your Year of Study</option>
		    <option value="1" <?php select(@$year, 1)?>>1st Year</option>
			<option value="2" <?php select(@$year, 2)?>>2nd Year</option>
			<option value="3" <?php select(@$year, 3)?>>3rd Year</option>
			<option value="4" <?php select(@$year, 4)?>>4th Year</option>
		</select>
    <?php echo $yearErr;?> </p>
    <p>E-Mail Address: <input type="text"	name="Email" value="<?php echo $email; ?>" /> <?php echo $emailErr;?> </p>
	<p>Password: <input type="password" name="pwd" value="<?php echo $password; ?>" /> <?php echo $passwordErr;?> </p>
	<p>Confirm Password: <input type="password" name="repwd" value="<?php echo $repassword; ?>" /> <?php echo $repasswordErr;?> </p>
	<p>Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"></p>
    
	<p><input type="submit" value="Send" name="submit">
    <input type="reset" value="Reset" name="reset"></p> 
	
</form>

<?php


	  
		switch($department) {
			
			case 1 : $d = "Architecture";
			         break;
			case 2 : $d = "Chemical Engineering ";
			         break;
			case 3 : $d = "Civil Engineering";
                     break;
 			case 4 : $d = "Computer Science and Engineering";
			         break;
			case 5 : $d = "Electrical and Electronics Engineering";
                     break;
            case 6 : $d = "Electronics and Communication Engineering";
			         break;
			case 7 : $d = "Instrumentation and Control Engineering";
                     break;
            case 8 : $d = "Mechanical Engineering";
                     break;
            case 9: $d = "Metallurgical and Materials Engineering";
			         break;
			 case 10: $d = "Production Engineering ";
			          break;
			 }
			 
	
	
		switch($year){
			
			case 1: $y = "1st Year";
			        break;
			case 2: $y = "2nd Year";
			        break;
			case 3: $y = "3rd Year";
                    break;
			case 4: $y = "4th Year";
			        break;
			}
	
	        $number = mt_rand(100000000,999999999);
			if (isset($_POST['submit'])) 
			{   echo "<p>Form has been submitted successfully.</p>";
		        
				echo $name." ". $email . " ".$rollno." ". $password."" . $repassword." ". $department." ". $year;
				
							
				$sql = "INSERT INTO student (rollno, name, department, year, email, password,profilepath, uniqueno)
                     VALUES ('$rollno', '$name', '$d', '$y', '$email', '$password','$target_file', '$number')";

                if ($conn->query($sql) === TRUE) 
				{
                echo "New record created successfully";
                } 
				else 
				{
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
               $conn->close();
				
				


			}
?>			

	
</body>

</head>
</html>