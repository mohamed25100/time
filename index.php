<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Time convert</title>
</head>

<body class="bg-secondary bg-gradient min-vh-100">
 <main class="mx-4 py-3">
    <p>examples:</p>
    <?php
    function istrue($a,$b,$c,$d)
    {
        return $a ? "$b $c, ":false;
    }
    function isittrue($a,$b,$c)
    {
        return $a ? "$b $c":false;
    }
    function goku($n): int
    {
        $counter = 0;
        while ($n >= 60) {
            $n = $n - 60;
            $counter += 1;
        }
        return $counter;
    }

    function gon($h_only): int
    {
        $counter = 0;
        while ($h_only >= 24) {
            $h_only = $h_only - 24;
            $counter += 1;
        }
        return $counter;
    }

    function dragonball($d_only): int
    {
        $counter = 0;
        while ($d_only >= 365) {
            $d_only = $d_only - 365;
            $counter += 1;
        }
        return $counter;
    }

    function format_duration($seconds)
    {
        if($seconds == 0){return "now";}
        $minutes = goku($seconds);
        $hours = goku($minutes);
        $days = gon($hours);
        $years = dragonball($days);
        $s = []; //array to push string with or with-out the "s";
        $seconds % 60 == 1 ? array_push($s, "second") : array_push($s, "seconds");
        $minutes % 60 == 1 ? array_push($s, "minute") : array_push($s, "minutes");
        $hours % 24 == 1 ? array_push($s, "hour") : array_push($s, "hours");
        $days % 365 == 1 ? array_push($s, "day") : array_push($s, "days");
        $years % 1000 == 1 ? array_push($s, "year") : array_push($s, "years");
        $sec = ($s[0]);
        $min = ($s[1]);
        $h = ($s[2]);
        $d = $s[3];
        $y = $s[4]; //push done

        $my_sec = $seconds % 60;
        $my_min = $minutes % 60;
        $my_hours = $hours % 24;
        $my_days = $days % 365;
        $my_years = $years;

        echo $result_y = istrue($years,$my_years,$y,$my_sec);
        echo $result_d = istrue($days,$my_days,$d,$my_sec);
        echo $result_h = istrue($hours,$my_hours,$h,$my_sec);
        echo $result_m = istrue($minutes,$my_min,$min,$my_sec);
        echo $result_s = isittrue($seconds,$my_sec,$sec);
        return "$result_y $result_d $result_h
        $result_m $result_s";
    }
    
    echo '<p>ex1: ';
    echo ($time = 60 * 60 * 24 + 1 + 333320600) . " second" . ($time == 1 ? false : "s") .  " equal: ";
    echo format_duration($time);
    echo '</p>';
    echo '<p>ex2: <strong>';format_duration(3611);echo "</strong> equal to <strong>3611 seconds </strong>" . '<p>';

    ?>
    <section class="text-center">
    <h1>From seconds To Years !</h1>
    <p>Try it for yourself</p>
    <form action='index.php' method='post' class="text-light">
        <label for='nom'>Please enter an integer only : </label>
        <input type='number' max="10001001000" name='nom' id='nom' class="p-2 rounded-pill">
        <input type='submit' value='Submit' class="bg-success p-2 rounded-pill text-light">
    </form>
    <?php
    $my_num = ($_POST['nom']);
    if($_POST){ echo "<p>Result: $my_num sec = " . format_duration($my_num) . '<p>';
    } ?>
    </section>
 </main>
 <footer class="position-absolute bottom-0 start-50 translate-middle">&copy;Mohamed BOUCHERBA</footer>
</body>

</html>