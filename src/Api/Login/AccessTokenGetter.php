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

namespace RazeSoldier\SerenityEsi\Api\Login;

use JsonMapper_Exception;
use Nyholm\Psr7\Stream;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\StreamInterface;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Api\EsiException;
use RazeSoldier\SerenityEsi\Http\HttpQuery;
use RazeSoldier\SerenityEsi\Model\Login\AccessToken;
use RazeSoldier\SerenityEsi\ModelMapping;

/**
 * 该类用于获得刷新令牌
 * @package RazeSoldier\SerenityEsi\Api\Login
 */
class AccessTokenGetter
{
    use HttpQuery, ModelMapping;

    /**
     * 国服ESI的client_id
     */
    public const CLIENT_ID = 'bc90aa496a404724a93f41b4f4e97761';

    protected string $refreshToken;
    protected array $scopes;
    protected array $headerMap = ['Content-Type' => 'application/x-www-form-urlencoded'];

    private function __construct()
    {
    }

    public static function newInstance(string $refreshToken, array $scopes = []): self
    {
        $getter = new self();
        $getter->refreshToken = $refreshToken;
        $getter->scopes = $scopes;
        return $getter;
    }

    /**
     * @return AccessToken
     * @throws EsiCallException
     */
    public function get(): AccessToken
    {
        try {
            $resp = $this->sendHttpRequest();
        } catch (ClientExceptionInterface $e) {
            throw new EsiCallException($e);
        }
        $content = $resp->getBody()->getContents();
        if ($resp->getStatusCode() !== 200) {
            $e = new EsiException($resp, $content);
            throw new EsiCallException($e);
        }

        try {
            return $this->json2Model(json_decode($content), AccessToken::class);
        } catch (JsonMapper_Exception $e) {
            throw new EsiCallException($e->getMessage(), $e);
        }
    }

    protected function getHttpMethod(): string
    {
        return 'POST';
    }

    public function getDomain(): string
    {
        return 'login.evepc.163.com';
    }

    protected function getPath(): string
    {
        return '/v2/oauth/token';
    }

    protected function getQueryString(): string
    {
        return '';
    }

    protected function getBody():? StreamInterface
    {
        $scopes = implode(' ', $this->scopes);
        $token = urlencode($this->refreshToken);
        return Stream::create("grant_type=refresh_token&refresh_token=$token&client_id=" . self::CLIENT_ID . "&scope=$scopes");
    }
}
