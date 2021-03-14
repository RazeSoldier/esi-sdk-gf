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

namespace RazeSoldier\SerenityEsi\Api\Universe;

use RazeSoldier\SerenityEsi\Api\EsiBase;
use RazeSoldier\SerenityEsi\Api\PublicApi;

/**
 * 获得星域的信息
 * <pre>
 * Get information on a region
 * Route: v1/universe/regions/{region_id}/
 * This route expires daily at 11:05
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Universe
 * @method \RazeSoldier\SerenityEsi\Model\Universe\RegionInformation get()
 */
class RegionInformation extends EsiBase implements PublicApi
{
    protected string $endpoint = 'universe/regions/{region_id}';

    public static function v1(int $regionId): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['region_id'] = $regionId;
        $api->headerMap['Accept-Language'] = 'zh'; // 使返回的信息为中文语言
        return $api;
    }

    public static function latest(int $regionId): self
    {
        return self::v1($regionId);
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Universe\RegionInformation::class;
    }
}
