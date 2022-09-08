<?php

namespace Alexsokolianskiy\ProcessManager\Tests;


class TestCase extends \PHPUnit\Framework\TestCase {
  public function setUp(): void {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app) {
    return [

    ];
  }

  protected function getEnvironmentSetUp($app) {
    // perform environment setup
  }

}