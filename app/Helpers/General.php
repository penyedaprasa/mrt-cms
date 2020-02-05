<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class General
{
    public static function setFile($path, $filename, $file)
    {
        if ($file != null) {
            $path       = Storage::putFile($path, $file);
            $filename   = $filename . basename($path);
            return $filename;
        }
        return null;
    }

    public static function columnDatatable($datas)
    {
        foreach ($datas as $data) {
            $columns[] = ['data' => $data, 'name' => $data, 'defaultContent' => ""];
        }
        return json_encode($columns);
    }
}
