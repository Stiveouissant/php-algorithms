

<?php
    $data1 = array("nums" => [0,1,0,2,1,0,1,3,2,1,2,1]);
    $data2 = array("nums" => [4,2,0,3,2,5]);

    $dataset = [$data1, $data2];

    function trap($height) {
        $trappedWater = $maxLeft = $maxRight = $left = 0;
        $right = count($height) - 1;
        while($left < $right) {
            if ($height[$left] < $height[$right]) {
                $maxLeft = max($maxLeft, $height[$left]);
                $trappedWater += $maxLeft - $height[$left];
                ++$left;
            }
            else {
                $maxRight = max($maxRight, $height[$right]);
                $trappedWater += $maxRight - $height[$right];
                --$right;
            }
        }
        return $trappedWater;
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
    <title>Trapped water</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Trapped water</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given <code>n</code> non-negative integers representing an elevation map where the width of each bar is <code>1</code>, compute how much water it can trap after raining.</p>

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
                var_dump(trap($data["nums"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>