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

namespace RazeSoldier\SerenityEsi;

use RazeSoldier\SerenityEsi\Model\Alliance\AlliancePublicInformation;
use RazeSoldier\SerenityEsi\Model\Character\CharacterAffiliation;
use RazeSoldier\SerenityEsi\Model\Character\CharacterPublicInformation;
use RazeSoldier\SerenityEsi\Model\Corporation\CorporationPublicInformation;
use RazeSoldier\SerenityEsi\Model\Universe\RegionInformation;
use RazeSoldier\SerenityEsi\Model\Universe\TypeInformation;

interface EsiService
{
    /**
     * 获得角色的公开信息
     * @param int $characterId 角色ID
     * @return CharacterPublicInformation
     * @throws Api\EsiCallException
     */
    public function getCharacterPublicInformation(int $characterId): CharacterPublicInformation;

    /**
     * 获得军团的公开信息
     * @param int $corporationId
     * @return CorporationPublicInformation
     * @throws Api\EsiCallException
     */
    public function getCorporationPublicInformation(int $corporationId): CorporationPublicInformation;

    /**
     * 获得联盟的公开信息
     * @param int $allianceId
     * @return AlliancePublicInformation
     * @throws Api\EsiCallException
     */
    public function getAlliancePublicInformation(int $allianceId): AlliancePublicInformation;

    /**
     * 根据角色ID批量获得这些角色的势力
     * @param int[] $characterIds
     * @return CharacterAffiliation[]
     * @throws Api\EsiCallException
     */
    public function getCharacterAffiliation(array $characterIds): array;

    /**
     * 获得类型信息
     * @param int $typeId
     * @return TypeInformation
     * @throws Api\EsiCallException
     */
    public function getUniverseType(int $typeId): TypeInformation;

    /**
     * 获得星域信息
     * @param int $regionId
     * @return RegionInformation
     * @throws Api\EsiCallException
     */
    public function getRegionInformation(int $regionId): RegionInformation;
}