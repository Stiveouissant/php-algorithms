<?php
    $data1 = ["anagram", "nagaram"];

    $data2 = ["computer", "tablet"];

    $data3 = ['', ''];

    $dataset = [$data1, $data2, $data3];

    // IS CLEANER CODE BUT SLOWER
    // function isAnagram($string1, $string2) {
    //     if(strlen($string1) != strlen($string2))
    //         return false;
    //     return count_chars($string1) === count_chars($string2);
    // }

    function isAnagram($s, $t) {
        if(strlen($s) != strlen($t))
            return false;
        $s = str_split($s);
        $t = str_split($t);
        
        sort($s);
        sort($t);
        
        return implode('', $s) == implode('', $t);
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
    <title>Check if anagram</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Check if anagram</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given two strings <code>s</code> and <code>t</code>, return <code>true</code> <em>if</em> <code>t</code> <em>is an anagram of</em> <code>s</code><em>, and</em> <code>false</code> <em>otherwise</em>.</p>

        <p>Data:</p> <?php ?>

        <?php 
            displayData($dataset);
        ?>

        <p style="color:red;">For solution please check the <strong><?php echo __FILE__?></strong> file.</p>

        <p>Output:</p>

        <?php 
            $start_time = microtime(true);
            foreach ($dataset as $key => $val) {
                echo "Answer ".($key+1).":<br>";
                var_dump(isAnagram($val[0], $val[1]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>