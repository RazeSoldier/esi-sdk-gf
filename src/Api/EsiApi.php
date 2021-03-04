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

interface EsiApi
{
    /**
     * 调用ESI
     * @return mixed
     */
    public function get();

    /**
     * 获得ESI的接入域名
     * @return string
     */
    public function getDomain(): string;

    /**
     * 获得调用ESI后，从响应获取到的etag头部。可用于检查HTTP缓存
     * @return string
     */
    public function getETag(): string;

    /**
     * 获得调用ESI后，响应的状态码
     * @return int
     */
    public function getStatusCode(): int;
}