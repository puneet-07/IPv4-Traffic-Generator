<html>
    <body>

<?php
$pid1=getmypid();
echo $pid1;
$sa=$_POST['sourceadd'];
$da=$_POST['destadd'];
$p=$_POST['protocol'];
if($p == "udp" || $p == "tcp")
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
echo $sa,$da,$p,$sp,$dp,$c,$number,$pl,$ipg,$po,$po1;
$count=0;
$len=strlen($po1);
if($p == "udp")
{
    if($c == "count")
    {
        if($po == "own")
        {
            while(1)
            {
                $data=substr($po1,$count,$pl);
                $count=$count+$pl;
                echo "<br>";
                echo "sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da ";
                echo "<br>";
                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d '".$data."' -v $da ");
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
               system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d r ".$pl." -v $da");
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
                system("sendip -p ipv4 -is $sa -p udp -us $sp -ud $dp -d ".$data." -v $da");
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
                system("sendip -p ipv4 -is $sa -p tcp -ts $sp -td $dp -d ".$data." -v $da");
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
                system("sendip -p icmp -is $sa -d r'".$pl."' -v $da");
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
                system("sendip -p ipv4 -is $sa -p icmp -d ".$data." -v $da");
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
                system("sendip -p ipv4 -is $sa -p icmp -d r'".$pl."' -v $da");
                sleep($ipg);
            }
        }
    }
}
?>
</body>
</html>