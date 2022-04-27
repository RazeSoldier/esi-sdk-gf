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
 * 代表舰队的细节
 * @see \RazeSoldier\SerenityEsi\Api\Fleet\FleetInformation
 * @see https://esi.evepc.163.com/ui/?version=dev#/Fleets/get_fleets_fleet_id
 * @package RazeSoldier\SerenityEsi\Model\Fleet
 */
class FleetInformation
{
    /**
     * @var bool Is free-move enabled
     */
    public bool $is_free_move;
    /**
     * @var bool Does the fleet have an active fleet advertisement
     */
    public bool $is_registered;
    /**
     * @var bool Is EVE Voice enabled
     */
    public bool $is_voice_enabled;
    /**
     * @var string Fleet MOTD in CCP flavoured HTML
     */
    public string $motd;
}
