<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class database extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    public function pull($lapfut, $z)
    {
        return DB::table($lapfut)->where($z)->first();
    }

    public function tampil($table)
    {
        return DB::table($table)->get();
    }

    public function tampilBetween($table, $column, $from, $to)
    {
        return DB::table($table)->whereBetween($column, [$from, $to])->get();
    }
}