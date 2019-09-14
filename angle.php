<?php
function convert_to_degree($from_unit,$value){
    if($value==0){
        return 0;
    }
    if($from_unit == 'degree'){
        return $value;
    }

    else if($from_unit == 'radian'){
        return $value*180/pi();
    }
    
    else if($from_unit == 'gradian'){
        return $value*180/200;
    }
    
    else if($from_unit == 'mradian'){
        return $value*180/(1000*pi());
    }

    else if($from_unit == 'minarc'){
        return $value / 60;
    }
    
    else if($from_unit == 'secarc'){
        return $value / 3600;
    }
        
    else
        return "Unsupported unit";
    }



function convert_from_degree($to_unit,$value){
    if($value==0){
        return 0;
    }
    if($to_unit == 'degree'){
        return $value;
    }

    else if($to_unit == 'radian'){
        return $value/180*pi();
    }
    
    else if($to_unit == 'gradian'){
        return $value/180*200;
    }
    
    else if($to_unit == 'mradian'){
        return $value*(1000*pi())/180;
    }

    else if($to_unit == 'minarc'){
        return $value * 60;
    }
    
    else if($to_unit == 'secarc'){
        return $value * 3600;
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
    $to_value = convert_to_degree($from_unit, 0);
}

if(isset($_REQUEST['submit']) && $_REQUEST['from_unit']!=""){
    $from_value = $_REQUEST['from_value'];
    $from_unit = $_REQUEST['from_unit'];
    $to_unit = $_REQUEST['to_unit'];

    $to_value = convert_from_degree($to_unit,convert_to_degree($from_unit, $from_value));
}


?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Convert Plane Angle</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="images/title.png" />    
    </head>

    <body>
    <h1> Plane Angle Conversion </h1>
        <div id="main-content">
            <form action="" method="post">

                <div class="entry">
                    <label>From:</label>
                    <input type="number" step="any" name="from_value" value="<?php echo $from_value; if(isset($_REQUEST['submit']) && $_REQUEST['from_value']==""){ echo 0;}?>" autofocus/>
                    <select name="from_unit">
                        <option value="degree" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST["from_unit"]=='degree') { echo " selected";}?>> Degree </option>
                        <option value="radian" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='radian') { echo " selected";}?>> Radian</option>
                        <option value="mradian" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='mradian') { echo " selected";}?> >Milliradian </option>
                        <option value="gradian" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='gradian') { echo " selected";}?> >Gradian</option>
                        <option value="minarc" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='minarc') { echo " selected";}?> >Minute of arc </option>
                        <option value="secarc" <?php  if(isset($_REQUEST["from_unit"]) && $_REQUEST['from_unit']=='secarc') { echo " selected";}?> >Second of arc</option>
                        

                    </select>
                </div>

                <div class="entry">
                    <label>To:</label>
                    <input type="number" step="any" name="to_value" value="<?php echo $to_value; ?>"/>
                    <select name="to_unit">
                        <option value="degree" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST["to_unit"]=='degree') { echo " selected";}?>> Degree </option>
                        <option value="radian" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='radian') { echo " selected";}?>> Radian</option>
                        <option value="mradian" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='mradian') { echo " selected";}?> >Milliradian </option>
                        <option value="gradian" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='gradian') { echo " selected";}?> >Gradian</option>
                        <option value="minarc" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='minarc') { echo " selected";}?> >Minute of arc </option>
                        <option value="secarc" <?php  if(isset($_REQUEST["to_unit"]) && $_REQUEST['to_unit']=='secarc') { echo " selected";}?> >Second of arc</option>
                        

                    </select>

                 </div>

                 <input type="submit" name="submit" value="Submit"/>

                </form>

                <br>
                <a href="index.html">Return to menu</a>
          
            </div>
    </body>
</html>
