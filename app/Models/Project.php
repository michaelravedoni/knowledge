<?php

namespace App\Models;

use App\Traits\HasOgImage;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model implements Sortable
{
    use HasFactory;
    use HasTranslations;
    use HasOgImage;
    use SortableTrait;

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
        'order',
    ];

    /**
     * Get the articles for the project.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
