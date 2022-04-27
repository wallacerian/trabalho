<!doctype html>
<html lang="pt-br">
  <head>
<link rel="stylesheet" href="./css/style2.css">
<center>
<a <button type="button" href="index.php" class="button">VOLTAR</button></a>
</center>
</head>
<body>
    <center>
<?php

    if ($_POST['sort'] == '0' )
    {
        echo '<h1>Selecione Um Metódo De Ordenação</h1>' ;
    }

   $option = $_POST['sort'];

   $vet = $vet[0]=$_POST['txt1']; $vet[1]=$_POST['txt2'];$vet[2]=$_POST['txt3']; $vet[3]=$_POST['txt4']; $vet[4]=$_POST['txt5'];

   if ($option == '1')
   {
       $inicio = microtime(true);
       function insertion_sort($vet){
           $number_of_items = count($vet);
           for($i = 0; $i <= $number_of_items - 2; $i++){
               $k = $i;
               for($j = $i + 1; $j > 0; $j--){
                   if($vet[$j] < $vet[$k]){
                       $temp = $vet[$j];
                       $vet[$j] = $vet[$k];
                       $vet[$k] = $temp;
                   }
                   if($k > 0 )
                       $k--;
               }
           }
           return $vet;
       }

       echo '<h1>Lista Organizada em Ordem Crescente Insert</h1>';
       for($n=0;$n<5;$n++){
           echo '<td><h3>Numero '.$n.'= '.$vet[$n].'</h3></td>';
       }

       $fim = microtime(true);
       $tempo = $fim - $inicio;
       printf("Processado em: %0.16f segundos", $tempo/1000000);
   }

    if ($option == '2')
    {
        $inicio = microtime(true);
        function mergesort($numlist)
        {
            if(count($numlist) == 1 ) return $numlist;

            $mid = count($numlist) / 2;
            $left = array_slice($numlist, 0, $mid);
            $right = array_slice($numlist, $mid);

            $left = mergesort($left);
            $right = mergesort($right);

            return merge($left, $right);
        }

        function merge($left, $right)
        {
            $leftIndex=0;
            $rightIndex=0;

            while($leftIndex<count($left) && $rightIndex<count($right))
            {
                if($left[$leftIndex]>$right[$rightIndex])
                {

                    $vet[]=$right[$rightIndex];
                    $rightIndex++;
                }
                else
                {
                    $vet[]=$left[$leftIndex];
                    $leftIndex++;
                }
            }
            while($leftIndex<count($left))
            {
                $vet[]=$left[$leftIndex];
                $leftIndex++;
            }
            while($rightIndex<count($right))
            {
                $vet[]=$right[$rightIndex];
                $rightIndex++;
            }
            return $vet;
        }

        echo '<h1>Lista Organizada em Ordem Crescente Merge</h1>';
        for($n=0;$n<5;$n++){
            echo '<td><h3>Numero '.$n.'= '.$vet[$n].'</h3></td>';

        }

        $fim = microtime(true);
        $tempo = $fim - $inicio;
        printf("Processado em: %0.16f segundos", $tempo/1000000);

    }

    if ($option == '3')
    {
        $inicio = microtime(true);
        function quicksort($vet)
        {
            if (count($vet) < 2) {
                return $vet;
            }
            $left = $right = array();
            reset($vet);
            $pivot_key = key($vet);
            $pivot = array_shift($vet);
            foreach ($vet as $k => $v) {
                if ($v['times_ordered'] > $pivot['times_ordered']) {
                    $left[$k] = $v;
                } else {
                    $right[$k] = $v;
                }
            }
            return array_merge(quicksort($left), array($pivot_key => $pivot), quicksort($right));
        }

        echo '<h1>Lista Organizada em Ordem Crescente quick</h1>';
        for($n=0;$n<5;$n++){
            echo '<td><h3>Numero '.$n.'= '.$vet[$n].'</h3></td>';

        }

        $fim = microtime(true);
        $tempo = $fim - $inicio;
        printf("Processado em: %0.16f segundos", $tempo/1000000);
    }

    if ($option == '4')
    {
        $inicio = microtime(true);
        function selection_sort(&$arr) {
            $n = count($arr);
            for($i = 0; $i < count($arr); $i++) {
                $min = $i;
                for($j = $i + 1; $j < $n; $j++){
                    if($arr[$j] < $arr[$min]){
                        $min = $j;
                    }
                }
                list($arr[$i],$arr[$min]) = array($arr[$min],$arr[$i]);
            }
        }

        selection_sort($vet);

        echo '<h1>Lista Organizada em Ordem Crescente Selection</h1>';
        for($n=0;$n<5;$n++){
            echo '<td><h3>Numero '.$n.'= '.$vet[$n].'</h3></td>';

        }

        $fim = microtime(true);
        $tempo = $fim - $inicio;
        printf("Processado em: %0.16f segundos", $tempo/1000000);
    }

     if ($option == '5')
     {
         $inicio = microtime(true);
         function shell_sort($arr) {
             $inc = round(count($arr)/2);
             while($inc > 0)      {
                 for($i = $inc; $i < count($arr);$i++) {
                     $temp = $arr[$i];
                     $j = $i;
                     while($j >= $inc && $arr[$j-$inc] > $temp) {
                         $arr[$j] = $arr[$j - $inc];
                         $j -= $inc;
                     }
                     $arr[$j] = $temp;
                 }
                 $inc = round($inc/2.2);
             }
             return $arr;
         }

         $sorted = shell_sort($vet);
         print_r($sorted);

         echo '<h1>Lista Organizada em Ordem Crescente Shell</h1>';
         for($n=0;$n<5;$n++){
             echo '<td><h3>Numero '.$n.'= '.$vet[$n].'</h3></td>';

         }

         $fim = microtime(true);
         $tempo = $fim - $inicio;
         printf("Processado em: %0.16f segundos", $tempo/1000000);
     }

     if ($option == '6')
     {
         $inicio = microtime(true);
         function bubble_sort($vet) {
             $n = count($vet);
             do {
                 $swapped = false;
                 for ($i = 0; $i < $n - 1; $i++) {
                     if ($vet[$i] > $vet[$i + 1]) {
                         $temp = $vet[$i];
                         $vet[$i] = $vet[$i + 1];
                         $vet[$i + 1] = $temp;
                         $swapped = true;
                     }
                 }
                 $n--;
             }
             while ($swapped);
             return $vet;
         }

         echo '<h1>Lista Organizada em Ordem Crescente Shell</h1>';
         for($n=0;$n<5;$n++){
             echo '<td><h3>Numero '.$n.'= '.$vet[$n].'</h3></td>';

         }

         $fim = microtime(true);
         $tempo = $fim - $inicio;
         printf("Processado em: %0.16f segundos", $tempo/1000000);

     }

?>
</center>



</body>