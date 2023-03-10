<?php

declare(strict_types=1);

namespace Kiboko\Contract\Action;

interface RunnableInterface
{
    public function run(): int;
}
