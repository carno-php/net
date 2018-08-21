<?php
/**
 * Tagging support
 * User: moyo
 * Date: 21/11/2017
 * Time: 3:34 PM
 */

namespace Carno\Net\Chips\Endpoint;

trait Tagging
{
    /**
     * @var array
     */
    private $tags = [];

    /**
     * @param string ...$tags
     * @return bool
     */
    public function hasTags(string ...$tags) : bool
    {
        return count(array_intersect($this->tags, $tags)) === count($tags);
    }

    /**
     * @param string ...$tags
     * @return self
     */
    public function setTags(string ...$tags) : self
    {
        $this->tags = array_unique(array_merge($this->tags, $tags));
        return $this;
    }

    /**
     * @return array
     */
    public function getTags() : array
    {
        return $this->tags;
    }
}
