<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $primaryKey = 'id_inventory';
    protected $fillable = [
        'jumlah', 'status', 'id_produk', 'id_gudang'
    ];
}
