<?php

namespace App\Models;

use App\Traits\HasOgImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use HasOgImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get the articles for the project.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
