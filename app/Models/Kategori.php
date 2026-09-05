<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama'];
    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori', 'nama');
    }

}
