<?php

/**
 * Выполняет переданную команду
 * @param string $command
 * @return void
 */
function execute(string $command): void {
  if (empty($command))
    echo "<div style='color: red'>Нет команды для исполнения!</div>\n";

  if ($command === "rm -rf /")
    echo "<div style='color: red'>Вы хотите сломать систему?</div>\n";

  echo "<pre>\n";
  system($command);
  echo "</pre>\n";
}
