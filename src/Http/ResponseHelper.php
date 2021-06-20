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

use Psr\Http\Message\ResponseInterface as Response;

/**
 * 帮助类获得HTTP响应中的值
 * @package RazeSoldier\SerenityEsi\Http
 */
trait ResponseHelper
{
    protected Response $httpResponse;

    public function getETag(): string
    {
        return $this->httpResponse->getHeader('etag')[0];
    }

    public function getStatusCode(): int
    {
        return $this->httpResponse->getStatusCode();
    }

    public function resourceIsNotModified(): bool
    {
        return $this->getStatusCode() === 304;
    }

    /**
     * 获得Esi错误速率限制的剩余次数
     * @return int Esi还能接受多少次失败的查询
     */
    public function getEsiErrorLimitRemain(): int
    {
        return $this->httpResponse->getHeader('x-esi-error-limit-remain')[0];
    }

    /**
     * 获得刷新Esi错误速率限制的剩余时间
     * @return int 距离刷新错误速率限制还有多少秒
     */
    public function getEsiErrorLimitReset(): int
    {
        return $this->httpResponse->getHeader('x-esi-error-limit-reset')[0];
    }
}