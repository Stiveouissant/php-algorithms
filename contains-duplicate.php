<?php
    $data1 = [1,2,3,1];
    $data2 = [1,2,3,4];
    $data3 = [1,1,1,3,3,4,3,2,4,2];

    $dataset = [$data1, $data2, $data3];

    // OLD SOLUTION - HAS WORSE PERFORMANCE
    // function containsDuplicate($nums) {
    //     $count = array_count_values($nums);

    //     foreach($nums as $num){
    //         if($count[$num] > 1){
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    function containsDuplicate($nums) {
        $savedValues = [];

        foreach($nums as $val)
        {
            if(isset($savedValues[$val]))
                return true;
            $savedValues[$val] = true;
        }
        return false;
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
    <title>Contains Duplicate</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Contains Duplicate</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given an integer array <code>nums</code>, return <code>true</code> if any value appears <strong>at least twice</strong> in the array, and return <code>false</code> if every element is distinct.</p>

        <p>Data:</p> <?php ?>

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
                var_dump(containsDuplicate($data));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>