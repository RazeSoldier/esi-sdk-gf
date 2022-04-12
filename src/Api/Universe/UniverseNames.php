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
use RazeSoldier\SerenityEsi\Http\SetJsonRequestBody;

/**
 * 批量将ID转换为名字和分类
 * <pre>
 * Resolve a set of IDs to names and categories. Supported ID’s for resolving are: Characters, Corporations, Alliances, Stations, Solar Systems, Constellations, Regions, Types, Factions
 * Route: /v3/universe/names/
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Universe
 * @method \RazeSoldier\SerenityEsi\Model\Universe\UniverseNames[] get()
 */
class UniverseNames extends EsiBase implements PublicApi
{
    use SetJsonRequestBody;

    protected string $endpoint = 'universe/names';
    protected string $httpMethod = 'POST';

    public static function latest(array $idSet): self
    {
        return self::v3($idSet);
    }

    public static function v3(array $idSet): self
    {
        $api = new self();
        $api->version = 'v3';
        $api->setJsonBody($idSet);
        return $api;
    }

    protected function getModelClassName(): ?string
    {
        return \RazeSoldier\SerenityEsi\Model\Universe\UniverseNames::class;
    }
}
