<?php

namespace App\Http\Responses\Factory;

use Exception;
use Illuminate\Http\Request;

class ResponseFormatFactory
{
    public static function build(Request $request)
    {
        $format = $request->hasHeader('x-format') ?
            ucwords(strtolower($request->header('x-format'))) : 'Json';

        $formatter = "App\\Http\\Responses\\Formatters\\{$format}Formatter";

        if (class_exists($formatter)) {
            return new $formatter();
        }

        throw new Exception('Formatter Class Not Found', 400);
    }
}