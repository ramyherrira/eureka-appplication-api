<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Application\Tests\Helper;

use PHPUnit\Framework\MockObject\MockBuilder;

/**
 * Trait UserHelperTrait
 *
 * @author Romain Cottard
 */
trait UserHelperTrait
{
    abstract public function getMockBuilder(string $className): MockBuilder;
}
