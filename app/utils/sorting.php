<?php

/**
 * Выполняет сортировку массива с помощью алгоритма сортировки Шелла
 * @param array $array        исходный массив
 * @return void
 */
function shellSort(array &$array): void {
  $length = count($array);
  $distance = intval($length / 2);

  while ($distance > 0) {
    for ($i = $distance; $i < $length; ++$i) {
      $temp = $array[$i];
      $j = $i;

      while ($j >= $distance && $array[$j - $distance] > $temp) {
        $array[$j] = $array[$j - $distance];
        $j -= $distance;
      }

      $array[$j] = $temp;
    }

    $distance = intval($distance / 2);
  }
}


/**
 * Выполняет сортировку массива
 * @param string $str     строка элементов, разделённых запятыми
 */
function sorting(string $str): string {
  $array = array_map(function ($element) {
    return intval($element);
  }, explode(",", $str));

  shellSort($array);
  return join(", ", $array);
}
