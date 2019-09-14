<?php
function convert_to_litres($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'cmetre'){
        return $value * 1000;
    }

    else if($from_unit == 'litre'){
        return $value;
    }
    
    else if($from_unit == 'mlitre'){
        return $value / 1000;
    }
    
    else if($from_unit == 'cfoot'){
        return $value * 28.317;
    }
    
    else if($from_unit == 'cinch'){
        return $value / 61.024;
    }
    
    else if($from_unit == 'igallon'){
        return $value * 4.546;
    }
    
    else if($from_unit == 'iquart'){
        return $value * 1.137;
    }
    
    else if($from_unit == 'ipint'){
        return $value / 1.76;
    }
    
    else if($from_unit == 'usgallon'){
        return $value * 3.785;
    }
    
    else if($from_unit == 'usquart'){
        return $value / 1.057;
    }

    else if($from_unit == 'uspint'){
        return $value / 2.113;
    }
    
    else
        return "Unsupported unit";
}



function convert_from_litres($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'cmetre'){
        return $value / 1000;
    }

    else if($to_unit == 'litre'){
        return $value;
    }
    
    else if($to_unit == 'mlitre'){
        return $value * 1000;
    }
    
    else if($to_unit == 'cfoot'){
        return $value / 28.317;
    }
    
    else if($to_unit == 'cinch'){
        return $value * 61.024;
    }
    
    else if($to_unit == 'igallon'){
        return $value / 4.546;
    }
    
    else if($to_unit == 'iquart'){
        return $value / 1.137;
    }
    
    else if($to_unit == 'ipint'){
        return $value * 1.76;
    }
    
    else if($to_unit == 'usgallon'){
        return $value / 3.785;
    }
    
    else if($to_unit == 'usquart'){
        return $value * 1.057;
    }

    else if($to_unit == 'uspint'){
        return $value * 2.113;
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
    $to_value = convert_to_litres($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_litres($to_unit,convert_to_litres($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Volume</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />
    </head>

    <body>
    <h1> Volume Conversion </h1>
        <div id="main-content">
                <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="cmetre" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='cmetre') { echo " selected";}?>> Cubic metre</option>
                        <option value="litre" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='litre') { echo " selected";}?>> Litre</option>
                        <option value="mlitre" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='mlitre') { echo " selected";}?> >Millilitre </option>
                        <option value="cfoot" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='cfoot') { echo " selected";}?> >Cubic foot</option>
                        <option value="cinch" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='cinch') { echo " selected";}?> >Cubic inch</option>
                        <option value="igallon" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='igallon') { echo " selected";}?> >Imperial gallon</option>
                        <option value="iquart" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='iquart') { echo " selected";}?> >Imperial quart</option>
                        <option value="ipint" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='ipint') { echo " selected";}?> >Imperial pint</option>
                        <option value="usgallon" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='usgallon') { echo " selected";}?> >US liquid gallon</option>
                        <option value="usquart" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='usquart') { echo " selected";}?> >US liquid quart</option>
                        <option value="uspint" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='uspint') { echo " selected";}?> >US liquid pint</option>
                        

                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                        <option value="cmetre" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='cmetre') { echo " selected";}?>> Cubic metre</option>
                        <option value="litre" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='litre') { echo " selected";}?>> Litre</option>
                        <option value="mlitre" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='mlitre') { echo " selected";}?> >Millilitre </option>
                        <option value="cfoot" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='cfoot') { echo " selected";}?> >Cubic foot</option>
                        <option value="cinch" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='cinch') { echo " selected";}?> >Cubic inch</option>
                        <option value="igallon" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='igallon') { echo " selected";}?> >Imperial gallon</option>
                        <option value="iquart" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='iquart') { echo " selected";}?> >Imperial quart</option>
                        <option value="ipint" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='ipint') { echo " selected";}?> >Imperial pint</option>
                        <option value="usgallon" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='usgallon') { echo " selected";}?> >US liquid gallon</option>
                        <option value="usquart" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='usquart') { echo " selected";}?> >US liquid quart</option>
                        <option value="uspint" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='uspint') { echo " selected";}?> >US liquid pint</option>
                            
                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
