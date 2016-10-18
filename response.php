<?php
    header("content-type: text/xml");
	$easy 	= array(array("Which ice-cream would you like to have today ?",array(
	$icecream = array(array("Which ice-cream would you like to have today ?",array("1. Banana Nut Fudge", "2. Black Walnut", "3. Burgundy Cherry", "4. Butterscotch Ribbon","5. Cherry Macaroon","6. Chocolate","7. Chocolate Almond","8. Chocolate Chip","9. Chocolate Fudge","10. Chocolate Mint","11. Chocolate Ribbon","12. Coffee","13. Coffee Candy","14. Date Nut","15. Egg Nog","16. French Vanilla","17. Green Mint Stick","18. Lemon Crisp","19. Lemon Custard","20. Lemon Sherbet","21. Maple Nut","22. Orange Sherbet", "23. Peach","24. Peppermint Fudge Ribbon","25. Peppermint Stick","26. Pineapple Sherbet","27. Raspberry Sherbet","28. Rocky Road","29. Strawberry","30. Vanilla","31. Vanilla Burnt Almond")));
	$medium = array(array("what is 2*2 ?",array("2","4","6","8")));
	$hard 	= array(array("what is 2+(2*3) ?",array("4","8","12","16")));
	$easyanswer   = 2;
	$mediumanswer = 2;
	$hardanswer   = 2;
    $quiz = array(
	    "easy" => $easy,		// easy question and answer
	    "medium" => $medium,	// medium question and answer
	    "hard" => $hard			// hard question and answer
	);
	// $to 	= $_REQUEST['to'];
	// $from   = $_REQUEST['from'];
	$answer = $_REQUEST['Body'];
	$reply  = array();
	if (is_numeric($answer)) {
		if($answer == 2){
			$reply = 'Correct answer';
		}
		else{
			$reply = 'Wrong answer';
		}
	}
	else if(is_string($answer)){
		array_push($reply, $quiz[$answer][0][0]);
		foreach ($quiz[$answer][0][1] as $key => $value) {
			array_push($reply, PHP_EOL);
			array_push($reply, $value);
		}
	}
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>

<Response>
	<Sms>
			<?php
				if(is_array($reply)){
					foreach($reply as $key => $value){
						echo $value;
					}
				}
				else{
					echo $reply;
				}
			?>
	</Sms>
</Response>
