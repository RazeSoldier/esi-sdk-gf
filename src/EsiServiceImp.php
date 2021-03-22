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

use RazeSoldier\SerenityEsi\Model\{
    Alliance\AlliancePublicInformation,
    Character\CharacterAffiliation,
    Character\CharacterPublicInformation,
    Corporation\CorporationPublicInformation,
    Universe\RegionInformation,
    Universe\SolarSystemInformation,
    Universe\TypeInformation,
};

class EsiServiceImp implements EsiService
{
    /**
     * @param int $characterId
     * @return CharacterPublicInformation
     * @throws Api\EsiCallException
     */
    public function getCharacterPublicInformation(int $characterId): CharacterPublicInformation
    {
        return Api\Character\CharacterPublicInformation::latest($characterId)->get();
    }

    /**
     * @param int $corporationId
     * @return CorporationPublicInformation
     * @throws Api\EsiCallException
     */
    public function getCorporationPublicInformation(int $corporationId): CorporationPublicInformation
    {
        return Api\Corporation\CorporationPublicInformation::latest($corporationId)->get();
    }

    /**
     * @param int $allianceId
     * @return AlliancePublicInformation
     * @throws Api\EsiCallException
     */
    public function getAlliancePublicInformation(int $allianceId): AlliancePublicInformation
    {
        return Api\Alliance\AlliancePublicInformation::latest($allianceId)->get();
    }

    /**
     * @param int[] $characterIds
     * @return CharacterAffiliation[]
     * @throws Api\EsiCallException
     */
    public function getCharacterAffiliation(array $characterIds): array
    {
        return Api\Character\CharacterAffiliation::latest($characterIds)->get();
    }

    /**
     * @param int $typeId
     * @return TypeInformation
     * @throws Api\EsiCallException
     */
    public function getUniverseType(int $typeId): TypeInformation
    {
        return Api\Universe\TypeInformation::latest($typeId)->get();
    }

    /**
     * @param int $regionId
     * @return RegionInformation
     * @throws Api\EsiCallException
     */
    public function getRegionInformation(int $regionId): RegionInformation
    {
        return Api\Universe\RegionInformation::latest($regionId)->get();
    }

    /**
     * @param int $systemId
     * @return SolarSystemInformation
     * @throws Api\EsiCallException
     */
    public function getSolarSystemInformation(int $systemId): SolarSystemInformation
    {
        return Api\Universe\SolarSystemInformation::latest($systemId)->get();
    }
}
