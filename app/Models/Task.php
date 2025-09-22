<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'completed',
        'image_url',
        'category_id',
    ];
    protected $casts = [
        'completed' => 'boolean',
    ];
    public function relations()
    {
        return ['category'];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    protected static function booted()
    {
        static::created(function ($model) {
            $model->update([
                'image_url' => "https://picsum.photos/seed/task{$model->id}/400/300"
            ]);
        });
    }
}
