<?php
/**
 * HTTP chan API
 * User: moyo
 * Date: 29/09/2017
 * Time: 11:34 AM
 */

namespace Carno\Net\Contracts;

use Psr\Http\Message\ResponseInterface as Response;

interface HTTP extends Serving
{
    /**
     * @param int $conn
     * @param Response $response
     * @return bool
     */
    public function reply(int $conn, Response $response) : bool;

    /**
     * @param int $conn
     * @return bool
     */
    public function close(int $conn) : bool;
}
