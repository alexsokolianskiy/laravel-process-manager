<?php

namespace Alexsokolianskiy\ProcessManager\Tests\Unit;

use Alexsokolianskiy\ProcessManager\LinuxProcessManager;
use Alexsokolianskiy\ProcessManager\Tests\TestCase;
use Alexsokolianskiy\ProcessManager\Utils\Linux\ProcessList;

class ProcessTest extends TestCase
{
  public function test_list_should_contain_only_process_list_objects()
  {
    $lpm = new LinuxProcessManager();
    $processes = $lpm->list();
    $this->assertContainsOnlyInstancesOf(ProcessList::class, $processes);
  }

  public function test_pid_sould_be_found_by_command_name()
  {
    $splash = '/sbin/init splash';
    $lpm = new LinuxProcessManager();
    $pid = $lpm->getPid($splash);
    $this->assertIsInt($pid);
  }

  public function test_grep_should_contain_only_process_list_objects()
  {
    $splash = '/sbin/init splash';
    $lpm = new LinuxProcessManager();
    $processes = $lpm->grep($splash);
    $this->assertContainsOnlyInstancesOf(ProcessList::class, $processes);
  }
}
