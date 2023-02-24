<?php

namespace App\Models;
use App\Http\Controllers\Requst;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'quantity',
        'price',
        'discount_price',
        'catagory',
        'image',
        


        
        
    ];

}
