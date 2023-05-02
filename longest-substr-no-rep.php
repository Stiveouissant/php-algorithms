<?php
    $data1 = array("nums" => "abcabcbb");
    $data2 = array("nums" => "bbbbb");
    $data3 = array("nums" => "pwwkew");

    $dataset = [$data1, $data2, $data3];

    // My solution
    // function lengthOfLongestSubstring($s) {
    //     $slength = strlen($s);
    //     if($slength==0)
    //         return 0;
    //     $output = 1;

    //     for($i = 0;$i<$slength;$i++)
    //     {
    //         $pointer = $i + 1;

    //         if($pointer>=$slength)
    //             continue;

    //         $mem = [$s[$i] => true];

    //         while($pointer<$slength && !isset($mem[$s[$pointer]]))
    //         {
    //             $step = $pointer - $i + 1;
    //             if($output < $step)
    //                 $output = $step;
    //             $mem[$s[$pointer]] = true;
    //             ++$pointer;
    //         }
    //     }
    //     return $output;
    // }

    function lengthOfLongestSubstring($s) {
        $leftPointer=0;
        $ansArr=[];
        $max=0;
        for($i=0;$i<strlen($s);$i++)
        {  
            if(isset($ansArr[$s[$i]]) && $leftPointer<($ansArr[$s[$i]]+1)){
               $leftPointer=$ansArr[$s[$i]]+1;
            }
            $ansArr[$s[$i]]=$i;
            $max = max($max, $i - $leftPointer+1);
        }
        return $max;
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
    <title>Longest consecutive sequence of substring</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Longest consecutive sequence of substring</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given a string <code>s</code>, find the length of the <strong>longest</strong> <span data-keyword="substring-nonempty" class=" cursor-pointer relative text-dark-blue-s text-sm"><div class="popover-wrapper inline-block" data-headlessui-state=""><div><div id="headlessui-popover-button-:rs:" aria-expanded="false" data-headlessui-state=""><strong>substring</strong></div></div></div></span> without repeating characters.</p>

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
                var_dump(lengthOfLongestSubstring($data["nums"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>