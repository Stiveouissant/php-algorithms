<?php
    $data1 = array("s" => "ABAB", "k" => 2);
    $data2 = array("s" => "AABABBA", "k" => 1);

    $dataset = [$data1, $data2];

    function characterReplacement($s, $k) {
        $characersCount = [];
        $longestSubstring = 0;
        $left  = 0;
        $right = 0;
        $stringlength = strlen($s);

        while($right < $stringlength){

            if(isset($characersCount[ $s[$right] ])) 
              $characersCount[ $s[$right] ]++;
            else 
              $characersCount[ $s[$right] ] = 1 ;

            $windowLength = $right - $left;

            if($windowLength + 1 - max(array_values($characersCount)) <= $k)
                $longestSubstring = $windowLength;
            else{
                $characersCount[ $s[$left] ]--;
                $left++; 
            }

            $longestSubstring = max($longestSubstring, $right - $left + 1);
            $right++;
        }

        return $longestSubstring;
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
    <title>Longest consecutive character with replacements</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Longest consecutive character with replacements</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>You are given a string <code>s</code> and an integer <code>k</code>. You can choose any character of the string and change it to any other uppercase English character. You can perform this operation at most <code>k</code> times.</p>
        <p>Return <em>the length of the longest substring containing the same letter you can get after performing the above operations</em>.</p>

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
                var_dump(characterReplacement($data["s"], $data["k"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>