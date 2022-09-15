<?php

function getShape(int $shapeCode): string {
  return match ($shapeCode) {
    0 => "rect",
    1 => "circle",
    2 => "ellipse",
    default => "unknown"
  };
}


/**
 * Возвращает битовую последовательность числа, начиная со $start, длины $length
 * @param int $number         рассматриваемое число
 * @param int $length         количество бит в последовательности
 * @param int $start          номер начального бита (нумеруются справа, начиная с 0)
 * @return string
 */
function getBitsSequence(int $number,  int $length, int $start = 0): string {
  $sequence = "";

  for ($i = 0; $i < $start; ++$i) {
    $number >>= 1;
  }

  for ($i = 0; $i < $length; ++$i) {
    $bit = $number & 1;
    $sequence .= "$bit";
    $number >>= 1;
  }

  return strrev($sequence);
}


/**
 * Первые два бита - форма
 * 16 следующих - цвет
 * Размеры прямоугольника - по 5 бит (для ширины и высоты соответственно)
 * Всего: 28 бит
 *
 * @param string $code
 * @return void
 */
function draw(string $code): void {
  if (str_contains($code, "0b")) {
    $num = intval($code, 2);
  }
  else {
    $num = intval($code);
  }

  // получение высоты
  $height = bindec(getBitsSequence($num, 5)) * 10;

  // получение ширины
  $width = bindec(getBitsSequence($num, 5, 5)) * 10;

  // получение цвета
  $colour = "#" . dechex(bindec(getBitsSequence($num, 16, 10)));

  // получение формы
  $shapeCode = bindec(getBitsSequence($num, 2, 26));
  $shape = getShape($shapeCode);

  echo "Код формы: $shapeCode\n";
  echo "Форма: $shape\n";
  echo "Цвет: $colour\n";
  echo "Ширина: $width\n";
  echo "Высота: $height\n";
}
