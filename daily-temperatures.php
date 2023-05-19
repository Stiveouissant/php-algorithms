<?php
    $data1 = array("temperatures" => [73,74,75,71,69,72,76,73]);
    $data2 = array("temperatures" => [30,40,50,60]);
    $data3 = array("temperatures" => [30,60,90]);

    $dataset = [$data1, $data2, $data3];

    function dailyTemperatures($temperatures) {
        $output = $stack = [];
        foreach($temperatures as $currentDay => $currentTemperature)
        {
            while(!empty($stack) 
            && $currentTemperature > $temperatures[end($stack)])
                $output[end($stack)] = $currentDay - array_pop($stack);
            $output[$currentDay] = 0;
            $stack[] = $currentDay;
        }
        return $output;
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
    <title>Daily temperatures</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Daily temperatures</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an array of integers <code>temperatures</code> represents the daily temperatures, return <em>an array</em> <code>answer</code> <em>such that</em> <code>answer[i]</code> <em>is the number of days you have to wait after the</em> <code>i<sup>th</sup></code> <em>day to get a warmer temperature</em>. If there is no future day for which this is possible, keep <code>answer[i] == 0</code> instead.</p>

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
                var_dump(dailyTemperatures($data["temperatures"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>