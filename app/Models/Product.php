<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  // アプリケーション側でcreateなどできない値を記述する
  // 🔽 以下の処理を記述

  protected $guarded = [
    'id',
  ];
}



