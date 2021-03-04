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

namespace RazeSoldier\SerenityEsi\Model\Skill;

use RazeSoldier\SerenityEsi\Api\Skill\CharacterSkills;

/**
 * 角色技能情况的模型类
 * @see CharacterSkills
 * @see https://esi.evepc.163.com/ui/#/Skills/get_characters_character_id_skills
 * @package RazeSoldier\SerenityEsi\Model\Skill
 */
class CharacterSkillInformation
{
    /**
     * @var CharacterSkill[] maxItems: 1000
     */
    public array $skills;
    /**
     * @var int total_sp integer
     */
    public int $total_sp;
    /**
     * @var int|null Skill points available to be assigned
     */
    public ?int $unallocated_sp = null;
}
