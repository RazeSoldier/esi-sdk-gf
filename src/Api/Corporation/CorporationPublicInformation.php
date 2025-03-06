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

use RazeSoldier\SerenityEsi\Api\EsiBase;
use RazeSoldier\SerenityEsi\Api\PublicApi;

/**
 * 获得军团公开信息
 * <pre>
 * Public information about a corporation
 * Route: /v5/corporations/{corporation_id}/
 * This route is cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Corporation
 * @method \RazeSoldier\SerenityEsi\Model\Corporation\CorporationPublicInformation get()
 */
class CorporationPublicInformation extends EsiBase implements PublicApi
{
    protected string $endpoint = 'corporations/{corporation_id}';

    /**
     * @deprecated v4 have been deprecated
     */
    public static function v4(int $corporationId): self
    {
        $api = new self();
        $api->version = 'v4';
        $api->paramMap['corporation_id'] = $corporationId;
        return $api;
    }

    public static function v5(int $corporationId): self
    {
        $api = new self();
        $api->version = 'v5';
        $api->paramMap['corporation_id'] = $corporationId;
        return $api;
    }

    public static function latest(int $corporationId): self
    {
        return self::v5($corporationId);
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Corporation\CorporationPublicInformation::class;
    }
}
