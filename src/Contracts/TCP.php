<?php
/**
 * Socket API for TCP
 * User: moyo
 * Date: 04/08/2017
 * Time: 1:10 AM
 */

namespace Carno\Net\Contracts;

interface TCP
{
    /**
     * @param int $conn
     * @return bool
     */
    public function connected(int $conn = 0) : bool;

    /**
     * write with buffer control
     * @param string $data
     * @param int $conn
     * @return bool
     */
    public function write(string $data, int $conn = 0) : bool;

    /**
     * direct send to socket
     * @param string $data
     * @param int $conn
     * @return bool
     */
    public function send(string $data, int $conn = 0) : bool;

    /**
     * @param int $conn
     * @return bool
     */
    public function close(int $conn = 0) : bool;
}
