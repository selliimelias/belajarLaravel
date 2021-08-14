<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id', 
        'bank_id', 
        'kurir_id', 
        'number_id', 
        'no_invoice'];

    public function cart(){
        return $this->belongsTo('App\Models\Cart');
    }

    public function bank(){
        return $this->belongsTo('App\Models\Bank');
    }

    public function kurir(){
        return $this->belongsTo('App\Models\Kurir');
    }
}
