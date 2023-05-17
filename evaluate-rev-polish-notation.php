<?php
    $data1 = ["2","1","+","3","*"];

    $data2 = ["4","13","5","/","+"];

    $data3 = ["10","6","9","3","+","-11","*","/","*","17","+","5","+"];

    $dataset = [$data1, $data2, $data3];

    function evalRPN($tokens) {
        $count = -1;
        $stack = [];
        for($i=0;$i<count($tokens);$i++)
        {
            if($tokens[$i] == '+')
            {
                $stack[$count-1] = (int)($stack[$count-1] + array_pop($stack));
                --$count;
                continue;
            }
            if($tokens[$i] == '-')
            {
                $stack[$count-1] = (int)($stack[$count-1] - array_pop($stack));
                --$count;
                continue;
            }
            if($tokens[$i] == '*')
            {
                $stack[$count-1] = (int)($stack[$count-1] * array_pop($stack));
                --$count;
                continue;
            }
            if($tokens[$i] == '/')
            {
                $stack[$count-1] = (int)($stack[$count-1] / array_pop($stack));
                --$count;
                continue;
            }
            $stack[] = (int) $tokens[$i];
            ++$count;
        }
        return $stack[0];
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
    <title>Evaluate Reverse Polish Notation</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Evaluate Reverse Polish Notation</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>You are given an array of strings <code>tokens</code> that represents an arithmetic expression in a <a href="http://en.wikipedia.org/wiki/Reverse_Polish_notation" target="_blank">Reverse Polish Notation</a>.</p>
        <p>Evaluate the expression. Return <em>an integer that represents the value of the expression</em>.</p>
        <p><strong>Note</strong> that:</p>
        <ul>
            <li>The valid operators are <code>'+'</code>, <code>'-'</code>, <code>'*'</code>, and <code>'/'</code>.</li>
            <li>Each operand may be an integer or another expression.</li>
            <li>The division between two integers always <strong>truncates toward zero</strong>.</li>
            <li>There will not be any division by zero.</li>
            <li>The input represents a valid arithmetic expression in a reverse polish notation.</li>
            <li>The answer and all the intermediate calculations can be represented in a <strong>32-bit</strong> integer.</li>
        </ul>

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
                var_dump(evalRPN($val));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>