<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 * @package App\Models
 */
class Page extends Model
{

    //Define some constants so we can access some standard pages.
    const TYPE_HOMEPAGE = 1;
    const TYPE_ABOUT = 2;
    const TYPE_RESUME = 3;
    const TYPE_CONTACT = 4;
    const TYPE_CUSTOM = 10;

    private static $types = [
        self::TYPE_HOMEPAGE => 'Home',
        self::TYPE_ABOUT    => 'About',
        self::TYPE_RESUME   => 'Resume',
        self::TYPE_CONTACT  => 'Contact',
        self::TYPE_CUSTOM   => 'Custom',
    ];

    const NAVBAR_ENABLED = 1;
    const NAVBAR_DISABLED = 0;

    private static $navbarStatus = [
        self::NAVBAR_ENABLED  => 'Enabled',
        self::NAVBAR_DISABLED => 'Disabled',
    ];

    protected $fillable = [
        'name',
        'url',
        'keywords',
        'body',
        'nav_enabled',
        'type',
    ];

    /**
     * @return array
     */
    public static function getTypes() : array
    {
        return self::$types;
    }

    public function getFormattedType()
    {
        return self::$types[$this->getType()];
    }

    /**
     * @return array
     */
    public static function getNavbarStatuses() : array
    {
        return self::$navbarStatus;
    }

    /**
     * @return string
     */
    public function getFormattedNavbarStatus() : string
    {
        return self::$navbarStatus[$this->getNavEnabled()];
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
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getKeywords() : string
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords(string $keywords)
    {
        $this->keywords = $keywords;
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
     * @return int
     */
    public function getNavEnabled() : int
    {
        return $this->nav_enabled;
    }

    /**
     * @param int $nav_enabled
     */
    public function setNavEnabled(int $nav_enabled)
    {
        $this->nav_enabled = $nav_enabled;
    }

    /**
     * @return int
     */
    public function getType() : int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @param int $type
     * @param int|null $id
     * @return string
     * @throws \Exception
     */
    public static function getPageContent(int $type)
    {
        if(!array_key_exists($type, self::getTypes()))
        {
            throw new \Exception('Incorrect type given');
        }

        $page = Page::where('type', '=', $type)->first();

        if(!$page)
        {
            return null;
        }

        return $page->getBody();
    }
}
