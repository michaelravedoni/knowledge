<?php

namespace App\Models;

use App\Traits\HasOgImage;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasOgImage;

    public $translatable = ['description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the articles for the project.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
