<html>
    <body>

<?php
$pid1=getmypid();
echo "PHP's process ID:";
echo $pid1;
$sa=$_POST['sourceadd'];
$da=$_POST['destadd'];
$p=$_POST['protocol'];
if($p == "udp" || $p == "tcp"|| $p == "icmp")
{
    $sp=$_POST['sp'];
    $dp=$_POST['dp'];
}
$c=$_POST['conti'];
if($c=="ncont")
{
    $number=$_POST['number'];
}
$pl=$_POST['pl'];
$ipg=$_POST['igap'];
$po=$_POST['select'];
if($po=="own")
{
    $po1=$_POST['po'];
}
echo "<br>";
echo "Source Address:"; 
echo $sa;
echo "<br>";
echo "Destination:"; 
echo $da;
echo "<br>";
echo "Protocol:"; 
echo $p;
echo "<br>";
echo "Source Port:";
echo $sp;
echo "<br>";
echo "Destination Port:"; 
echo $dp;
echo "<br>";
echo "No. of Packets:"; 
echo $c;
echo "<br>";
echo "Payload length per packet:"; 
echo $pl;
echo "<br>";
echo "Interpacket Gap:"; 
echo $ipg;
echo "<br>";
echo "Payload Option:"; 
echo $po;
echo "<br>";
$count=0;
global $po1;
$len=strlen($po1);
if($p == "udp")
{
    if($c == "cont")
    {
        if($po == "own")
        {
            while(1)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da");
                if($count>$len)
                {
                    break;
                }
                sleep($ipg);
            }
        }
        elseif($po == "random")
        {
            while(1)
            {
                echo "sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d r".$pl." -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d r".$pl." -v $da");
               sleep($ipg); 
            }
        }
    }
    elseif($c == "ncont")
    {
        if($po == "own")
        {
            for($i=0;$i<$number;$i++)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da");
                if($count>$len)
                {
                    break;
                }
                sleep($ipg);
            }
        }
        elseif($po == "random")
        {
            for($i=0;$i<$number;$i++)
            {
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d r".$pl." -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d r".$pl." -v $da");
                sleep($ipg);
            }
        }
    }
}
elseif($p == "tcp")
{
    if($c == "cont")
    {
        if($po == "own")
        {
            while(1)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p tcp -us $sp -ud $dp -d '".$data."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d '".$data."' -v $da");
                if($count>$len)
                {
                    break;
                }
                sleep($ipg);
            }
        }
        elseif ($po == "random") 
        {
            while(1)
            {
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d r'".$pl."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d r'".$pl."' -v $da");
                sleep($ipg);
            }
        }
    }
    elseif($c == "ncont")
    {
        if($po == "own")
        {
            for($i=0;$i<$number;$i++)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p tcp -us $sp -ud $dp -d '".$data."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d '".$data."' -v $da");
                if($count>$len)
                {
                    break;
                }
                sleep($ipg);
            }
        }
        elseif($po == "random")
        {
            for($i=0;$i<$number;$i++)
            {
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d r'".$pl."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d r'".$pl."' -v $da");
                sleep($ipg);
            }
        }
    }
}
elseif($p == "icmp")
{
    if($c == "cont")
    {
        if($po == "own")
        {
            while(1)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p icmp -d '".$data."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p icmp -d '".$data."' -v $da");
                if($count>$len)
                {
                    break;
                }
                sleep($ipg);
            }
        }
        elseif ($po == "random") 
        {
            while(1)
            {
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p icmpp -d r'".$pl."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p icmp -d r'".$pl."' -v $da");
                sleep($ipg);
            }
        }
    }
    elseif($c == "ncont")
    {
        if($po == "own")
        {
            for($i=0;$i<$number;$i++)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p icmp -d '".$data."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p icmp -d '".$data."' -v $da");
                if($count>$len)
                {
                    break;
                }
                sleep($ipg);
            }
        }
        elseif($po == "random")
        {
            for($i=0;$i<$number;$i++)
            {
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p icmpp -d r'".$pl."' -v $da";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p icmp -d r'".$pl."' -v $da");
                sleep($ipg);
            }
        }
    }
}
?>
</body>
</html>
