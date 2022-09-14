<?php

namespace Alexsokolianskiy\ProcessManager;

use Alexsokolianskiy\ProcessManager\CommandRunner;
use Alexsokolianskiy\ProcessManager\Utils\Linux\Signal;
use Alexsokolianskiy\ProcessManager\Utils\Linux\PSParser;

class LinuxProcessManager extends ProcessManager
{
    private CommandRunner $commandRunner;

    public function __construct()
    {
        $this->commandRunner = new CommandRunner();
    }
    public function list(): array
    {
        $output = $this->commandRunner->run('ps -aux');
        $psParser = new PSParser($output);
        return $psParser->getData();
    }
    public function getPid(string $pattern): int|null
    {
        $grepResult = $this->grep($pattern);
        if ($grepResult && $grepResult[0]->user) {
            return $grepResult[0]->PID;
        }
        return null;
    }

    public function grep(string $pattern): array
    {
        $output = $this->commandRunner->run('ps -aux | grep ' . escapeshellarg($pattern));
        $psParser = new PSParser($output);
        return $psParser->getData();
    }

    public function kill(int $pid, Signal $signal = Signal::SIGKILL): void
    {
        $sig = $signal->value;
        $this->commandRunner->run("kill -s $sig $pid");
    }
}
