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

namespace RazeSoldier\SerenityEsi\Api\Alliance;

use RazeSoldier\SerenityEsi\Api\EsiBase;
use RazeSoldier\SerenityEsi\Api\PublicApi;

/**
 * 返回指定联盟下的所有成员军团
 * <pre>
 * List all current member corporations of an alliance
 * Route: /v2/alliances/{alliance_id}/corporations/
 * Cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Alliance
 */
class AllianceCorporations extends EsiBase implements PublicApi
{
    protected string $endpoint = 'alliances/{alliance_id}/corporations';

    public static function v2(int $allianceId): self
    {
        $api = new self();
        $api->version = 'v2';
        $api->paramMap['alliance_id'] = $allianceId;
        return $api;
    }

    public static function latest(int $allianceId): self
    {
        return self::v2($allianceId);
    }

    protected function getModelClassName(): ?string
    {
        return null;
    }
}
