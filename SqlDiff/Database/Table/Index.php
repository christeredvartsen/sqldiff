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

use SqlDiff\Database\TableInterface;

/**
 * Class representing a MySQL index
 *
 * @package SqlDiff
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */
abstract class Index {
    /**
     * The table this index belongs to
     *
     * @var SqlDiff\Database\TableInterface
     */
    private $table;

    /**
     * The name of the index
     *
     * @var string
     */
    private $name;

    /**
     * The type of the index
     *
     * @var string
     */
    private $type;

    /**
     * The fields this index is composed of
     *
     * @var array An array of SqlDiff\Database\Table\ColumnInterface objects
     */
    private $fields = array();

    /**
     * @see SqlDiff\Database\Table\IndexInterface::getTable()
     */
    public function getTable() {
        return $this->table;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::setTable()
     */
    public function setTable(TableInterface $table) {
        $this->table = $table;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::getName()
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::setName()
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::getType()
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::setType()
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::getFields()
     */
    public function getFields() {
        return $this->fields;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::addField()
     */
    public function addField(ColumnInterface $field) {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\IndexInterface::addFields()
     */
    public function addFields(array $fields) {
        foreach ($fields as $field) {
            $this->addField($field);
        }

        return $this;
    }

	/**
	 * Support for (string) typecasting
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->getName();
	}
}
