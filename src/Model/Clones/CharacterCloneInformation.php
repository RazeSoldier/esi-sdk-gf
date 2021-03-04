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

namespace RazeSoldier\SerenityEsi\Model\Clones;

/**
 * 角色技能情况的模型类
 * @package RazeSoldier\SerenityEsi\Model\Clones
 */
class CharacterCloneInformation
{
    public ?HomeLocation $home_location = null;
    /**
     * @var JumpClone[] maxItems: 10
     */
    public array $jump_clones;
    public ?string $last_clone_jump_date = null;
    public ?string $last_station_change_date = null;
}
