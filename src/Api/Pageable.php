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

/**
 * 代表ESI响应可以被分页
 *
 * 实现本接口的类可以使用{@link PageableImp}直接实现
 * @package RazeSoldier\SerenityEsi\Api
 */
interface Pageable
{
    /**
     * 设置这次请求的页数
     * @param int $page
     */
    public function setPage(int $page): void;

    /**
     * 在调用{@link get()}后获得总页数
     * @return int
     */
    public function getMaxPages(): int;
}