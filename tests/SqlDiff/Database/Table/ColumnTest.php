<?php
/**
 * SqlDiff
 *
 * Copyright (c) 2011 Christer Edvartsen <cogo@starzinger.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * * The above copyright notice and this permission notice shall be included in
 *   all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 *
 * @package SqlDiff
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */

namespace SqlDiff\Database\Table;

/**
 * @package SqlDiff
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */
class ColumnTest extends \PHPUnit_Framework_TestCase {
    /**
     * Column instance
     *
     * @var SqlDiff\Database\Table\Column
     */
    private $col;

    /**
     * Set up method
     */
    public function setUp() {
        $this->col = new ColumnStub();
    }

    /**
     * Tear down method
     */
    public function tearDown() {
        $this->col = null;
    }

    /**
     * Test the set'er and get'er for the table attribute
     */
    public function testSetGetTable() {
        $table = $this->getMock('SqlDiff\\Database\\TableInterface');
        $this->col->setTable($table);
        $this->assertSame($table, $this->col->getTable());
    }

    /**
     * Test the set'er and get'er for the not null flag
     */
    public function testSetGetNotNull() {
        $this->assertNull($this->col->getNotNull());

        $this->col->setNotNull(true);
        $this->assertTrue($this->col->getNotNull());
        $this->col->setNotNull(false);
        $this->assertFalse($this->col->getNotNull());
    }

    /**
     * Test the set'er and get'er for the default attribute
     */
    public function testSetGetDefault() {
        $default = 'default';
        $this->col->setDefault($default);
        $this->assertSame($default, $this->col->getDefault());
    }

    /**
     * Test the set'er and get'er for the auto increment flag
     */
    public function testSetGetAutoIncrement() {
        $this->assertNull($this->col->getAutoIncrement());
        $this->col->setAutoIncrement(true);
        $this->assertTrue($this->col->getAutoIncrement());
        $this->col->setAutoIncrement(false);
        $this->assertFalse($this->col->getAutoIncrement());
    }

    /**
     * Test the set'er and get'er for the "key" attribute
     */
    public function testSetGetKey() {
        $key = 'PRIMARY KEY';
        $this->col->setKey($key);
        $this->assertSame($key, $this->col->getKey());
    }

    /**
     * Test the set'er and get'er for the "name" attribute
     */
    public function testSetGetName() {
        $name = 'Name';
        $this->col->setName($name);
        $this->assertSame($name, $this->col->getName());
    }

    /**
     * Test the set'er and get'er for the "type" attribute
     */
    public function testSetGetType() {
        $type = 'INT (10)';
        $this->col->setType($type);
        $this->assertSame($type, $this->col->getType());
    }

    /**
     * Test the set'er and get'er for the "attribute" attribute
     */
    public function testSetGetAttribute() {
        $attribute = 'unsigned';
        $this->col->setAttribute($attribute);
        $this->assertSame($attribute, $this->col->getAttribute());
    }
}

class ColumnStub extends Column {
    public function getDefinition() {
        return 'some definition';
    }
}
