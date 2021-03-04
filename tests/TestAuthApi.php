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

namespace Tests;

use RazeSoldier\SerenityEsi\Api\Login\AccessTokenGetter;

/**
 * 帮助需要登录的测试
 * @package Tests
 */
trait TestAuthApi
{
    public function getAuthCharacterId()
    {
        return getenv('ESI_TEST_CHARACTER_ID');
    }

    public function getAuthToken()
    {
        return getenv('ESI_TEST_CHARACTER_TOKEN');
    }

    public function getAccessToken(string $scope): string
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return AccessTokenGetter::newInstance($this->getAuthToken(), [$scope])->get()->access_token;
    }

    /**
     * 检查环境变量是否有对应
     */
    public function checkAuthOrSkip()
    {
        if ($this->getAuthCharacterId() === false || $this->getAuthToken() === false) {
            $this->markTestSkipped('No character id or token set');
        }
    }
}