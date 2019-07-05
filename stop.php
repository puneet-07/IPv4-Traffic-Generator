<?php
system("ps -axn | grep apache2 > stopkill.txt");
system("cut -d ' ' -f 1 stopkill.txt > stopkill.txt");
$data=fopen("stopkill.txt","r");
$a=fgets($data);
system("kill $a");
$a=fgets($data);
system("kill $a");
fclose($data);

system("sudo service apache2 start");
echo "started";
sleep(5);
header("location:IPv4TrafficGenerator.html");
?>