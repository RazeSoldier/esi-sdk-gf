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

namespace RazeSoldier\SerenityEsi\Api\Skill;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Model\Skill\CharacterSkillInformation;

/**
 * 获得角色以训练的技能列表
 * <pre>
 * List all trained skills for the given character
 * Route: /v4/characters/{character_id}/skills/
 * Cached for up to 120 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Skill
 * @method CharacterSkillInformation get()
 */
class CharacterSkills extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/skills';

    public static function v4(int $characterId): self
    {
        $api = new self();
        $api->version = 'v4';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId): self
    {
        return self::v4($characterId);
    }

    public function getScope(): string
    {
        return 'esi-skills.read_skills.v1';
    }

    protected function getModelClassName(): string
    {
       return CharacterSkillInformation::class;
    }
}
