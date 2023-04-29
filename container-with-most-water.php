<?php
    $data1 = array("nums" => [1,8,6,2,5,4,8,3,7]);
    $data2 = array("nums" => [1,1]);
    $data3 = array("nums" => [1,0,12,13,6,2,7,25,1,4,6,9,23,1]);

    $dataset = [$data1, $data2, $data3];

    function maxArea($height) {
        $left = 0;
        $right = count($height) - 1;
        $topArea = 0;

        while($left<$right)
        {
            if($height[$left]>$height[$right])
            {
                $topArea = max($topArea, ($height[$right] * ($right-$left)));
                $right--;
            }else{
                $topArea = max($topArea, ($height[$left] * ($right-$left)));
                $left++;
            }
        }
        return $topArea;
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
    <title>Container with most water</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Container with most water</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>You are given an integer array <code>height</code> of length <code>n</code>. There are <code>n</code> vertical lines drawn such that the two endpoints of the <code>i<sup>th</sup></code> line are <code>(i, 0)</code> and <code>(i, height[i])</code>.</p>

        <p>Find two lines that together with the x-axis form a container, such that the container contains the most water.</p>

        <p>Return <em>the maximum amount of water a container can store</em>.</p>

        <p><strong>Notice</strong> that you may not slant the container.</p>

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
                var_dump(maxArea($data["nums"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>