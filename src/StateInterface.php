<?php

declare(strict_types=1);

namespace Kiboko\Contract\Action;

interface StateInterface
{
    public function initialize(): void;
    public function accept(int $step = 1): void;
    public function reject(int $step = 1): void;
    public function error(int $step = 1): void;
    public function teardown(): void;
}
