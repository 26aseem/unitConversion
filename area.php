<?php
function convert_to_smetre($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'smetre'){
        return $value;
    }

    else if($from_unit == 'skm'){
        return $value * 1000000;
    }
    
    else if($from_unit == 'smile'){
        return $value * 259000;
    }
    
    else if($from_unit == 'syard'){
        return $value * 1.196;
    }
    
    else if($from_unit == 'sfoot'){
        return $value / 10.764;
    }
    
    else if($from_unit == 'sinch'){
        return $value / 1550.003;
    }
    
    else if($from_unit == 'hectare'){
        return $value * 10000;
    }
    
    else if($from_unit == 'acre'){
        return $value * 4046.856;
    }
    
    else
        return "Unsupported unit";
}



function convert_from_smetre($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'smetre'){
        return $value;
    }

    else if($to_unit == 'skm'){
        return $value / 1000000;
    }
    
    else if($to_unit == 'smile'){
        return $value / 259000;
    }
    
    else if($to_unit == 'syard'){
        return $value / 1.196;
    }
    
    else if($to_unit == 'sfoot'){
        return $value * 10.764;
    }
    
    else if($to_unit == 'sinch'){
        return $value * 1550.003;
    }
    
    else if($to_unit == 'hectare'){
        return $value / 10000;
    }
    
    else if($to_unit == 'acre'){
        return $value / 4046.856;
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
    $to_value = convert_to_smetre($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_smetre($to_unit,convert_to_smetre($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Area</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />    
</head>

    <body>
    <h1> Area Conversion </h1>
        <div id="main-content">
            <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" autofocus value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>"/>
                    <select name="from_unit">
                        <option value="smetre" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='smetre') { echo " selected";}?>> Square metre</option>
                        <option value="skm" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='skm') { echo " selected";}?>> Square kilometre</option>
                        <option value="smile" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='smile') { echo " selected";}?> >Square mile</option>
                        <option value="syard" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='syard') { echo " selected";}?> >Square yard</option>
                        <option value="sfoot" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='sfoot') { echo " selected";}?> >Square foot</option>
                        <option value="sinch" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='sinch') { echo " selected";}?> >Square inch</option>
                        <option value="hectare" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='hectare') { echo " selected";}?> >Hectare</option>
                        <option value="acre" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='acre') { echo " selected";}?> >Acre</option>
                        
                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                    <option value="smetre" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='smetre') { echo " selected";}?>> Square metre</option>
                        <option value="skm" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='skm') { echo " selected";}?>> Square kilometre</option>
                        <option value="smile" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='smile') { echo " selected";}?> >Square mile </option>
                        <option value="syard" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='syard') { echo " selected";}?> >Square yard</option>
                        <option value="sfoot" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='sfoot') { echo " selected";}?> >Square foot</option>
                        <option value="sinch" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='sinch') { echo " selected";}?> >Square inch</option>
                        <option value="hectare" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='hectare') { echo " selected";}?> >Hectare</option>
                        <option value="acre" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='acre') { echo " selected";}?> >Acre</option>
                        
                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
