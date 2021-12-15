<!DOCTYPE html>
<html>
<head>
    <title>Юля Дмитриева</title>
    <meta charset="utf-8">
    </head>
<body>
    <form id="frm" method="POST" action="">
        <p>Введите элементы массива через запятую:</p>
        <input type="text" name="n" value="1, 2, 3">
        <p>Введите начало интервала: </p>
        <input type="text" name="a" value="1">
        <p>Введите конец интервала: </p>
        <input type="text" name="b" value="3">
        <input type="submit" value="OK">
    </form>
    <?php
        $n=$_POST["n"];
        $a=$_POST["a"];
        $b=$_POST["b"];
        $myArray = explode(", ", $n);

        $max=0;
            for($i=1; $i<count($myArray); $i++){
                if($myArray[$i]>$myArray[$max]){
                    $max=$i;
                }
            }

        $maxEl=$myArray[$max];

        //вычисляем сумму элементов массива, расположенных до последнего положительного числа
        $sumElArr = 0;
        $indLastPolozh = 0;
        for($i=count($myArray)-1; $i>=0; $i--){
            if($myArray[$i]>0){
                $indLastPolozh = $i;
                break;
            }
        }
        for($j = 0; $j<$indLastPolozh; $j++){
            $sumElArr=$myArray[$j]+$sumElArr;
        }
    
        //сжать массив, убрав оттуда элементы находящиеся в интервале от a до b
        $l = 0;
        while ($l<count($myArray)){
            if((abs($myArray[$l])>=$a)&&(abs($myArray[$l])<=$b)){
                array_splice($myArray, $l, 1);
            }
            else{
                $l++;
            }
        }

        echo "Максимальный элемент массива: ".$maxEl."; Сумма элементов массива, расположенных до последнего положительного элемента: ".$sumElArr."; Сжатый массив, исключающий элнменты, чьи модули находятся в интервале [".$a."; ".$b."]: </br>";
        for($m=0; $m<count($myArray); $m++){
            echo $myArray[$m]."; ";
        }
    ?>
</body>
</html>