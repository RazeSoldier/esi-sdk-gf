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

namespace RazeSoldier\SerenityEsi\Model\Corporation;

/**
 * 军团建筑的模型类
 * @package RazeSoldier\SerenityEsi\Model\Corporation
 */
class CorporationStructure
{
    /**
     * @var int ID of the corporation that owns the structure
     */
    public int $corporation_id;
    /**
     * @var string|null Date on which the structure will run out of fuel
     */
    public ?string $fuel_expires = null;
    /**
     * @var string|null The structure name
     */
    public ?string $name = null;
    /**
     * @var string|null The date and time when the structure’s newly requested reinforcement times (e.g. next_reinforce_hour and next_reinforce_day) will take effect
     */
    public ?string $next_reinforce_apply = null;
    /**
     * @var int|null The requested change to reinforce_hour that will take effect at the time shown by next_reinforce_apply
     */
    public ?int $next_reinforce_hour = null;
    /**
     * @var int The id of the ACL profile for this citadel
     */
    public int $profile_id;
    /**
     * @var int|null The hour of day that determines the four hour window when the structure will randomly exit its
     * reinforcement periods and become vulnerable to attack against its armor and/or hull.
     * The structure will become vulnerable at a random time that is +/- 2 hours centered on the value of this property
     */
    public ?int $reinforce_hour = null;
    /**
     * @var CorporationStructureService[]|null Contains a list of service upgrades, and their state
     */
    public ?array $services = null;
    public string $state;
    /**
     * @var string|null Date at which the structure will move to it’s next state
     */
    public ?string $state_timer_end = null;
    /**
     * @var string|null Date at which the structure entered it’s current state
     */
    public ?string $state_timer_start = null;
    /**
     * @var int The Item ID of the structure
     */
    public int $structure_id;
    /**
     * @var int The solar system the structure is in
     */
    public int $system_id;
    /**
     * @var int The type id of the structure
     */
    public int $type_id;
    /**
     * @var string|null Date at which the structure will unanchor
     */
    public ?string $unanchors_at = null;
}
