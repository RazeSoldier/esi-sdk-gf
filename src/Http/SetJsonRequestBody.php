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

namespace RazeSoldier\SerenityEsi\Http;

use Nyholm\Psr7\Stream;
use Psr\Http\Message\StreamInterface;

/**
 * 用于设置json格式的HTTP请求主体。
 * @package RazeSoldier\SerenityEsi\Http
 */
trait SetJsonRequestBody
{
    private string $jsonString;

    /**
     * @param array $json
     */
    protected function setJsonBody(array $json)
    {
        $this->jsonString = json_encode($json);
        $this->headerMap['Content-Type'] = 'application/json';
    }

    protected function getBody():? StreamInterface
    {
        return Stream::create($this->jsonString);
    }
}
