<?php
    $data1 = array("s" => "ADOBECODEBANC", "t" => "ABC");
    $data2 = array("s" => "a", "t" => "a");

    $dataset = [$data1, $data2];

    function minWindow($s, $t) {
        $sLength = strlen($s);
        if(strlen($t) > $sLength)
            return "";
        if($s === $t)
            return $s;  
        $tHashCount=[];
        for($i=0;$i<strlen($t);++$i){
            if(isset($tHashCount[$t[$i]]))
                ++$tHashCount[$t[$i]];
            else
                $tHashCount[$t[$i]]=1;    
        }
        $window=[];
        foreach($tHashCount as $key=>$val)
            $window[$key] = 0;
        $have = 0;
        $need = sizeof($tHashCount);
        $l=0;
        $r=0;
        $res = [0,PHP_INT_MAX];
        while($r<$sLength)
        {
            $char = $s[$r];
            if(isset($window[$char]))
                ++$window[$char];
            else
                $window[$char] = 1;
            if(isset($tHashCount[$char])
               && $window[$char] == $tHashCount[$char])
                $have++;
            while($have == $need && $l<=$r){
                $substrLength = $r - $l + 1;
                if($substrLength < $res[1]){
                     $res[0] = $l;
                     $res[1] = $substrLength;
                }
                --$window[$s[$l]];
                if(isset($window[$s[$l]]) && isset($tHashCount[$s[$l]])
                && ($window[$s[$l]] < $tHashCount[$s[$l]]))
                    --$have;
                ++$l;
            }
            ++$r;
        }
        return $res[1] == PHP_INT_MAX ? "" : substr($s, $res[0], $res[1]); 
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
    <title>Minimum Window Substring</title>
    <meta name="description" content="solving php algorithmic problems in PHP">
    <meta name="keywords" content="php, algorithms, solving">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
    <div class="container">

        <header>
            <h1>Minimum Window Substring</h1>
        </header>
		
        <div class="nav">
            <a href="index.php"><p> Back to the list</p></a>
        </div>

        <p>Given two strings <code>s</code> and <code>t</code> of lengths <code>m</code> and <code>n</code> respectively, return <em>the <strong>minimum window</strong></em> <span data-keyword="substring-nonempty" class=" cursor-pointer relative text-dark-blue-s text-sm"><div class="popover-wrapper inline-block" data-headlessui-state=""><div><div id="headlessui-popover-button-:rk:" aria-expanded="false" data-headlessui-state=""><strong><em>substring</em></strong></div></div></div></span><em> of </em><code>s</code><em> such that every character in </em><code>t</code><em> (<strong>including duplicates</strong>) is included in the window</em>. If there is no such substring, return <em>the empty string </em><code>""</code>.</p>



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
                var_dump(minWindow($data["s"], $data["t"]));
                echo "<br>";
            }
            $execution_time = (microtime(true) - $start_time) * 1000;
            echo "<br>Execution time of the script = ".$execution_time." ms";
        ?>
    </div>
</body>
</html>