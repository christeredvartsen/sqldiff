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
 * @subpackage Interfaces
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */

namespace SqlDiff\Database\Table;

use SqlDiff\Database\TableInterface;
use SqlDiff\Database\Table\ColumnInterface;

/**
 * Interface for table indexes
 *
 * @package SqlDiff
 * @subpackage Interfaces
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/sqldiff
 */
interface IndexInterface {
    /**
     * Get the definition of this index
     *
     * @return string
     */
    function getDefinition();

    /**
     * Get the table this index belongs to
     *
     * @return SqlDiff\Database\TableInterface
     */
    function getTable();

    /**
     * Set the table this index belongs to
     *
     * @param SqlDiff\Database\TableInterface $table
     * @return SqlDiff\Database\Table\Index
     */
    function setTable(TableInterface $table);

    /**
     * Get the name of the index
     *
     * @return string
     */
    function getName();

    /**
     * Set the name of the index
     *
     * @param string $name
     * @return SqlDiff\Database\Table\IndexInterface
     */
    function setName($name);

    /**
     * Get the type of the index
     *
     * @return string
     */
    function getType();

    /**
     * Set the type of the index
     *
     * @param string $type
     * @return SqlDiff\Database\Table\IndexInterface
     */
    function setType($type);

    /**
     * Get the fields this index covers
     *
     * @return array
     */
    function getFields();

    /**
     * Add a single field to the index
     *
     * @param SqlDiff\Database\Table\ColumnInterface $field
     * @return SqlDiff\Database\Table\IndexInterface
     */
    function addField(ColumnInterface $field);

    /**
     * Add several fields to the index
     *
     * @param array $fields Array of SqlDiff\Database\Table\ColumnInterface objects
     * @return SqlDiff\Database\Table\IndexInterface
     */
    function addFields(array $fields);
}
