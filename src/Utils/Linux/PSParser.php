<?php

namespace Alexsokolianskiy\ProcessManager\Utils\Linux;

use Exception;

class PSParser
{
    protected array $parsedOutput = [];
    public function __construct(private ?string $output = '')
    {
        $exploded = explode("\n", $this->output);
        array_shift($exploded);
        $this->parsedOutput = $exploded;
    }

    public function getData() : array
    {
        $list = [];

        foreach ($this->parsedOutput as $row) {
            try {
                $list[] = ProcessList::fromString($row);
            } catch (Exception $e) {
                continue;
            }
        }

        return $list;


    }
}