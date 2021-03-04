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
 * 获取联盟公开信息
 * <pre>
 * Public information about an alliance
 * Route: /v4/alliances/{alliance_id}/
 * Cached for up 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Alliance
 * @method \RazeSoldier\SerenityEsi\Model\Alliance\AlliancePublicInformation get()
 */
class AlliancePublicInformation extends EsiBase implements PublicApi
{
    protected string $endpoint = 'alliances/{alliance_id}';

    public static function v4(int $allianceId): self
    {
        $api = new self();
        $api->version = 'v4';
        $api->paramMap['alliance_id'] = $allianceId;
        return $api;
    }

    public static function latest(int $allianceId): self
    {
        return self::v4($allianceId);
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Alliance\AlliancePublicInformation::class;
    }
}
