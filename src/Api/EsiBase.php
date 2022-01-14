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

namespace RazeSoldier\SerenityEsi\Api;

use JsonMapper_Exception;
use Psr\Http\Client\ClientExceptionInterface as ClientException;
use RazeSoldier\SerenityEsi\Http\HttpQuery;
use RazeSoldier\SerenityEsi\Http\ResponseHelper;
use RazeSoldier\SerenityEsi\ModelMapping;
use RazeSoldier\SerenityEsi\SerenityEsiDomain;

/**
 * 所有ESI API类的基类。公开API应该直接扩展本类，需要登录的API则应该扩展{@link AuthEsiBase}
 * @package RazeSoldier\SerenityEsi\Api
 */
abstract class EsiBase implements EsiApi
{
    use SerenityEsiDomain, HttpQuery, ModelMapping, ResponseHelper;

    /**
     * @var string 接口的版本。必须在子类里定义。
     */
    protected string $version;

    /**
     * @var string 接口的接入URL（不包括版本）。必须在子类里定义。
     */
    protected string $endpoint;

    /**
     * @var string HTTP请求方法。（默认GET）
     */
    protected string $httpMethod = 'GET';

    /**
     * @var array 接入URL里的参数（key为$endpoint里被大括号括住的参数,value为参数的值）
     */
    protected array $paramMap = [];

    /**
     * @var array 查询字符串的映射
     */
    protected array $queryMap = [];

    /**
     * @var array HTTP头部信息
     */
    protected array $headerMap = [];

    /**
     * 默认阻止子类可以被实例化
     */
    protected function __construct(){}

    /**
     * @return mixed|object
     * @throws EsiCallException
     */
    public function get()
    {
        try {
            $resp = $this->sendHttpRequest();
        } catch (ClientException $e) {
            throw new EsiCallException($e->getMessage(), $e);
        }
        // 如果响应的状态码不是200或者304，则说明ESI调用失败，抛出异常
        if ($resp->getStatusCode() !== 200 && $resp->getStatusCode() !== 304) {
            $e = new EsiException($resp);
            throw new EsiCallException($e->getMessage(), $e);
        }

        $this->httpResponse = $resp;
        $json = json_decode($resp->getBody()->getContents());
        if (empty($json)) {
            return null;
        }

        return $this->handleResponse($json);
    }

    /**
     * @throws EsiCallException
     */
    private function handleResponse($json)
    {
        try {
            if (is_array($json)) {
                return $this->arrayJson2Model($json, $this->getModelClassName());
            } elseif (is_object($json)) {
                return $this->json2Model($json, $this->getModelClassName());
            } else {
                return $json;
            }
        } catch (JsonMapper_Exception $e) {
            throw new EsiCallException($e->getMessage(), $e);
        }
    }

    /**
     * 子类必须实现这个方法。该方法返回一个数据模型类的完全限定名称
     * @return string|null 数据模型类的完全限定名称。当响应的JSON为一维的数组或一个纯量时，请返回NULL
     */
    abstract protected function getModelClassName(): ?string;

    protected function getPath(): string
    {
        if (empty($this->paramMap)) {
            return "/$this->version/$this->endpoint/";
        }
        $path = $this->endpoint;
        foreach ($this->paramMap as $key => $value) {
            $path = str_replace('{'.$key.'}', $value, $path);
        }
        return "/$this->version/$path/";
    }

    protected function getQueryString(): string
    {
        if (empty($this->queryMap)) {
            return '';
        }
        $queryStr = '';
        foreach ($this->queryMap as $key => $value) {
            $queryStr .= "$key=$value&";
        }
        return rtrim($queryStr, '&');
    }

    protected function getHttpMethod(): string
    {
        return $this->httpMethod;
    }
}
