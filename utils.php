<?php
/*
 * Copyright (C) 2014 Rishvi Chakka <rishvi.s@gmail.com>
 *
 * Author: Rishvi Chakka <rishvi.s@gmail.com>
 */

require_once 'config.php';

/**
   * @function validate_input
   * @desc returns if the input is a valid card string
   * @param string input card string
   * @return bool if card input is valid or not
   */
function validate_input ($card_string){
    global $deck;

    if(strlen($card_string) < 2)
        throw new Exception("Invalid input. ".
                            "Input should be of atleast 2 characters");

    $set = strtoupper(substr($card_string, -1));
    if(!in_array($set, $deck['sets']))
        throw new Exception("Invalid set provided. Valid set values are ".
                            implode(',', $deck['sets']));

    $card = strtoupper(substr($card_string, 0, -1));
    if(!in_array($card, $deck['symbols']))
        throw new Exception("Invalid card value provided. Valid card values ".
                            "are ".implode(',', $deck['symbols']));

    return Array('set' => $set, 'value' => get_value($card));
}

/**
   * @function get_value
   * @desc returns the card's numeric value
   * @param string card card value
   * @return int card's numeric value
   */
function get_value ($card){
    global $deck;

    if (is_numeric($card))
        return (int)$card;
    else if (key_exists($card, $deck['face_values']))
        return $deck['face_values'][$card];
    else
        return $deck['non_integer_value'];
}

/**
   * @function validate_cards
   * @desc returns if the input is a valid card string
   * @param array card1 card1's details
   * @param array card2 card2's details
   * @return bool if the combination is possible
   */
function validate_cards ($card1, $card2){
    if($card1['set'] == $card2['set'] && $card1['value'] == $card2['value'])
        throw new Exception("Cards combination is not possible!!!");        
}