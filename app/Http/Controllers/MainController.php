<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function teste($value): void
    {
        echo "A string: " . $this->cleanUpperCaseString($value) . "<br>";
    }
}
