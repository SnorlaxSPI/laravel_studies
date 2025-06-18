<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    public function __invoke(Request $request): void
    {
        echo "Hello from SingleActionController!";
        echo "<br>";
        echo $this->privateMethod();
    }

    private function privateMethod(): string
    {
        return "Hello from privateMethod!";
    }
}
