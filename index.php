<?php
/*
 * Copyright (C) 2014 Rishvi Chakka <rishvi.s@gmail.com>
 *
 * Author: Rishvi Chakka <rishvi.s@gmail.com>
 */

ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" 
        src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
    </script>
</head>
<body> 
<form id='blackjack'>
<table style="width:30%;" cellpadding="0" cellspacing="0" align='center'>
    <tr>
        <td colspan="2" style="background-color:#FFA500;">
        <h1 style="margin:0;padding:0;" align='center'>BlackJack Score!!!</h1>
        </td>
    </tr>
    <tr>
        <td style="background-color:#FFD700;width:70%;" align='center'>
        <br />
        <font size='4'><b>Enter card 1: </b></font>
        <input type='text' name='card1' id='card1' 
            value='<?=$_REQUEST['card1']?>'>
        <br />
        <font size='4'><b>Enter card 2: </b></font>
        <input type='text' name='card2' id='card2' 
            value='<?=$_REQUEST['card2']?>'>
        <br />
        </td>
        <td style="background-color:#FFD700;width:50%;vertical-align:middle;">
        <br />
        <input type='submit' name='submit' value='submit'>
        <br />
        </td>
    </tr>
    <tr>
        <td colspan='2' style="background-color:#FFD700;width:70%;"><br /></td>
    </tr>

    <tr>
        <td colspan="2" style="background-color:#FAA000;text-align:center;">
        <br />
        <div id='score'></div>
        </td>
    </tr>
</table> 
</form>
</body>
</html>
<script type='text/javascript'>
    $("#blackjack").submit(function(event) { 
        var card1 = $("#card1").val();
        var card2 = $("#card2").val();

        if(!card1 || !card2) return false;
        if(card1.length < 2 || card2.length < 2) return false;

        $.getJSON("get_score.php?card1="+card1+"&card2="+card2, 
            function(response_obj) {
                if(response_obj.error == 1)
                    alert('Error occurred: '+response_obj.message);

                $("#score").html(response_obj.score);
            });

        return false;
    });
</script>