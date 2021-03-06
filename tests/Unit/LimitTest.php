<?php

namespace SimpleORM\Tests\Unit;

use SimpleORM\Queriables\Limit;
use SimpleORM\Tests\TestCase;

class LimitTest extends TestCase
{

    /** @test */
    public function it_makes_a_top_limit()
    {
        $limit = new Limit(3);

        $select = $limit->exec('select * from mytb');

        $this->assertEquals('select top 3 * from mytb', $select);
    }
}
