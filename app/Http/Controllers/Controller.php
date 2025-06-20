<?php

namespace App\Http\Controllers;

abstract class Controller
{
  // remover os espaços em branco no início e no final de uma string
  // converter a string para uppercase (maiúsculas)
  public function cleanUpperCaseString($string): string
  {
    return strtoupper(trim($string));
  }
}
