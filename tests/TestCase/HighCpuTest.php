<?php

namespace App\Test\TestCase;

use App\Test\Factory\GeoDepartmentFactory;
use Cake\TestSuite\TestCase;

class HighCpuTest extends TestCase
{
    public function testHighCpuFromFactory()
    {
        $department = GeoDepartmentFactory::makeChain()->persist();

    }
}
