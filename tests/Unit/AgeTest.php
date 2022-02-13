<?php

namespace Tests\Unit;

use App\Http\Controllers\AgeController;
use PHPUnit\Framework\TestCase;

class AgeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_age()
    {
        $age = new AgeController();

        $this->assertEquals("ERROR", $age->showAge(-1));

        $this->assertEquals("ERROR", $age->showAge(0));
        $this->assertEquals("無料", $age->showAge(3));
        $this->assertEquals("無料", $age->showAge(5));

        $this->assertEquals("500円", $age->showAge(6));
        $this->assertEquals("500円", $age->showAge(10));
        $this->assertEquals("500円", $age->showAge(12));

        $this->assertEquals("1,000円", $age->showAge(13));
        $this->assertEquals("1,000円", $age->showAge(15));
        $this->assertEquals("1,000円", $age->showAge(17));

        $this->assertEquals("1,500円", $age->showAge(18));
        $this->assertEquals("1,500円", $age->showAge(88));
        $this->assertEquals("1,500円", $age->showAge(120));

        $this->assertEquals("ERROR", $age->showAge(121));

        $this->assertEquals("ERROR", $age->showAge(null));
        $this->assertEquals("無料", $age->showAge("0001"));
        $this->assertEquals("ERROR", $age->showAge("+"));
        $this->assertEquals("ERROR", $age->showAge("-"));
        $this->assertEquals("ERROR", $age->showAge("1+1"));
    }
}
