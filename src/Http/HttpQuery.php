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

namespace RazeSoldier\SerenityEsi\Http;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface as Uri;

/**
 * 用于在类实现HTTP请求
 * @package RazeSoldier\SerenityEsi\Http
 */
trait HttpQuery
{
    use UseHttpCache;

    /**
     * 根据当前的对象状态来发起一次HTTP请求
     * @throws ClientException
     */
    public function sendHttpRequest(): Response
    {
        $request = HttpRequestFactory::make()
            ->createRequest($this->getHttpMethod(), $this->getUri());
        if (!empty($this->headerMap)) {
            foreach ($this->headerMap as $key => $value) {
                $request = $request->withHeader($key, $value);
            }
        }
        if (!empty($body = $this->getBody())) {
            $request = $request->withBody($body);
        }

        return HttpClientFactory::make()->sendRequest($request);
    }

    private function getUri(): Uri
    {
        return URIBuilder::new()
            ->withScheme('https')
            ->withHost($this->getDomain())
            ->withPath($this->getPath())
            ->withQuery($this->getQueryString());
    }

    abstract protected function getHttpMethod(): string;
    abstract public function getDomain(): string;
    abstract protected function getPath(): string;

    /**
     * @return string 返回查询字符串；如果没有想要返回的查询字符串请返回一个空字符串
     */
    abstract protected function getQueryString(): string;

    /**
     * 获得HTTP请求的body。
     * 子类可以覆盖此方法来设置HTTP请求的body
     * @return StreamInterface|null 返回HTTP请求的body。如果没有请返回NULL
     */
    protected function getBody():? StreamInterface
    {
        return null;
    }
}