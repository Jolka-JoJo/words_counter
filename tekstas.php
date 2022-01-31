<?php
    $str="Gyveno kartą Petras. Petras gyveno laimingą gyvenimą. Deja, jis nusprendė programuoti. Dabar Petras turi daug neišspręstų problemų ir mažai nervų ląstelių.";
    str_replace(['.','?','!'], "", $str, $sentence_count);

    $clean_str=str_replace([',', '.', ':', '-'], "", $str);
    $clean_str_array=explode(" ", $clean_str);
    $first_time=0;
    foreach($clean_str_array as $value){
        if(empty($str_words_array[ucfirst($value)])){
            $str_words_array[ucfirst($value)]=1; //ucfirst pirma raide didzioji
            if($first_time==0){
                $makslength=strlen($value);
                $maksword=$value;
            }
                else if($makslength<strlen($value)) {
                    $makslength=strlen($value);
                    $maksword=$value;
                }
        }
        else {
            $str_words_array[ucfirst($value)]++;
            
        }
        $first_time++;
    }
    arsort($str_words_array);
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    
</head>
<body>
    <div class = "top_bar">
        <div class = "top_bar">
            <h1 class = "top_bar_heading">
                <a class = "page_title_link" href="#"> Žodžių skaičiuoklė</a>
            </h1>
            
        </div>
    </div>



    <div>

    <div class= main_text_container>
        <div class = main_text>
            <p><?php echo $str?></p>
        </div>
    </div>

    <div class="conatainer_data_info">
        <div class="data_info">

            <p> Žodžių kiekis tekste: <?php echo str_word_count($str)?></p>
            <p> Sakinių skaičius: <?php echo $sentence_count ?> </p>
            
        </div>

        <div class="data_info">

            <p>Simbolių kiekis tekste: <?php echo strlen($str)?></p>
            <p>Simbolių kiekis tekste be tarpų: <?php echo strlen(str_replace(" ", "", $str))?></p>

        </div>
        <div class="data_info">
            <p> Ilgiausias žodis – „<?php echo $maksword ?>“ (<?php echo $makslength ?> raidžių) </p>
        </div>
    </div>
    
   
        
        
    <div class='table_main_container'>
        <table class='table_main'>
            <tr class='table-heading'>
                <th class='table-heading-cell'> Nr.</th>
                <th class='table-heading-cell'> Žodis</th>
                <th class='table-heading-cell col_data_table_par'> Kiek kartų kartojasi </th>
            </tr>
            
        <?php
        $stop = 0;
        $row = 1;
        foreach(array_keys($str_words_array) as $paramName){

            echo "<tr class='row_data'>";
            echo "<td class='table_main_cell'>".$row."</td>";
            echo "<td class='table_main_cell'>";
            echo $paramName;
            echo "</td>";
            echo "<td class='col_data_table_par table_main_cell'>";
            echo $str_words_array[$paramName];
            echo "</td>"."</tr>";
            $stop++;
            $row++;
            if($stop>9) break;
        }
    ?>

        </table>
    </div>

   

</div>
</body>
</html>