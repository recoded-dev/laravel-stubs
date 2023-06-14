<?php

namespace Tests;

use PHPUnit\Framework\Attributes\CoversNothing;

final class ExampleTest extends TestCase
{
    #[CoversNothing]
    public function test_example(): void
    {
        self::assertTrue(true); // @phpstan-ignore-line
    }
}
