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

namespace RazeSoldier\SerenityEsi\Model\Fleet;

/**
 * 代表舰队的一个成员细节
 * @see \RazeSoldier\SerenityEsi\Api\Fleet\FleetMembers
 * @see https://esi.evepc.163.com/ui/?version=dev#/Fleets/get_fleets_fleet_id_members
 * @package RazeSoldier\SerenityEsi\Model\Fleet
 */
class FleetMembers
{
    public int $character_id;
    public string $join_time;
    /**
     * @var string Member’s role in fleet [ fleet_commander, wing_commander, squad_commander, squad_member ]
     */
    public string $role;
    /**
     * @var string Localized role names
     */
    public string $role_name;
    public int $ship_type_id;
    /**
     * @var int Solar system the member is located in
     */
    public int $solar_system_id;
    /**
     * @var int ID of the squad the member is in. If not applicable, will be set to -1
     */
    public int $squad_id;
    /**
     * @var int|null Station in which the member is docked in, if applicable
     */
    public ?int $station_id = null;
    /**
     * @var bool Whether the member take fleet warps
     */
    public bool $takes_fleet_warp;
    /**
     * @var int ID of the wing the member is in. If not applicable, will be set to -1
     */
    public int $wing_id;
}
