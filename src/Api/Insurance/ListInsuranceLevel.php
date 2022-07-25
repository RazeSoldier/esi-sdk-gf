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

namespace RazeSoldier\SerenityEsi\Api\Insurance;

use RazeSoldier\SerenityEsi\Api\EsiBase;
use RazeSoldier\SerenityEsi\Api\PublicApi;
use RazeSoldier\SerenityEsi\Model\Insurance\InsurancePrices;

/**
 * 获得所有船只可用的保险等级
 * <pre>
 * Return available insurance levels for all ship types
 * Route: /v1/insurance/prices/
 * This route is cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Insurance
 * @method InsurancePrices[] get()
 */
class ListInsuranceLevel extends EsiBase implements PublicApi
{
    protected string $endpoint = 'insurance/prices';

    public static function v1(): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->queryMap['language'] = 'zh';
        return $api;
    }

    public static function latest(): self
    {
        return self::v1();
    }

    /**
     * @inheritDoc
     */
    protected function getModelClassName(): ?string
    {
        return InsurancePrices::class;
    }
}
