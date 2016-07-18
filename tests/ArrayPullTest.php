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

    /**
     * @dataProvider arrayPullDataProvider
     */
    public function testArrayPull(array $keys, array $origin,array $expectedArray,array $manipulated)
    {
        $pulledArray = array_pull($origin,$keys);
        $this->assertTrue($expectedArray == $pulledArray);
        $this->assertTrue($origin == $manipulated);
    }
}
