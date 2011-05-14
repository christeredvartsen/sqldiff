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

/** @see SqlDiff\Autoload */
require __DIR__ . '/../SqlDiff/Autoload.php';

set_include_path(
    get_include_path() . PATH_SEPARATOR .
    __DIR__
);

// Autoloader for namespaced classes in the include_path
spl_autoload_register(function($className) {
    $filename = str_replace('\\', '/', $className) . '.php';

    foreach (explode(PATH_SEPARATOR, get_include_path()) as $path) {
        $absPath = rtrim($path, '/') . '/' . $filename;

        if (is_file($absPath)) {
            require $absPath;
            return true;
        }
    }
});

/** \Mockery\Loader */
require_once 'Mockery/Loader.php';

$loader = new \Mockery\Loader();
$loader->register();
