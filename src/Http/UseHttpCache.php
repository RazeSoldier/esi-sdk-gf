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

/**
 * 用于使用HTTP缓存
 * @package RazeSoldier\SerenityEsi\Http
 */
trait UseHttpCache
{
    /**
     * 在请求的头部设置If-None-Match。用于检查HTTP缓存
     * @param string $eTag
     */
    final public function setETag(string $eTag): void
    {
        $this->headerMap['If-None-Match'] = $eTag;
    }
}