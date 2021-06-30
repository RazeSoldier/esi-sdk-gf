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

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;

/**
 * 获得建筑信息
 * <pre>
 * Returns information on requested structure if you are on the ACL. Otherwise, returns “Forbidden” for all inputs.
 * Route: /v2/universe/structures/{structure_id}/
 * Cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Universe
 * @method \RazeSoldier\SerenityEsi\Model\Universe\StructureInformation get()
 */
class StructureInformation extends AuthEsiBase
{
    protected string $endpoint = 'universe/structures/{structure_id}';

    public static function v2(int $structureId): self
    {
        $api = new self();
        $api->version = 'v2';
        $api->paramMap['structure_id'] = $structureId;
        return $api;
    }

    public static function latest(int $structureId): self
    {
        return self::v2($structureId);
    }

    /**
     * @inheritDoc
     */
    public function getScope(): string
    {
        return 'esi-universe.read_structures.v1';
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return \RazeSoldier\SerenityEsi\Model\Universe\StructureInformation::class;
    }
}
