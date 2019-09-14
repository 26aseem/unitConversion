<?php
function convert_to_second($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'second'){
        return $value ;
    }

    else if($from_unit == 'minute'){
        return $value*60;
    }
    
    else if($from_unit == 'hour'){
        return $value * 3600;
    }
    
    else if($from_unit == 'day'){
        return $value * 86400;
    }

    
    else if($from_unit == 'week'){
        return $value * 604800;
    }
    
    else if($from_unit == 'month'){
        return $value * 2628000;
    }
    
    else if($from_unit == 'cyear'){
        return $value * 31540000;
    }
        
    
    else if($from_unit == 'decade'){
        return $value*315400000;
    }
    
    else if($from_unit == 'century'){
        return $value*3154000000;
    }
    
    else if($from_unit == 'ms'){
        return $value / 1000;
    }

    
    else if($from_unit == 'micros'){
        return $value / 1000000;
    }
    
    else if($from_unit == 'ns'){
        return $value / 1000000000;
    }
    
    else
        return "Unsupported unit";
    }



function convert_from_second($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'second'){
        return $value ;
    }

    else if($to_unit == 'minute'){
        return $value/60;
    }
    
    else if($to_unit == 'hour'){
        return $value / 3600;
    }
    
    else if($to_unit == 'day'){
        return $value / 86400;
    }

    
    else if($to_unit == 'week'){
        return $value / 604800;
    }
    
    else if($to_unit == 'month'){
        return $value / 2628000;
    }
    
    else if($to_unit == 'cyear'){
        return $value / 31540000;
    }
        
    
    else if($to_unit == 'decade'){
        return $value / 315400000;
    }
    
    else if($to_unit == 'century'){
        return $value / 3154000000;
    }
    
    else if($to_unit == 'ms'){
        return $value * 1000;
    }

    
    else if($to_unit == 'micros'){
        return $value * 1000000;
    }
    
    else if($to_unit == 'ns'){
        return $value * 1000000000;
    }
    
    else
        return "Unsupported unit";
    }





$from_value = "";
$to_value = "";
$from_unit = "";
$to_unit = "";

if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){
    $from_value = 0;
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];
    $to_value = convert_to_second($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_second($to_unit,convert_to_second($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Time</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />    
    </head>

    <body>
    <h1> Time Conversion </h1>
        <div id="main-content">
                <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="ns" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='ns') { echo " selected";}?>> Nanosecond</option>
                        <option value="micros" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='micros') { echo " selected";}?>> Microsecond</option>
                        <option value="ms" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='ms') { echo " selected";}?> >Millisecond </option>
                        <option value="second" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='second') { echo " selected";}?> >Second scale</option>
                        <option value="minute" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='minute') { echo " selected";}?>> Minute</option>
                        <option value="hour" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='hour') { echo " selected";}?>> Hour</option>
                        <option value="day" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='day') { echo " selected";}?> >Day </option>
                        <option value="week" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='week') { echo " selected";}?> >Week</option>
                        <option value="month" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='month') { echo " selected";}?>> Month</option>
                        <option value="cyear" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='cyear') { echo " selected";}?>> Calender year</option>
                        <option value="decade" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='decade') { echo " selected";}?> >Decade </option>
                        <option value="century" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='century') { echo " selected";}?> >Century</option>
                        

                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                        <option value="ns" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='ns') { echo " selected";}?>> Nanosecond</option>
                        <option value="micros" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='micros') { echo " selected";}?>> Microsecond</option>
                        <option value="ms" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='ms') { echo " selected";}?> >Millisecond </option>
                        <option value="second" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='second') { echo " selected";}?> >Second scale</option>
                        <option value="minute" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='minute') { echo " selected";}?>> Minute</option>
                        <option value="hour" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='hour') { echo " selected";}?>> Hour</option>
                        <option value="day" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='day') { echo " selected";}?> >Day </option>
                        <option value="week" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='week') { echo " selected";}?> >Week</option>
                        <option value="month" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='month') { echo " selected";}?>> Month</option>
                        <option value="cyear" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='cyear') { echo " selected";}?>> Calender year</option>
                        <option value="decade" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='decade') { echo " selected";}?> >Decade </option>
                        <option value="century" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='century') { echo " selected";}?> >Century</option>
                          
                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
