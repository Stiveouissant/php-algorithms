<?php
    $data1 = array("nums" => [100,4,200,1,3,2]);
    $data2 = array("nums" => [0,3,7,2,5,8,4,6,0,1]);
    $data3 = array("nums" => [1,2,3,6,7,8,9,15,16,17,18,19,20]);

    $dataset = [$data1, $data2, $data3];

    function longestConsecutive($nums) {
        $numsHash = [];
        $longestSequence = 0;

        foreach($nums as $num)
            $numsHash[$num] = true;

        foreach($nums as $num)
        {
            $currentLength = 1;
            if(!isset($numsHash[$num-1]))
                while(isset($numsHash[$num+$currentLength]))
                    $currentLength++;
            $longestSequence = 
            $currentLength > $longestSequence 
            ? $currentLength 
            : $longestSequence;
        }
        return $longestSequence;
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
    <title>Longest consecutive sequence</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Longest consecutive sequence</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an unsorted array of integers <code>nums</code>, return <em>the length of the longest consecutive elements sequence.</em></p>
        <p>You must write an algorithm that runs in&nbsp;<code>O(n)</code>&nbsp;time.</p>

        <p>Data:</p>

        <?php 
            displayData($dataset);
        ?>

        <p style="color:red;">For solution please check the <strong><?php echo __FILE__?></strong> file.</p>

        <p>Output:</p>

        <?php 
            $start_time = microtime(true);
            foreach ($dataset as $key => $data) {
                echo "Answer ".($key+1).":<br>";
                var_dump(longestConsecutive($data["nums"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>