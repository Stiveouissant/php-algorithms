<?php
    $data1 = array("nums" => [1,3,-1,-3,5,3,6,7], "k" => 3);
    $data2 = array("nums" => [1], "k" => 1);
    $data3 = array("nums" => [3,3,-3,1,25,2,35,1,53,1,25], "k" => 3);

    $dataset = [$data1, $data2, $data3];

    function maxSlidingWindow($nums, $k) {
        $count = count($nums);    
        $left=0;
        $arr = [];
        $queue = new SplQueue();

        for($right=0; $right<$count; $right++){
         
            while (!$queue->isEmpty() && $nums[$right] > $queue->top())
			    $queue->pop();
		 
            $queue->push($nums[$right]);
            
            if($right-$left+1==$k){
                $arr[] = $queue->bottom();
               
                if($nums[$left] == $queue->bottom())
                   $queue->shift();
               
                $left++;
            }
        }
        return $arr;
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
    <title>Sliding Window Maximum</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Sliding Window Maximum</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>You are given an array of integers&nbsp;<code>nums</code>, there is a sliding window of size <code>k</code> which is moving from the very left of the array to the very right. You can only see the <code>k</code> numbers in the window. Each time the sliding window moves right by one position.</p>

        <p>Return <em>the max sliding window</em>.</p>

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
                var_dump(maxSlidingWindow($data["nums"], $data["k"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>