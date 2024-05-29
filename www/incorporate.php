<?php
    $timenum = intval($_GET['value']);
    $memnum = intval($_GET['memory']);
    $num = intval($_GET["cpu"]);

    if ($timenum < 1) {
        $timenum = intval($_POST['value']);
    }
   
    if ($memnum < 1) {
        $memnum = intval($_POST['memory']);
    }

    if ($num < 1) {
        $num = intval($_POST['cpu']);
    }

    if($num < 1) {
        $num = 1;
    }

    if($timenum < 0) {
        $timenum = 0;
    }

    if($memnum < 1) {
        $memnum = 1;
    }

    //$low = $num;
    //if($low < 1) {
    //    $low = 1;
    //}

    echo "<html>";
    echo "<head> <title> CPU Test </title> </head>";
    echo "<body> <p> <center>";
    echo "<h2> CPU Test by calculating MD5 of numbers. </h2>";
    echo "<head> <title> Memory Test </title> </head>";
    echo "<body> <p> <center>";
    echo "<h2> Memory Test by constructing a big string </h2>";
    
    $maxnum = 4096;
    if($memnum > $maxnum) {
        echo "memory usage limit: [1--$maxnum]MB. <br>";
        $memnum = $maxnum;
    }
    
    $rnum = $timenum;
    if($timenum > 1) {
        $rnum = rand($timenum, $ntimenumm+3);
    }
    $rmemnum = $memnum *1024*1024;
    echo "sleep $rnum ms, with $memnum MB memory. <br>";
    $base = str_repeat("helloworldhelloworld", 100);
    $base10w = str_repeat($base, 50);
    $base1m = str_repeat($base10w, 10);
    $bigmem = str_repeat($base1m, $rmemnum/(1000*1000.0));
    $usedMem = round(memory_get_usage()/(1024*1024.0), 2);
    echo "memory used 1: <b> $usedMem MB </b>.";
    usleep(1000*$rnum);
    unset($bigmem);
    echo "<br><br>free memory...<br><br>";
    $usedMem = round(memory_get_usage()/(1024*1024.0), 2);
    // echo "memory used 2: <b> $usedMem MB </b>.";


    // $rnum = rand($low, $num) * 1000;
    $rnumm = $num * 1000;
    echo "computation amount: $rnumm <br>";

    $begin = microtime(true);
    for($i=0; $i < $rnumm; $i ++) {
        md5($i);
    }
    $duration = intval((microtime(true) - $begin)*1000);

    echo "used $duration ms. \n";

    echo "</center> </p>";
    include 'footer.php';
    echo "</body></html>";
?>
