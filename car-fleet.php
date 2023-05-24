<?php
    $data1 = ["target" => 12, "position" => [10,8,0,5,3], "speed" => [2,4,1,1,3]];
    $data2 = ["target" => 10, "position" => [3], "speed" => [3]];
    $data3 = ["target" => 100, "position" => [0,2,4], "speed" => [4,2,1]];

    $dataset = [$data1, $data2, $data3];

    function carFleet($target, $position, $speed) {
        if(count($position) == 1)
            return 1;
        $stack = [];
        $posSpeedPairs = [];
        foreach($position as $key => $val)
            $posSpeedPairs[$key] = array($val, $speed[$key]);
        arsort($posSpeedPairs);
        foreach($posSpeedPairs as $val)
        {
            $stack[] = ($target - $val[0]) / $val[1];
            $stackCount = count($stack);
            if($stackCount >= 2 
            && $stack[$stackCount-1] <= $stack[$stackCount-2])
                array_pop($stack);
        }
        return count($stack);
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
    <title>Car fleet</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Car fleet</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>There are <code>n</code> cars going to the same destination along a one-lane road. The destination is <code>target</code> miles away.</p>
        <p>You are given two integer array <code>position</code> and <code>speed</code>, both of length <code>n</code>, where <code>position[i]</code> is the position of the <code>i<sup>th</sup></code> car and <code>speed[i]</code> is the speed of the <code>i<sup>th</sup></code> car (in miles per hour).</p>
        <p>A car can never pass another car ahead of it, but it can catch up to it&nbsp;and drive bumper to bumper <strong>at the same speed</strong>. The faster car will <strong>slow down</strong> to match the slower car's speed. The distance between these two cars is ignored (i.e., they are assumed to have the same position).</p>
        <p>A <strong>car fleet</strong> is some non-empty set of cars driving at the same position and same speed. Note that a single car is also a car fleet.</p>
        <p>If a car catches up to a car fleet right at the destination point, it will still be considered as one car fleet.</p>
        <p>Return <em>the <strong>number of car fleets</strong> that will arrive at the destination</em>.</p>

        <p>Data:</p>

        <?php 
            displayData($dataset);
        ?>

        <p style="color:red;">For solution please check the <strong><?php echo __FILE__?></strong> file.</p>

        <p>Output:</p>

        <?php 
            $start_time = microtime(true);
            foreach ($dataset as $key => $val) {
                echo "Answer ".($key+1).":<br>";
                var_dump(carFleet($val["target"], $val["position"], $val["speed"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>