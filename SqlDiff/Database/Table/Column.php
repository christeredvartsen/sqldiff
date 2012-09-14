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
abstract class Column {
    /**
     * The table object this column belongs to
     *
     * @var SqlDiff\Database\TableInterface
     */
    private $table;

    /**
     * Type of column (CHAR, INT, ...)
     *
     * @var string
     */
    private $type;

    /**
     * >ttributes to the column
     *
     * @var string
     */
    private $attribute;

    /**
     * Name of the column
     *
     * @var string
     */
    private $name;

    /**
     * Wether or not the column can be null
     *
     * @var boolean
     */
    private $notNull;

    /**
     * Default value
     *
     * @var string
     */
    private $default;

    /**
     * Wether or not the field is an auto increment
     *
     * @var boolean
     */
    private $autoIncrement;

    /**
     * The column key
     *
     * @var string
     */
    private $key;

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setTable()
     */
    public function setTable(TableInterface $table) {
        $this->table = $table;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getTable()
     */
    public function getTable() {
        return $this->table;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setType()
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getType()
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setAttribute()
     */
    public function setAttribute($attribute) {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getAttribute()
     */
    public function getAttribute() {
        return $this->attribute;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getNotNull()
     */
    public function getNotNull() {
        return $this->notNull;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setNotNull()
     */
    public function setNotNull($flag) {
        $this->notNull = (bool) $flag;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getDefault()
     */
    public function getDefault() {
        return $this->default;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setDefault()
     */
    public function setDefault($default) {
        $this->default = $default;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getAutoIncrement()
     */
    public function getAutoIncrement() {
        return $this->autoIncrement;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setAutoIncrement()
     */
    public function setAutoIncrement($flag) {
        $this->autoIncrement = (bool) $flag;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getName()
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setName()
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getKey()
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::setKey()
     */
    public function setKey($key) {
        $this->key = $key;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getPosition()
     */
    public function getPosition() {
        return $this->getTable()->getColumnPosition($this);
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getPreviousColumn()
     */
    public function getPreviousColumn() {
        $curPos = $this->getTable()->getColumnPosition($this);

        // If this is the first column, return null
        if (!$curPos) {
            return null;
        }

        return $this->getTable()->getColumnByPosition($curPos - 1);
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getNextColumn()
     */
    public function getNextColumn() {
        $curPos  = $this->getTable()->getColumnPosition($this);
        $numCols = $this->getTable()->getNumColumns();

        // If this is the first column, return null
        if ($curPos < ($numCols - 1)) {
            return $this->getTable()->getColumnByPosition($curPos + 1);
        }

        return null;
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
