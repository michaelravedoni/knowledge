<?php

namespace App\Models;

use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleCategory extends Model implements Sortable
{
    use HasFactory;
    use HasTranslations;
    use SortableTrait;

    public $translatable = ['name', 'slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'order',
    ];

    /**
     * Get the project that owns the article.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the articles for the category.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
