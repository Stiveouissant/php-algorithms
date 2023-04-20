<?php
    $data1 = array("nums" => [2,7,11,15], "target" => 9);
    $data2 = array("nums" => [3,2,4], "target" => 6);
    $data3 = array("nums" => [3,3], "target" => 6);

    $dataset = [$data1, $data2, $data3];

    function twoSum($nums, $target) {
        foreach($nums as $key => $val)
        {
            for($i = ($key + 1); $i<count($nums); $i++)
            {
                if(($nums[$key]+$nums[$i]) == $target)
                    return array(0 => $key, 1 => $i);
            }
        }
    }

    // HashMap solution, actually slower for small arrays
    // function twoSum($nums, $target) {
    //     $hashMap = [];
    //     $count = count($nums);
    //     for($i=0;$i<$count;$i++){
    //             $secondIndex = $target-$nums[$i];
    //             if(isset($hashMap[$secondIndex])){
    //                 return array($i,$hashMap[$secondIndex]);
    //             }else{
    //                 $hashMap[$nums[$i]]=$i;
    //             }
    //     }
    //     return [];
    // }

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
    <title>Sum to target</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Sum to target</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

            You may assume that each input would have exactly one solution, and you may not use the same element twice.

            You can return the answer in any order.</p>

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
                var_dump(twoSum($data["nums"], $data["target"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>