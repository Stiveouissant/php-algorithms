<?php
    $data1 = ["lint","code","love","you"];
    $data2 = ["oli","B","to","dzrzwi"];
    $data3 = [";","12vv1",":::ADS:>>B","12)%(!)^!@*%^"];

    $dataset = [$data1, $data2, $data3];

    function encode($strs) {
        $output = "";
        foreach($strs as $str)
        {
            $output .= (string)strlen($str)."#".$str;
        }
        return $output;
    }

    function decode($str) {
        $output = [];
        for($i=0;$i<strlen($str); )
        {
            $length = "";
            $j = $i;
            while($str[$j] != "#")
            {
                $length .= $str[$j];
                $j++;
            }
            $output[] = substr($str, $j + 1, (int)$length);
            $i = $j + 1 + (int)$length;
        }
        return $output;
    }

    function codec($strs)
    {
        $a = encode($strs);
        var_dump($a);
        return decode($a);

    }

    function displayData($data)
    {
        foreach($data as $val)
        {
            print_r($val);
            echo "<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <title>Codec Strings</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Codec Strings</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Design an algorithm to encode a list of strings to a string. The encoded string is then sent over the network and is decoded back to the original list of strings.
        <br>
        Please implement encode and decode</p>

        <p>Data:</p>

        <?php 
            displayData($dataset);
        ?>

        <p style="color:red;">For solution please check the <strong><?php echo __FILE__?></strong> file.</p>

        <p>Output:</p>

        <?php 
            $start_time = microtime(true);
            foreach($dataset as $key => $data)
            {
                echo "Answer ".($key+1).":<br>";
                var_dump(codec($data));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>