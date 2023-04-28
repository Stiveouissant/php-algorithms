<?php
    $data1 = "A man, a plan, a canal: Panama";
    $data2 = "race a car";
    $data3 = " ";

    $dataset = [$data1, $data2, $data3];

    function isPalindrome($s) {
        $s = strtolower($s);
        $s = preg_replace("/[^a-z\d]/", '', $s);
        if($s == strrev($s))
            return true;
        return false;
    }

    //Actual two pointer solution
    
    // function isPalindrome($s) {
    //     $left = 0;
    //     $right = strlen($s) - 1;
    //     while($left < $right){
    //         if(!isAlNum($s[$left])){
    //             $left++;
    //             continue;
    //         }
    //         if(!isAlNum($s[$right])){
    //             $right--;
    //             continue;
    //         }
    //         if(strtolower($s[$left]) != strtolower($s[$right])) {
    //             return false;
    //         }

    //         $left++;
    //         $right--;
    //     }
    //     return true;
    // }

    // function isAlNum($c){
    //     return (ord($c) <= ord('z') && ord('a') <= ord($c)) ||
    //            (ord($c) <= ord('Z') && ord('A') <= ord($c)) ||
    //            (ord($c) <= ord('9') && ord('0') <= ord($c));
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
    <title>Valid Palindrome</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Valid Palindrome</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>A phrase is a <strong>palindrome</strong> if, after converting all uppercase letters into lowercase letters and removing all non-alphanumeric characters, it reads the same forward and backward. Alphanumeric characters include letters and numbers.</p>
        <p>Given a string <code>s</code>, return <code>true</code><em> if it is a <strong>palindrome</strong>, or </em><code>false</code><em> otherwise</em>.</p>

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
                var_dump(isPalindrome($data));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>