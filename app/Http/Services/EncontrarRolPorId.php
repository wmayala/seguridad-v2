<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

trait EncontrarRolPorId
{
    public function encontrarIdRol($rol)
    {
        return DB::table('roles')->select('id')->where('name', '=', $rol)->get()->first();
    }
    public function encontrarNombreRol($rol)
    {
        return DB::table('roles')->select('id')->where('title', '=', $rol)->get()->first();
    }
}
