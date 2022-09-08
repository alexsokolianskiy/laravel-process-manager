<?php

namespace Alexsokolianskiy\ProcessManager;

use Alexsokolianskiy\ProcessManager\Utils\Linux\Signal;

abstract class ProcessManager
{
    abstract public function list(): array;
    abstract public function getPid(string $pattern): int|null;
    abstract public function kill(int $pid, Signal $signal = Signal::SIGKILL): void;
}
