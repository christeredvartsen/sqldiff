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
 * @subpacakge Mysql
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */

namespace SqlDiff\Mysql;

use SqlDiff\Database\Table\Column as AbstractColumn;
use SqlDiff\Database\Table\ColumnInterface;

/**
 * Class representing a MySQL column
 *
 * @package SqlDiff
 * @subpacakge Mysql
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */
class Column extends AbstractColumn implements ColumnInterface {
    /**
     * Column collation
     *
     * @var string
     */
    private $collation;

    /**
     * Character set of the column
     *
     * @var string
     */
    private $charset;

    /**
     * Get the collation
     *
     * @return string
     */
    public function getCollation() {
        return $this->collation;
    }

    /**
     * Set the collation
     *
     * @param string $collation
     * @return SqlDiff\Mysql\Column 
     */
    public function setCollation($collation) {
        $this->collation = $collation;

        return $this;
    }

    /**
     * Get the charset
     *
     * @return string
     */
    public function getCharset() {
        return $this->charset;
    }

    /**
     * Set the charset
     *
     * @param string $charset
     * @return SqlDiff\Mysql\Column 
     */
    public function setCharset($charset) {
        $this->charset= $charset;

        return $this;
    }

    /**
     * @see SqlDiff\Database\Table\ColumnInterface::getDefinition()
     */
    public function getDefinition() {
        $sql = '`' . $this->getName() . '` ' . $this->getType() . '';

        if ($this->getAttribute()) {
            $sql .= ' ' . $this->getAttribute();
        }

        if ($this->getCharset()) {
            $sql .= ' CHARACTER SET ' . $this->getCharset();
        }

        if ($this->getCollation()) {
            $sql .= ' COLLATE ' . $this->getCollation();
        }

        if ($this->getNotNull()) {
            $sql .= ' NOT NULL';
        }

        $default = $this->getDefault();

        if ($default !== null) {
            $sql .= ' DEFAULT \'' . $default . '\'';
        }

        if ($this->getAutoIncrement()) {
            $sql .= ' AUTO_INCREMENT';
        }

        return $sql;
    }
}
