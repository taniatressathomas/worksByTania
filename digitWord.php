<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<head>
	<title>Digit-Word Convertor</title>
</head>
<body bgcolor="#CECECE">
	<h1><em><i>Digit to Word Convertor<i><em></h1>

	<p>The page displays the amount in words</p>

	

	<form  method="get" action="digitWord.php">
	<fieldset id="convertion">
	<legend>Enter a Value</legend>
		Amount: <input type="text" name="amount"> <br>
		<br>
		<input type="submit" value="Enter"><br>
		<br>
	</fieldset>
	</form>

<?php

		$newNum = [];

		$num = $_GET['amount'];

			if(!preg_match('/^[0-9]+(?:\.[0-9]+)?$/', $num))
		    {
		        echo "<p>Invalid, Please enter a valid input.</p>";
		        return false;

		    }
		    else
		    {    
		    	$number_in_words = " ";
		     	$newNum = explode(".", (string) $num);

		     	$digit = $newNum[0];
		     	@$fraction = $newNum[1];

		     	$digit = (int) $digit;
		     	$number_in_words =  digitToWords($digit). " Dollars";
				
				$fraction = (int) $fraction;
				$number_in_words .= "  and " ;
		     	$number_in_words .= digitToWords($fraction) . " cents";
		       
		    }


		function digitToWords ($digit)
		{
		    
		     $digit_in_words = "";


		     //words less than 20 doesnt have a pattern, so putting them in array along with values till 1000
		     $words_array = array ('Zero',
		     'One',
		     'Two',
		     'Three',
		     'Four',
		     'Five',
		     'Six',
		     'Seven',
		     'Eight',
		     'Nine',
		     'Ten',
		     'Eleven',
		     'Twelve',
		     'Thirteen',
		     'Fourteen',
		     'Fifteen',
		     'Sixteen',
		     'Seventeen',
		     'Eighteen',
		     'Nineteen',
		     'Twenty',
		     30=> 'Thirty',
		     40 => 'Fourty',
		     50 => 'Fifty',
		     60 => 'Sixty',
		     70 => 'Seventy',
		     80 => 'Eighty',
		     90 => 'Ninety',
		     100 => 'Hundred',
		     1000=> 'Thousand');
		     
		     
		         

		        
		    if ($digit > 1000)
		        {
		             $digit_in_words = $digit_in_words . digitToWords(floor($digit/1000)) . " " . $words_array[1000];
		             $hundreds = $digit % 1000;
		             $tens = $hundreds % 100;

		             if ($hundreds > 100)
		             {
		            	 $digit_in_words = $digit_in_words . " " . digitToWords ($hundreds);
		             }

		             elseif ($tens)
		             {
		             	$digit_in_words = $digit_in_words . " " . digitToWords ($tens);
		             }
		              
		        }
		    elseif ($digit > 100)
		         {
		             $digit_in_words = $digit_in_words . digitToWords(floor ($digit / 100)) . " " . $words_array[100];
		             $tens = $digit % 100;

		             if ($tens)
		             {
		            	 $digit_in_words = $digit_in_words . " " . digitToWords ($tens);
		             }
		             
		         }
		    elseif ($digit > 20)
		         {
		             $digit_in_words = $digit_in_words . " " . $words_array[10 * floor ($digit/10)];
		             $units = $digit % 10;

		             if ($units)
		             {
		            	 $digit_in_words = $digit_in_words . digitToWords ($units);
		             }
		             
		         }
		    else
		         {
		            $digit_in_words = $digit_in_words . " " . $words_array[$digit];
		            
		         }
		        
			return $digit_in_words;
		     
		}

			

		echo "<p>The Amount is $number_in_words</p>";
	 

?>

</body>
</html>
