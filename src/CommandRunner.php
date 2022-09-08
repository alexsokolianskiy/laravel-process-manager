<?php

namespace Alexsokolianskiy\ProcessManager;

use Alexsokolianskiy\ProcessManager\Utils\Linux\Exceptions\OperationNotPermitted;

class CommandRunner
{

    public function run(string $command)
    {
        $output = shell_exec($command);
        if (strpos('Operation not permitted', $output) === false) {
            return $output;
        }

        throw new OperationNotPermitted("$command [Operation not permitted]");
    }
    
}