<?php

declare(strict_types=1);

namespace Kiboko\Contract\Action;

use Kiboko\Contract\Satellite\RunnableInterface;

interface ActionInterface extends RunnableInterface
{
    public function execute(): void;
}
