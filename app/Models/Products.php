<?php

namespace App\Models;

use App\Models\sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'Product_name' ,
        'description',
        'section_id',
        ];
        public function section()
        {
            return $this->belongsTo(sections::class); 
        }
}
