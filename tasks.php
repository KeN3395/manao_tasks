//1. Определить  количество  цифр,  меньших  5,  используемых  при  записи натурального числа N.
<?php
 $n = 103718;
 $i = 0;
 while($n>0){
   $k= $n%10;
   if ($k<5) 
	$i++;
   $n=(int)($n/10);
 }
 echo $i;
?>
//2. Получить  все  четырехзначные  числа,  сумма  цифр  которых  равна заданному числу  n.
<?php
 $s = 5;
for($i = 1000; $i < 10000; $i++){
    $n = $i;
    $sum = 0;
    while($n>0){
        $k = $n%10;
        $sum = $sum + $k;
        $n = (int)($n / 10);
    }
    if ($sum == $s) 
	echo ($i."\n");
}
?>
//3. Выяснить, образуют ли цифры данного натурального числа N возрастающую последовательность.
<?php
$n = 12390;
$flag = true;
    while ($n / 10)
    {
        $k = (int)($n % 10);
        $l = (int)(($n / 10) % 10);
        if ($k < $l){
            echo ("Не образует");
            $flag = false;
            break;
        }
        $n =(int)($n / 10);
    }
    if($flag)
	echo ("Образует");
?>
//4. Найти все четные четырехзначные числа, цифры которых следуют в порядке возрастания или убывания.
<?php
	function Up($n){
		$flag = true;
		while($n >=10){
			$k = (int)($n % 10);
			$l = (int)(($n / 10) % 10);
			if($k <= $l) 
				return false;
			$n =(int)($n / 10);
		}
		return $flag;
	}
	function Down($n){
		$flag = true;
		while($n >=10){
			$k = (int)($n % 10);
            		$l = (int)(($n / 10) % 10);
			if($k >= $l) 
				return false;
            		$n =(int)($n / 10);
		}
		return $flag;
	}
	for($i = 1000; $i < 10000; $i += 2){
		if(Up($i) || Down($i))
			echo $i."\n";
	}
?>
//5. По заданному натуральному числу N получить число M, записанное цифрами исходного числа, взятыми в обратном порядке.
<?php
 $n = 103718;
 $i = 0;
 while($n>0){
   $k= $n%10;
   echo $k;
   $n=(int)($n/10);
 }
?>
//6. Получить  все  четырехзначные  числа,  в  записи  которых  встречаются только цифры 0,2,3,7.
<?php
for($i = 1000; $i < 10000; $i++){
    $flag = true;
    $n = $i;
    while($n > 0){
        $k = $n % 10;
        switch ($k){
        case 0:
            break;
        case 2:
            break;
        case 3:
            break;
        case 7:
            break;
        default:
            $flag = false;
        }
        $n = (int)($n / 10);
    }
   if($flag)
	echo ($i."\n");
}
?>
//7. Выяснить, есть ли в записи натурального числа N две одинаковые цифры.
<?php
$n = 1234;
if (duplicate($n))
    echo "присутствуют";
else
    echo "отсутствуют";
function duplicate($num)
{
    while ($num != 0) {
        $n = $num;
        $count = 0;
        while ($n != 0) {
            if ($n % 10 == $num % 10)
                $count++;
            $n = (int)($n/10);
        }
        if($count >= 2)
            return true;
        $num = (int)($num / 10);
    }
    return false;
}
?>
//8. Получить все четырехзначные целые числа, в записи которых нет одинаковых цифр.
<?php
for($i = 1000; $i < 10000; $i++){
    if(!duplicate($i)) 
	echo $i."\t";
}
function duplicate($num)
{
    while ($num != 0) {
        $n = $num;
        $count = 0;
        while ($n != 0) {
            if ($n % 10 == $num % 10)
                $count++;
            $n = (int)($n/10);
        }
        if($count >= 2)
            return true;
        $num = (int)($num / 10);
    }
    return false;
}
?>
//9. Дано  натуральное  число  N.  Определить,  является  ли  оно  автоморфным. Автоморфное число  равно последним разрядам квадрата этого числа. Например,  5 и 25,  6 и 36,  25 и 625.
<?php
$n = 25;
if (automorphic($n))
    echo "является";
else
    echo "не является";
function number($num)
{
    $i = 1;
    while ($num != 0) {
        $i *= 10;
        $num = (int)($num / 10);
    }
    return $i;
}
function automorphic($num)
{
    return ($num * $num) % number($num) == $num;
}    
?>
//10. Найти все меньшие N числа-палиндромы, которые при возведении в квадрат дают палиндром. Число называется палиндромом, если его запись читается одинаково с начала и с конца.
<?php
$n = 1000;
for ($i = 0; $i < $n; $i++)
    if (isPalindrome($i * $i) == $i * $i)
        echo "$i \t";
function isPalindrome($n)
{
    $m = 0;
    while($n != 0)     
    {
        $m *= 10;   
        $m += $n % 10;
        $n =(int)($n / 10);
    }   
    return $m;
} 
?>
