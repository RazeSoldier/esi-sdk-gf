<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

namespace RazeSoldier\SerenityEsi\Api;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * 该异常在调用ESI失败后抛出
 * @package RazeSoldier\SerenityEsi\Api
 */
class EsiException extends Exception
{
    protected Response $response;

    public function __construct(Response $response, string $message = null)
    {
        $msg = $message ?? $response->getBody()->getContents();
        parent::__construct($msg);
        $this->response = $response;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }
}
