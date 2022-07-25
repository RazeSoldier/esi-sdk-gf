<?php

namespace Tests\Api\Insurance;

use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Api\Insurance\ListInsuranceLevel;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Model\Insurance\InsuranceLevels;
use RazeSoldier\SerenityEsi\Model\Insurance\InsurancePrices;

class ListInsuranceLevelTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $res = ListInsuranceLevel::v1()->get();
        $this->assertInstanceOf(InsurancePrices::class, $res[0]);
        $this->assertInstanceOf(InsuranceLevels::class, $res[0]->levels[0]);
    }
}
