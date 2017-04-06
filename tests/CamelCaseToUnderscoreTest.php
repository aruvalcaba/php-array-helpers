<?php

namespace BlackLabel;

/**
 * Description of CamelCaseToUnderscoreTest
 *
 * @author Alan Ruvalcaba <alan@worldnet-intl.com>
 */
class CamelCaseToUnderscoreTest extends \PHPUnit_Framework_TestCase
{
    function camelCaseToUnderscoreSuccess()
    {
        return [
            ['HelloWorld','hello_world'],
            ['Hello','hello'],
            ['HelloOuterSpace','hello_outer_space'],
            ['',''],
	];
    }
    
    /**
     * @dataProvider camelCaseToUnderscoreSuccess
     */
    public function testCamelCaseToUnderscoreSuccess($origin,$expected)
    {
        $actual = camel_to_underscore($origin);
        
        $this->assertTrue(is_string($actual));
        $this->assertEquals($expected, $actual);     
    }
}
