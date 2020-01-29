<!DOCTYPE html>
<html>
<head>
  <title>Question 3</title>
</head>
<body>
<! –– html form to enter phone number ––>
<h1>Question 3</h1>
<form action="question_3.php" method="post">
Enter Phone number:<input type="number" name="number" maxlength="10" ><br>

<input <a  type="submit" name="submit" value="submit"></a>
</form>
<br>




<?php

// declaring a function to get correct_destinatio
function get_correct_destination($get_number)
 {

  // checking if phone number prefix
   if(substr($get_number,0,3)=='011' && substr($get_number,3,4)=='1234')
   {
     	return "Correct destination is  <b>ZA_Switch</b>";
   }

   if(substr($get_number,0,3)=='013' && substr($get_number,3,7)=='1234567')
   {
   
      return "Correct destination is  <b>ZA_Neotel</b>";
   }

    elseif (substr($get_number,0,3)=='011' || substr($get_number,0,3)=='012' || substr($get_number,0,3)=='013') {
     
       return "Correct destination is  <b>ZA_Telkom</b>";
   }

   else
   {
    return "Incorrect destination"; // displaying an error message if correct prefix is not found
   }
 

}
class show_error extends Exception{} // class to get Exception

// the following block of code update a phone number
  function change_destination($phone_number)
   {
   
   try
   {
    $get_destination_function = get_correct_destination($phone_number); // calling correct_destination funtion 
    if($get_destination_function != 'Incorrect destination')
    {
     
         if(substr($phone_number,8,2)=='00' )
         {
        
          $update_number1 = substr_replace($phone_number,99, 8, 2);
          return "This number <i>$phone_number</i> has been updated to <b> $update_number1</b>" ;
         }

         elseif (substr($phone_number,9,1)=='0') {
             $update_number2 = substr_replace($phone_number,9, 9, 1);
        
            return "This number <i>$phone_number</i> has been updated to <b> $update_number2</b>"; 
         }
        
         
    }
    // throwing an exception if the phone number entered does not have a correct prefix
    else
    {
  throw new show_error("This number does not have a destination ");
      
    }

   }
   catch(show_error $ex)
   {
   return $ex->getMessage();
   }
 
   }


 if(isset($_POST['submit']))
   {
        $get_number = $_POST['number'];

         if($get_number != '') // checking if phone number entered is not empty
        {
          $destination = get_correct_destination($get_number);

          echo   $destination.'<br>';
          $get_change_destination = change_destination($get_number); // calling  change_destination
          echo  $get_change_destination;
        }

         else
			 {
			 	echo "<font color='red'> <p>Please enter phone number</p></font>"; // displaying error message if  phone number input field is  empty
			 }
   	}


?>
<br>
<a href="question_1.php">select here to access question 1</a>
</body>
</html>