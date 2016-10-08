<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use Sluggable;

    protected $fillable = [
        'name'
    ];

    public $timestamps = [];

    /**
     * Get the articles associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Scope queries to the slug provided.
     *
     * @param $query
     * @param $slug
     */
    public function scopeSlug($query, $slug)
    {
        $query->where('slug', '=', $slug);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => 'name',
                'save_to'   => 'slug',
                'unique'    => true,
                'on_update' => true,
            ]];
    }
}
