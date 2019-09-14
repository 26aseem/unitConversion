<?php
function convert_to_metres($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'feet'){
        return $value * 0.3048;
    }

    else if($from_unit == 'yards'){
        return $value * 0.9144;
    }

    else if($from_unit == 'nauticalMiles'){
        return $value * 1852;
    }
    
    else if($from_unit == 'inches'){
        return $value * 0.0254;
    }
    
    else if($from_unit == 'miles'){
        return $value * 1609.344;
    }
    
    else if($from_unit == 'millimetres'){
        return $value * 0.001;
    }
    
    else if($from_unit == 'centimetres'){
        return $value * 0.01;
    }
    
    else if($from_unit == 'kilometres'){
        return $value * 1000;
    }
    
    else if($from_unit == 'metres'){
        return $value * 1;
    }
    
    else if($from_unit == 'nanometres'){
        return $value * 0.000000001;
    }
    
    else if($from_unit == 'micrometres'){
        return $value * 0.000001;
    }
    
    else
        return "Unsupported unit";
}



function convert_from_metres($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'feet'){
        return $value / 0.3048;
    }

    else if($to_unit == 'yards'){
        return $value / 0.9144;
    }

    else if($to_unit == 'nauticalMiles'){
        return $value / 1852;
    }
    
    else if($to_unit == 'inches'){
        return $value / 0.0254;
    }
    
    else if($to_unit == 'miles'){
        return $value / 1609.344;
    }
    
    else if($to_unit == 'millimetres'){
        return $value / 0.001;
    }
    
    else if($to_unit == 'centimetres'){
        return $value / 0.01;
    }
    
    else if($to_unit == 'kilometres'){
        return $value / 1000;
    }
    
    else if($to_unit == 'metres'){
        return $value / 1;
    }
    
    else if($to_unit == 'nanometres'){
        return $value / 0.000000001;
    }
    
    else if($to_unit == 'micrometres'){
        return $value / 0.000001;
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
    $to_value = convert_from_metres($to_unit,convert_to_metres($from_unit, 0));
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_metres($to_unit,convert_to_metres($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Length</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />    
    </head>

    <body>
    <h1> Length Conversion </h1>
        <div id="main-content">
            

            <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="inches" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='inches') { echo " selected";}?>> inches</option>
                        <option value="feet" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='feet') { echo " selected";}?>> feet</option>
                        <option value="yards" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='yards') { echo " selected";}?> >yards </option>
                        <option value="miles" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='miles') { echo " selected";}?> >miles</option>
                        <option value="metres" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='metres') { echo " selected";}?> >metres</option>
                        <option value="kilometres" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='kilometres') { echo " selected";}?> >kilometres</option>
                        <option value="centimetres" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='centimetres') { echo " selected";}?> >centimetres</option>
                        <option value="millimetres" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='millimetres') { echo " selected";}?> >milimetres</option>
                        <option value="nanometres" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='nanometres') { echo " selected";}?> >nanometres</option>
                        <option value="micrometres" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='micrometres') { echo " selected";}?> >micrometres</option>
                        <option value="nauticalMiles" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='nauticalMiles') { echo " selected";}?> >Nautical Miles</option>
                        

                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                    <option value="inches" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='inches') { echo " selected";}?>> inches</option>
                        <option value="feet" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='feet') { echo " selected";}?>> feet</option>
                        <option value="yards" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='yards') { echo " selected";}?> >yards </option>
                        <option value="miles" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='miles') { echo " selected";}?> >miles</option>
                        <option value="metres" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='metres') { echo " selected";}?> >metres</option>
                        <option value="kilometres" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='kilometres') { echo " selected";}?> >kilometres</option>
                        <option value="centimetres" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='centimetres') { echo " selected";}?> >centimetres</option>
                        <option value="milimetres" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='millimetres') { echo " selected";}?> >milimetres</option>
                        <option value="nanometres" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='nanometres') { echo " selected";}?> >nanometres</option>
                        <option value="micrometres" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='micrometres') { echo " selected";}?> >micrometres</option>
                        <option value="nauticalMiles" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='nauticalMiles') { echo " selected";}?> >Nautical Miles</option>
                        

                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
