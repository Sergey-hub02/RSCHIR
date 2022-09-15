<?php

function draw(string $code): void {
  if (!is_numeric($code)) {
    echo "[ERROR]: Код должен быть целым числом!";
    return;
  }

  $num = intval($code, 2);
  echo "Число: $num";
}
