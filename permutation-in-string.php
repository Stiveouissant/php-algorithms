<?php
    $data1 = array("s1" => "ab", "s2" => "eidbaooo");
    $data2 = array("s1" => "ab", "s2" => "eidboaoo");

    $dataset = [$data1, $data2];

    function checkInclusion($s1, $s2) {
        if($s1 == $s2)
            return true;

        $s1L = strlen($s1);
        $s2L = strlen($s2);

        if($s1L>$s2L)
            return false;

        $s1Hash = $s2Hash = array_fill(0, 26, 0);
        //initialise alfabet as "a" -> 0, "b" -> 1 ...
        $alphabet = array_flip(range('a', 'z'));
        
        //count characters in s1 as hashmap
        foreach(str_split($s1) as $key => $val) {
            $s1Hash[$alphabet[$s1[$key]]]++;
        }

        //if letter count in the hashmap window is the same s1 can be included
        for ($i = 0; $i < $s2L; $i++) {
            $s2Hash[$alphabet[$s2[$i]]]++;

            if ($s1L <= $i) 
                $s2Hash[$alphabet[$s2[$i-$s1L]]]--;
            
            if ($s2Hash === $s1Hash) 
                return true;
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
    <title>Permutation in a string</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Permutation in a string</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given two strings <code>s1</code> and <code>s2</code>, return <code>true</code><em> if </em><code>s2</code><em> contains a permutation of </em><code>s1</code><em>, or </em><code>false</code><em> otherwise</em>.</p>
        <p>In other words, return <code>true</code> if one of <code>s1</code>'s permutations is the substring of <code>s2</code>.</p>

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
                var_dump(checkInclusion($data["s1"], $data["s2"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>