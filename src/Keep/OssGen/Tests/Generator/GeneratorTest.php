<?php

namespace Keep\OssGen\Tests\Generator;

use PHPUnit_Framework_TestCase;
use Keep\OssGen\Generator\Generator;
use Keep\OssGen\Generator\Error as GenError;

/**
* Full test battery for the license generator
*
* source = file that contains a boilerplate for the license
*/
class GeneratorTest extends PHPUnit_Framework_TestCase
{   
    /**
     * init. yay!
     */
    public function setUp()
    {
        $this->sources_dir = realpath(dirname(__FILE__) . '/sources'); 
    }

    /**
     * Test with a source that does not exists
     */
    public function testSourceNotFound()
    {
        $gen = new Generator($this->sources_dir);

        try {
            $gen->generate('doesnotexists', 'Jessé Alves Galdino', '2013');
        } catch (GenError $e) {
            return;   
        }

        $this->fail('unexistent source error not thrown');
    }

    /**
     * test with a source that exists
     */
    public function testSourceFound()
    {
        $gen = new Generator($this->sources_dir);

        $gen->generate('mit', 'Jessé Alves Galdino', '2013');
    }

    /**
     * Test the license generated content
     */
    public function testContent()
    {
        $text = <<<eof
Copyright (c) 2013 Jessé Alves Galdino

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
eof;

        $gen = new Generator($this->sources_dir);

        $license = $gen->generate('mit', 'Jessé Alves Galdino', '2013');

        $this->assertEquals($text, $license, 'The license was not returned');
    }
}