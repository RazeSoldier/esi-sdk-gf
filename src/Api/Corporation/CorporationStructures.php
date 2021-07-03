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

namespace RazeSoldier\SerenityEsi\Api\Corporation;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Model\Corporation\CorporationStructure;

/**
 * 获得军团建筑的列表
 * <pre>
 * Get a list of corporation structures. This route’s version includes the changes to structures detailed in this blog: https://www.eveonline.com/article/upwell-2.0-structures-changes-coming-on-february-13th
 * Route: /v4/corporations/{corporation_id}/structures/
 * Cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Corporation
 * @method CorporationStructure[]|null get()
 */
class CorporationStructures extends AuthEsiBase
{
    protected string $endpoint = 'corporations/{corporation_id}/structures';

    public static function v4(int $corporationId): self
    {
        $api = new self();
        $api->version = 'v4';
        $api->paramMap['corporation_id'] = $corporationId;
        $api->headerMap['Accept-Language'] = 'zh';
        return $api;
    }

    public static function latest(int $corporationId): self
    {
        return self::v4($corporationId);
    }

    /**
     * @inheritDoc
     */
    public function getScope(): string
    {
        return 'esi-corporations.read_structures.v1';
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return CorporationStructure::class;
    }
}
