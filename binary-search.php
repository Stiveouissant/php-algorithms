<?php
    $data1 = ["nums" => [-1,0,3,5,9,12], "target" => 9];

    $data2 = ["nums" => [-1,0,3,5,9,12], "target" => 2];

    $dataset = [$data1, $data2];

    function search($nums, $target) {
        $numsCount = count($nums);
        $half = (int)($numsCount/2);
        $output = -1;
        if($nums[$half]==$target)
            return $half;
        if($nums[$half]<$target)
        {
            for($i=$half;$i<$numsCount;$i++)
                if($nums[$i] == $target)
                    $output = $i;
        }else{
            for($i=0;$i<$half;$i++)
                if($nums[$i] == $target)
                    $output = $i;
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
    <title>Binary Search</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Binary Search</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an array of integers <code>nums</code> which is sorted in ascending order, and an integer <code>target</code>, write a function to search <code>target</code> in <code>nums</code>. If <code>target</code> exists, then return its index. Otherwise, return <code>-1</code>.</p>
        <p>You must write an algorithm with <code>O(log n)</code> runtime complexity.</p>

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
                var_dump(search($val["nums"], $val["target"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>