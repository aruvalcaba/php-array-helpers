<?php

namespace BlackLabel;

/**
 * @author Alan Ruvalcaba <aruval3@gmail.com>
 */
class StrRandomTest extends TestCase
{
    function strRandomDataProviderSuccess()
    {
        return [
            [1],
            [16],
            [64],
            [256],
            [1024]
        ];
    }

    function strRandomDataProviderFailure()
    {
        return [
            ['hello world'],
            [null],
            [[]],
            [new \stdClass]
        ];
    }

    /**
     * @dataProvider strRandomDataProviderSuccess
     */
    public function testStrRandomSuccess($length)
    {
        $string = str_random($length);
        
        $this->assertTrue(is_string($string));
        $this->assertEquals($length,strlen($string));        
    }
    
    /**
     * @dataProvider strRandomDataProviderFailure
     * @expectedException TypeError
     */
    public function testStrRandomFailure($length)
    {
        $string = str_random($length);
    }
}

