<?php

namespace App\Models;

use App\Traits\HasOgImage;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use HasTranslations;
    use Searchable;
    use HasOgImage;

    public $translatable = ['title'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
        'categories',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'array',
    ];

    /**
     * Get the project that owns the article.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the category that owns the article.
     */
    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }
}