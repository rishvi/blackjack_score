<?php
/*
 * Copyright (C) 2014 Rishvi Chakka <rishvi.s@gmail.com>
 *
 * Author: Rishvi Chakka <rishvi.s@gmail.com>
 */

ini_set('display_errors', 0);
require_once 'config.php';
require_once 'utils.php';

$card1 = $_REQUEST['card1'];
$card2 = $_REQUEST['card2'];

try {
    //validate cards
    $card1 = validate_input($card1);
    $card2 = validate_input($card2);

    //validate cards combination
    validate_cards ($card1, $card2);
    
    $score = $card1['value'] + $card2['value'];
    $response = Array('error' => 0, 
                      'score' => "<b>The Blackjack Score for the cards ".
                                 "is: $score</b>");
    echo json_encode($response);
}
catch (Exception $e){
    $response = Array('error' => 1, 'message' => $e->getMessage());
    echo json_encode($response);
}
?>