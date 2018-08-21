<?php
/**
 * Make it printable
 * User: moyo
 * Date: 21/11/2017
 * Time: 3:30 PM
 */

namespace Carno\Net\Chips\Endpoint;

trait Printable
{
    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf(
            '%s$%s$%s:%d$%s',
            $this->service ?? 'core',
            $this->identify ?? 'id',
            $this->desensitization($this->address->host()),
            $this->address->port(),
            implode(',', $this->tags)
        );
    }

    /**
     * hide password from dsn
     * @param string $host
     * @return string
     */
    private function desensitization(string $host) : string
    {
        if ($px1 = strpos($host, '@')) {
            $px2 = strpos($host, ':', ($pxs = strpos($host, '://')) ? $pxs + 3 : 0);
            return substr($host, 0, $px2 + 1) . '***' . substr($host, $px1);
        }
        return $host;
    }
}
