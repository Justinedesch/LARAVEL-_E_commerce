<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description_title' ,
        'description' ,
        'price' ,
        'isAvailable',
        'image',
        'alt',
        'weight' ,
        'stock' ,
        'discount',
        'category_id' ,
        'gameplays_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function gameplays(): HasMany
    {
        return $this->hasMany(Gameplay::class);
    }


}
