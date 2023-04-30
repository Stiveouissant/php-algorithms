<?php
    $data1 = [7,1,5,3,6,4];

    $data2 = [7,6,4,3,1];

    $data3 = [2,3,4,5,6,7,8];

    $dataset = [$data1, $data2, $data3];

    function maxProfit($prices) {
        $output = $left = $right = 0;
        $pricesCount = count($prices);
        while($right<$pricesCount)
        {
            if($prices[$left]<$prices[$right])
                $output = max($output, $prices[$right]-$prices[$left]);
            else
                $left = $right;

            $right++;
        }
        return $output;

    }

    //more speed but more memory
    function maxProfit2($prices) {
        $min = $prices[0];
        $max = 0;

        foreach($prices as $val){
            if($min>$val)
                $min = $val;

            $gain = $val - $min;

            if($max<($gain))
                $max = $gain;
        }
        return $max;
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
    <title>Best time to sell stock</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Best time to sell stock</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>You are given an array <code>prices</code> where <code>prices[i]</code> is the price of a given stock on the <code>i<sup>th</sup></code> day.</p>

        <p>You want to maximize your profit by choosing a <strong>single day</strong> to buy one stock and choosing a <strong>different day in the future</strong> to sell that stock.</p>

        <p>Return <em>the maximum profit you can achieve from this transaction</em>. If you cannot achieve any profit, return <code>0</code>.</p>

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
                var_dump(maxProfit2($val));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>