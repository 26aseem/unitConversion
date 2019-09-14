<?php
function convert_to_celsius($from_unit,$value){
    if($value==""){
        $value=0;
    }
    if($from_unit == 'celsius'){
        return $value * 1;
    }

    else if($from_unit == 'fahrenheit'){
        return ($value-32)*5/9;
    }
    
    else if($from_unit == 'kelvin'){
        return $value - 273.15;
    }
    
    else if($from_unit == 'rankine'){
        return ($value - 491.67)*5/9;
    }
        
    else
        return "Unsupported unit";
}



function convert_from_celsius($to_unit,$value){
    
    if($to_unit == 'celsius'){
        return $value / 1;
    }

    else if($to_unit == 'fahrenheit'){
        return ($value*5/9)+32;;
    }
    
    else if($to_unit == 'kelvin'){
        return $value + 273.15;
    }
    
    else if($to_unit == 'rankine'){
        return ($value*9/5)+491.67;
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
    $to_value = convert_to_celsius($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_celsius($to_unit,convert_to_celsius($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Temperature</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />    
    </head>

    <body>
    <h1> Temperature Conversion </h1>
        <div id="main-content">
            <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="celsius" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='celsius') { echo " selected";}?>> celsius</option>
                        <option value="fahrenheit" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='fahrenheit') { echo " selected";}?>> fahrenheit</option>
                        <option value="kelvin" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='kelvin') { echo " selected";}?> >kelvin </option>
                        <option value="rankine" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='rankine') { echo " selected";}?> >rankine scale</option>
                        
                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                    <option value="celsius" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='celsius') { echo " selected";}?>> celsius</option>
                        <option value="fahrenheit" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='fahrenheit') { echo " selected";}?>> fahrenheit</option>
                        <option value="kelvin" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='kelvin') { echo " selected";}?> >kelvin </option>
                        <option value="rankine" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='rankine') { echo " selected";}?> >rankine scale</option>
                       
                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
