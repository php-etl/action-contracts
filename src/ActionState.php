<?php

declare(strict_types=1);

namespace Kiboko\Contract\Action;

final class ActionState implements StateInterface
{
    private array $metrics = [];

    public function __construct(
        private StateInterface $decorated,
    ) {
    }

    public function initialize(int $start = 0): void
    {
        $this->metrics = [
            'accept' => 0,
            'reject' => 0,
            'error' => 0,
        ];

        $this->decorated->initialize($start);
    }

    public function accept(int $step = 1): void
    {
        $this->metrics['accept'] += $step;
        $this->decorated->accept($step);
    }

    public function reject(int $step = 1): void
    {
        $this->metrics['reject'] += $step;
        $this->decorated->reject($step);
    }

    public function error(int $step = 1): void
    {
        $this->metrics['error'] += $step;
        $this->decorated->error($step);
    }

    public function observeAccept(): callable
    {
        return fn () => $this->metrics['accept'];
    }

    public function observeReject(): callable
    {
        return fn () => $this->metrics['reject'];
    }

    public function teardown(): void
    {
        $this->decorated->teardown();
    }
}
