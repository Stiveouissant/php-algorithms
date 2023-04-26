<?php
    $data1 = array("nums" => [1,2,3,4]);
    $data2 = array("nums" => [-1,1,0,-3,3]);
    $data3 = array("nums" => [2,4,6,8]);

    $dataset = [$data1, $data2, $data3];

    function productExceptSelf($nums) {
        $output = array_fill(0, count($nums), 1);

        $prefix = 1;
        for($i = 0; $i < count($nums); $i++){
          $output[$i] = $prefix;
          $prefix *= $nums[$i];
        }

        $suffix = 1;
        for($i = (count($nums) - 1); $i > -1; $i--){
          $output[$i] *= $suffix;
          $suffix *= $nums[$i];
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
    <title>Product of array except self</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Product of array except self</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an integer array <code>nums</code>, return <em>an array</em> <code>answer</code> <em>such that</em> <code>answer[i]</code> <em>is equal to the product of all the elements of</em> <code>nums</code> <em>except</em> <code>nums[i]</code>.</p>
        <p>The product of any prefix or suffix of <code>nums</code> is <strong>guaranteed</strong> to fit in a <strong>32-bit</strong> integer.</p>
        <p>You must write an algorithm that runs in&nbsp;<code>O(n)</code>&nbsp;time and without using the division operation.</p>

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
                var_dump(productExceptSelf($data["nums"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>