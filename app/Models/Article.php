<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Article
 * @package App\Models
 *
 * @property User $user
 *
 * @method static Article published() Scope queries to articles that have been published.
 */
class Article extends Model
{

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'published',
    ];

    protected $guarded = [
        'id',
        'user_id'
    ];

    protected $dates = ['published_at'];

    const UNPUBLISHED = 0;
    const PUBLISHED = 1;

    private static $statuses = [
        self::UNPUBLISHED => 'Unpublished',
        self::PUBLISHED   => 'Published'
    ];

    public static function getStatuses()
    {
        return self::$statuses;
    }

    /**
     * Article belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tags associated with the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    /**
     * @return Carbon
     */
    public function getPublishedAt() : Carbon
    {
        return $this->published_at;
    }

    /**
     * @param string $published_at
     */
    public function setPublishedAt(string $published_at)
    {
        $this->published_at = $published_at;
    }

    /**
     * @return int
     */
    public function getPublished() : int
    {
        return $this->published;
    }

    /**
     * @param int $published
     */
    public function setPublished(int $published)
    {
        $this->published = $published;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return self::$statuses[$this->getPublished()];
    }

    /**
     * Scope queries to articles that have been published.
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Get list of Tag ids associated with current article.
     *
     * @return array
     */
    public function getTagListAttribute() : array
    {
        return $this->tags->lists('id')->toArray();
    }
}
