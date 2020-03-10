<?php
$vote =6;
if(!isset($_COOKIE['adresa'])){
$vote = $_REQUEST['vote'];

$ip = '';
    if($_SERVER['REMOTE_ADDR'])
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = 'none';
        setcookie(
  "adresa",
  "$ip",
  time() + (10 * 365 * 24 * 60 * 60)
);

}
//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$apple = $array[0];
$samsung = $array[1];
$huawei = $array[2];
$xiaomi = $array[3];
$alcatel = $array[4];
$lenovo = $array[5];

if ($vote == 0) {
  $apple = $apple + 1;
}
if ($vote == 1) {
  $samsung = $samsung + 1;
}
if ($vote == 2) {
  $huawei = $huawei + 1;
}

if ($vote == 3) {
  $xiaomi = $xiaomi + 1;
}

if ($vote == 4) {
  $alcatel = $alcatel + 1;
}

if ($vote == 5) {
  $lenovo = $lenovo + 1;
}


//insert votes to txt file
$insertvote = $apple."||".$samsung."||".$huawei."||".$xiaomi."||".$alcatel."||".$lenovo;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h4 style="color:#d6d3d3;">Rezultati:</h4>
<table>
<tr>
<td>Apple:</td>
<td>
<img src="images/add_to_cart.jpg"
width='<?php echo(100*round($apple/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>'
height='20'>
<?php echo(100*round($apple/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>%
</td>
</tr>
<tr>
<td>Samsung:</td>
<td>
<img src="images/add_to_cart.jpg"
width='<?php echo(100*round($samsung/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>'
height='20'>
<?php echo(100*round($samsung/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>%
</td>
</tr>
<tr>
<td>Huawei:</td>
<td>
<img src="images/add_to_cart.jpg"
width='<?php echo(100*round($huawei/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>'
height='20'>
<?php echo(100*round($huawei/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>%
</td>
</tr>
<tr>
<td>Xiaomi:</td>
<td>
<img src="images/add_to_cart.jpg"
width='<?php echo(100*round($xiaomi/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>'
height='20'>
<?php echo(100*round($xiaomi/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>%
</td>
</tr>
<tr>
<td>Alcatel:</td>
<td>
<img src="images/add_to_cart.jpg"
width='<?php echo(100*round($alcatel/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>'
height='20'>
<?php echo(100*round($alcatel/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>%
</td>
</tr>
<tr>
<td>Lenovo:</td>
<td>
<img src="images/add_to_cart.jpg"
width='<?php echo(100*round($lenovo/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>'
height='20'>
<?php echo(100*round($lenovo/($apple+$samsung+$huawei+$xiaomi+$alcatel+$lenovo),6)); ?>%
</td>
</tr>
</table>