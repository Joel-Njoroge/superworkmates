<!--https://stackoverflow.com/questions/11497611/php-auto-refreshing-page/11497617-->
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "3";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        echo "Watch the page reload itself in 3 seconds!";

        $num1 = 1 + 1;
        $num2 = 2;

        if ($num1 > $num2) {
            echo 'wrong';
            echo 'bad math computing';

        }
        elseif ($num1 <= $num2){
           echo 'correct';
           echo 'good math computing';
        }
        else {
            echo 'I do not know';
        }

        $random = random_bytes(5);

        echo '<br>';
        echo $random;
        $randomhex = bin2hex($random);
        echo '<br>';
        echo $randomhex;
        $randomint = random_int(400,500);
        echo '<br>';
        echo $randomint;

    ?>
        <button><a href="myChatBox.php">Live Chat</a></button>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("kay").click(function(){
    $("#div1").load("demo_test.txt");
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button id="kay">Get External Content</button>

</body>
</html>
