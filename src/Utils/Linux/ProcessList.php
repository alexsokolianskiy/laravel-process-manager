<?php

namespace Alexsokolianskiy\ProcessManager\Utils\Linux;

class ProcessList
{
    public ?string $user;
    public ?string $PID;
    public ?string $CPU;
    public ?string $MEM;
    public ?string $TTY;
    public ?string $stat;
    public ?string $start;
    public ?string $time;
    public ?string $command;

    public static function fromString(string $params)
    {
        $obj = new static();
        $rowItems = preg_split('/\s+/m', $params);
        if (count($rowItems) > 9) {
            $obj->user = $rowItems[0];
            $obj->PID = $rowItems[1];
            $obj->CPU = $rowItems[2];
            $obj->MEM = $rowItems[3];
            $obj->TTY = $rowItems[6];
            $obj->stat = $rowItems[7];
            $obj->start = $rowItems[8];
            $obj->time = $rowItems[9];
            $obj->command = implode(' ', array_slice($rowItems, 10, count($rowItems)));
        }
        return $obj;
    }
}
