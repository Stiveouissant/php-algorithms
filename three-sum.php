

    <?php
    $data1 = array("nums" => [-1,0,1,2,-1,-4]);
    $data2 = array("nums" => [0,1,1]);
    $data3 = array("nums" => [0,0,0]);

    $dataset = [$data1, $data2, $data3];

    function threeSum($nums) {
        sort($nums);
        $output = [];
        $numCount = count($nums);

        foreach($nums as $key => $val){
            if($key > 0 && $val === $nums[$key-1]){
                continue;
            }

            $left = $key +1;
            $right = $numCount -1;

            while($left < $right){
                $sum = $val + $nums[$left] + $nums[$right];

                if($sum > 0)
                    $right--;

                if($sum < 0)
                    $left++;

                if($sum == 0)
                {
                    $output[] = [$val, $nums[$left], $nums[$right]];
                    $left++;
                    while($nums[$left] == $nums[$left-1] && $left<$right){
                        $left++;
                    }
                }
            }
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
    <title>Three Sum</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Three Sum</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an integer array nums, return all the triplets <code>[nums[i], nums[j], nums[k]]</code> such that <code>i != j</code>, <code>i != k</code>, and <code>j != k</code>, and <code>nums[i] + nums[j] + nums[k] == 0</code>.</p>

        <p>Notice that the solution set must not contain duplicate triplets.</p>

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
                var_dump(threeSum($data["nums"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>