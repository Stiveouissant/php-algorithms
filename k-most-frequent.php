<?php
    $data1 = array("nums" => [1,1,1,2,2,3], "K" => 2);
    $data2 = array("nums" => [1], "K" => 1);
    $data3 = array("nums" => [5,3,6,7,1,3,5,9,7,3,4,55,5,1], "K" => 3);

    $dataset = [$data1, $data2, $data3];

    function topKFrequent($nums, $k) {
        $output = [];
        $tempArr = [];
        foreach($nums as $val)
        {
            isset($tempArr[$val]) ? $tempArr[$val] += 1 : $tempArr[$val] = 1;
        }
        arsort($tempArr);
        $tempArr = array_keys($tempArr);
        for($i = 0;$i < $k;$i++)
        {
            $output[$i] = $tempArr[$i];
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
    <title>K most frequent elements</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>K most frequent elements</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an integer array <code>nums</code> and an integer <code>k</code>, return <em>the</em> <code>k</code> <em>most frequent elements</em>. You may return the answer in <strong>any order</strong>.</p>

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
                var_dump(topKFrequent($data["nums"], $data["K"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>