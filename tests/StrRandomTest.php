<?php

namespace BlackLabel;

class StrRandomTest extends \PHPUnit_Framework_TestCase
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
            [3.14],
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
     */
    public function testStrRandomFailure($length)
    {
        $this->setExpectedException(\RuntimeException::class);

        $string = str_random($length);
    }
}

