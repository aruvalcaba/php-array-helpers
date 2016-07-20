<?php

namespace BlackLabel;

class ArrayPullTest extends \PHPUnit_Framework_TestCase
{
    public function arrayPullDataProvider()
    {
        return [
            [ 
                ['hello','foo'],['foo' => 'bar', 'fizz' => 'buzz', 'hello' => 'world' ], ['hello' => 'world','foo'=>'bar'], ['fizz' => 'buzz']
            ],
            [
                ['hello','world','foo','bar'],['bar'=>'soap'],['bar' => 'soap'],[]
            ],
            [
                [],[],[],[]
            ],
            [
                ['hello','world','foo','bar'],['hello','world','foo','bar'],[],['hello','world','foo','bar']
            ]
        ];
    }

    public function arrayPullTypeErrorProvider()
    {
        return [
            [ null, ['hello','world','foo','bar'] ],
            [ null,null ],
            [ ['foo' => 'bar', 'fizz' => 'buzz', 'hello' => 'world' ], null ]
        ];       
    }

    /**
     * @dataProvider arrayPullDataProvider
     */
    public function testArrayPull(array $keys, array $origin,array $expectedArray,array $manipulated)
    {
        $pulledArray = array_pull($origin,$keys);
        $this->assertTrue($expectedArray == $pulledArray);
        $this->assertTrue($origin == $manipulated);
    }
    
    /**
     * @dataProvider arrayPullTypeErrorProvider
     */
    public function testArrayPullNullOrigin($origin,$keys)
    {
        $this->setExpectedException(\TypeError::class);

        $pulledArray = array_pull($origin,$keys);
    }
}
