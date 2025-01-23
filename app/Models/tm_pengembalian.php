<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tm_pengembalian extends Model
{
    use HasFactory;

    protected $table = 'tm_pengembalian';
    protected $primaryKey = 'kembali_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function peminjaman()
    {
        return $this->belongsTo(tm_peminjaman::class, 'pb_id', 'pb_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'user_id');
    }
}
