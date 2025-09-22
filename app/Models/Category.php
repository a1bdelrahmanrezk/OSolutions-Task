<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color'
    ];
    public function relations(){
        return ['tasks'];
    }
    public function tasks()
    {
        return $this->hasMany(Task::class,'category_id','id');
    }
}
