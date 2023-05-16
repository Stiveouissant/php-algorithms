<?php
    $data1 = "()";
    $data2 = "()[]{}";
    $data3 = "(]";

    $dataset = [$data1, $data2, $data3];

    function isValid($s) {        
        $stringLength = strlen($s);
        if($stringLength % 2 == 1)
            return false;
        $respondingCharacters = [
            '(' => ')',
            '{' => '}',
            '[' => ']'
        ];
        $stack = [];
        for($i=0;$i<$stringLength;$i++)
        {
            $char = $s[$i];
            if(isset($respondingCharacters[$char]))
            {
                $stack[] = $respondingCharacters[$char];
                continue;
            }
            if(array_pop($stack) != $char)
                return false;
        }
        return empty($stack);
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
    <title>Valid Palindrome</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Valid Parentheses</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given a string <code>s</code> containing just the characters <code>'('</code>, <code>')'</code>, <code>'{'</code>, <code>'}'</code>, <code>'['</code> and <code>']'</code>, determine if the input string is valid.</p>
        <p>An input string is valid if:</p>
        <ol>
            <li>Open brackets must be closed by the same type of brackets.</li>
            <li>Open brackets must be closed in the correct order.</li>
            <li>Every close bracket has a corresponding open bracket of the same type.</li>
        </ol>

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
                var_dump(isValid($data));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>