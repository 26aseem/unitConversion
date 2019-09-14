<?php
function convert_to_metreps($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'milesph'){
        return $value*1609.34/3600;
    }

    else if($from_unit == 'footps'){
        return $value*0.3048;
    }
    
    else if($from_unit == 'meterps'){
        return $value;
    }
    
    else if($from_unit == 'kmph'){
        return $value *5/18;
    }
    
    else if($from_unit == 'kmps'){
        return $value*1000 ;
    }
    
    else if($from_unit == 'knot'){
        return $value /1.944;
    }
    
    else if($from_unit == 'meterph'){
        return $value /3600;
    }
    
    else if($from_unit == 'milesps'){
        return $value * 1609.34;
    }
    
    else
        return "Unsupported unit";
}



function convert_from_metreps($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'milesph'){
        return $value/1609.34*3600;
    }

    else if($to_unit == 'footps'){
        return $value/0.3048 ;
    }
    
    else if($to_unit == 'kmph'){
        return $value * 3.6;
    }
    
    else if($to_unit == 'meterps'){
        return $value;
    }
    
    else if($to_unit == 'kmps'){
        return $value / 1000;
    }
    
    else if($to_unit == 'knot'){
        return $value *1.944;
    }
    
    else if($to_unit == 'meterph'){
        return $value * 3600;
    }
    
    else if($to_unit == 'milesps'){
        return $value / 1609.34;
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
    $to_value = convert_to_metreps($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_metreps($to_unit,convert_to_metreps($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Speed</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />    
    </head>

    <body>
    <h1> Speed Conversion </h1>
        <div id="main-content">
             <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="milesph" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='milesph') { echo " selected";}?>> mile per hour</option>
                        <option value="milesps" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='milesps') { echo " selected";}?>> mile per second</option>
                        <option value="meterps" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='meterps') { echo " selected";}?> >meter per second </option>
                        <option value="meterph" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='meterph') { echo " selected";}?> >metre per hour</option>
                        <option value="footps" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='footps') { echo " selected";}?> > foot per second</option>
                        <option value="knot" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='knot') { echo " selected";}?> >knot</option>
                        <option value="kmps" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='kmps') { echo " selected";}?> > kilometre per second</option>
                        <option value="kmph" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='kmph') { echo " selected";}?> >kilometre per hour</option>
                        

                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                    <option value="milesph" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='milesph') { echo " selected";}?>> mile per hour</option>
                        <option value="milesps" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='milesps') { echo " selected";}?>> mile per second</option>
                        <option value="meterps" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='meterps') { echo " selected";}?> >metre per second </option>
                        <option value="meterph" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='meterph') { echo " selected";}?> >metre per hour</option>
                        <option value="footps" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='footps') { echo " selected";}?> >foot per second</option>
                        <option value="knot" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='knot') { echo " selected";}?> >knot</option>
                        <option value="kmps" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='kmps') { echo " selected";}?> >kilometre per second</option>
                        <option value="kmph" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='kmph') { echo " selected";}?> >kilometre per hour</option>
                        


                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
