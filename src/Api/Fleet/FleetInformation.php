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

namespace RazeSoldier\SerenityEsi\Api\Fleet;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;

/**
 * 获得舰队的细节
 * <pre>
 * Return details about a fleet
 * Route: /v1/fleets/{fleet_id}/
 * This route is cached for up to 5 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Fleet
 * @method \RazeSoldier\SerenityEsi\Model\Fleet\FleetInformation get()
 */
class FleetInformation extends AuthEsiBase
{
    protected string $endpoint = 'fleets/{fleet_id}';

    public static function latest(int $fleetId): self
    {
        return self::v1($fleetId);
    }

    public static function v1(int $fleetId): self
    {
        $api = new self();
        $api->paramMap['fleet_id'] = $fleetId;
        return $api;
    }

    public function getScope(): string
    {
        return 'esi-fleets.read_fleet.v1';
    }

    protected function getModelClassName(): ?string
    {
        return \RazeSoldier\SerenityEsi\Model\Fleet\FleetInformation::class;
    }
}
