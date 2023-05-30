<?php
    $data1 = array("matrix" => [[1,3,5,7],[10,11,16,20],[23,30,34,60]], "target" => 3);
    $data2 = array("matrix" => [[1,3,5,7],[10,11,16,20],[23,30,34,60]], "target" => 13);
    $data3 = array("matrix" => [[1]], "target" => 1);

    $dataset = [$data1, $data2, $data3];

    function searchMatrix($matrix, $target) {
        foreach($matrix[0] as $val)
            if($val==$target)
                return true;
        if(!isset($matrix[1]))
            return false;

        for($i=1;$i<count(array_keys($matrix));$i++)
        {
            if($target>$matrix[$i][0])
                continue;

            if($target==$matrix[$i][0])
                return true;

            if($target<$matrix[$i][0])
                for($j=0;$j<count($matrix[$i-1]);$j++)
                    if($target==$matrix[$i-1][$j])
                        return true;
        }
        foreach($matrix[count(array_keys($matrix))-1] as $val)
            if($val==$target)
                return true;
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
    <title>2D matrix binary serach</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>2D matrix binary serach</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>You are given an <code>m x n</code> integer matrix <code>matrix</code> with the following two properties:</p>

        <ul>
            <li>Each row is sorted in non-decreasing order.</li>
            <li>The first integer of each row is greater than the last integer of the previous row.</li>
        </ul>

        <p>Given an integer <code>target</code>, return <code>true</code> <em>if</em> <code>target</code> <em>is in</em> <code>matrix</code> <em>or</em> <code>false</code> <em>otherwise</em>.</p>

        <p>You must write a solution in <code>O(log(m * n))</code> time complexity.</p>

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
                var_dump(searchMatrix($data["matrix"], $data["target"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>