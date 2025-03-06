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

namespace RazeSoldier\SerenityEsi\Api\Character;

use RazeSoldier\SerenityEsi\Api\EsiBase;
use RazeSoldier\SerenityEsi\Api\PublicApi;
use RazeSoldier\SerenityEsi\Http\SetJsonRequestBody;

/**
 * 根据角色ID批量查找这些角色的军团、联盟和NPC势力
 * <pre>
 * Bulk lookup of character IDs to corporation, alliance and faction
 * Route: /v2/characters/affiliation/
 * Cached for up 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Character
 * @method \RazeSoldier\SerenityEsi\Model\Character\CharacterAffiliation[] get()
 */
class CharacterAffiliation extends EsiBase implements PublicApi
{
    use SetJsonRequestBody;

    protected string $endpoint = 'characters/affiliation';
    protected string $httpMethod = 'POST';

    /**
     * @deprecated v1 have been deprecated
     */
    public static function v1(array $characterIds): self
    {
        $api = new self;
        $api->version = 'v1';
        $api->setJsonBody($characterIds);
        return $api;
    }

    public static function v2(array $characterIds): self
    {
        $api = new self;
        $api->version = 'v2';
        $api->setJsonBody($characterIds);
        return $api;
    }

    public static function latest(array $characterIds): self
    {
        return self::v2($characterIds);
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Character\CharacterAffiliation::class;
    }
}
