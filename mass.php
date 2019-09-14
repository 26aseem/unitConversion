<?php
function convert_to_gram($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'gram'){
        return $value;
    }

    else if($from_unit == 'kg'){
        return $value * 1000;
    }
    
    else if($from_unit == 'mg'){
        return $value * 0.001;
    }
    
    else if($from_unit == 'tonne'){
        return $value * 1000000;
    }
    
    else if($from_unit == 'microg'){
        return $value / 1000000;
    }
    
    else if($from_unit == 'stone'){
        return $value * 6350.293;
    }
    
    else if($from_unit == 'pound'){
        return $value * 453.592;
    }
    
    else if($from_unit == 'ounce'){
        return $value * 28.35;
    }
    
    else if($from_unit == 'uston'){
        return $value * 907184.74;
    }
    
    else if($from_unit == 'iton'){
        return $value * 1016000;
    }
    
    else
        return "Unsupported unit";
}



function convert_from_gram($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'gram'){
        return $value;
    }

    else if($to_unit == 'kg'){
        return $value / 1000;
    }
    
    else if($to_unit == 'mg'){
        return $value * 1000;
    }
    
    else if($to_unit == 'microg'){
        return $value * 1000000;
    }
    
    else if($to_unit == 'tonne'){
        return $value / 1000000;
    }
    
    else if($to_unit == 'uston'){
        return $value / 907184.74;
    }
    
    else if($to_unit == 'iton'){
        return $value / 1016000;
    }

    else if($to_unit == 'stone'){
        return $value / 6350.293;
    }
    
    else if($to_unit == 'pound'){
        return $value / 453.592;
    }
    
    else if($to_unit == 'ounce'){
        return $value / 28.35;
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
    $to_value = convert_to_gram($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_gram($to_unit,convert_to_gram($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Mass</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />
    </head>

    <body>
    <h1> Mass Conversion </h1>
        <div id="main-content">
            <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="kg" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='kg') { echo " selected";}?>> Kilogram </option>
                        <option value="gram" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='gram') { echo " selected";}?>> Gram</option>
                        <option value="mg" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='mg') { echo " selected";}?> >Milligram </option>
                        <option value="pound" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='pound') { echo " selected";}?> >Pound</option>
                        <option value="stone" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='stone') { echo " selected";}?> >Stone</option>
                        <option value="ounce" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='ounce') { echo " selected";}?> >Ounce</option>
                        <option value="microg" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='microg') { echo " selected";}?> >Microgram</option>
                        <option value="tonne" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='tonne') { echo " selected";}?> >Tonne</option>
                        <option value="uston" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='uston') { echo " selected";}?> >US ton</option>
                        <option value="iton" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='iton') { echo " selected";}?> >Imperial ton</option>
                        

                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                        <option value="kg" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='kg') { echo " selected";}?>> kilogram</option>
                        <option value="gram" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='gram') { echo " selected";}?>> Gram</option>
                        <option value="mg" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='mg') { echo " selected";}?> >Milligram </option>
                        <option value="pound" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='pound') { echo " selected";}?> >Pound</option>
                        <option value="stone" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='stone') { echo " selected";}?> >Stone</option>
                        <option value="ounce" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='ounce') { echo " selected";}?> >Ounce</option>
                        <option value="microg" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='microg') { echo " selected";}?> >Microgram</option>
                        <option value="tonne" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='tonne') { echo " selected";}?> >Tonne</option>
                        <option value="uston" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='uston') { echo " selected";}?> >US Ton</option>
                        <option value="iton" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='iton') { echo " selected";}?> >Imperial Ton</option>
                        

                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
