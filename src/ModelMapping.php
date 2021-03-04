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

namespace RazeSoldier\SerenityEsi;

use JsonMapper;
use JsonMapper_Exception;

/**
 * 用于转换JSON到PHP模型类
 * @package RazeSoldier\SerenityEsi
 */
trait ModelMapping
{
    /**
     * @param object $json {@link json_decode()}返回的对象
     * @param string $modelName 模型类的完全限定类名
     * @return mixed|object
     * @throws JsonMapper_Exception
     */
    private function json2Model(object $json, string $modelName)
    {
        static $mapper = null;
        if ($mapper === null) {
            $mapper = new JsonMapper();
            $mapper->bStrictNullTypes = false;
        }
        return $mapper->map($json, new $modelName);
    }

    /**
     * @param array $jsonArray {@link json_decode()}返回的数组
     * @param string|null $modelName 模型类的完全限定类名，NULL代表$jsonArray为一个一维数组
     * @return array
     * @throws JsonMapper_Exception
     */
    private function arrayJson2Model(array $jsonArray, ?string $modelName): array
    {
        static $mapper = null;
        if ($mapper === null) {
            $mapper = new JsonMapper();
            $mapper->bStrictNullTypes = false;
        }
        return $mapper->mapArray($jsonArray, [], $modelName);
    }
}