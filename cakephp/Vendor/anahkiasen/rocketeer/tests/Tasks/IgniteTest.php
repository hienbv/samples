<?php
namespace Rocketeer\Tasks;

use Rocketeer\RocketeerServiceProvider;
use Rocketeer\TestCases\RocketeerTestCase;

class IgniteTest extends RocketeerTestCase
{
	public function testCanIgniteConfigurationOnWindows()
	{
		unset($this->app['path']);
		$this->app['path.base'] = 'E:\workspace\test';

		$provider = new RocketeerServiceProvider($this->app);
		$provider->bindPaths();

		$this->mockFiles(function ($mock) {
			return $mock
				->shouldReceive('files')->andReturn([])
				->shouldReceive('glob')->andReturn([])
				->shouldReceive('copyDirectory')->once()->with(realpath(__DIR__.'/../../src/config'), 'E:/workspace/test/.rocketeer');
		});

		$this->pretendTask('Ignite')->execute();
	}

	public function testCanIgniteConfigurationOnWindowsInLaravel()
	{
		$this->app['path.base'] = 'E:\workspace\test';
		$this->app['path']      = 'E:\workspace\test\app';

		$provider = new RocketeerServiceProvider($this->app);
		$provider->bindPaths();

		$this->mockFiles(function ($mock) {
			return $mock
				->shouldReceive('exists')->andReturn(true)
				->shouldReceive('files')->andReturn([])
				->shouldReceive('glob')->andReturn([])
				->shouldReceive('copyDirectory')->once()->with(realpath(__DIR__.'/../../src/config'), 'E:/workspace/test/app/config/packages/anahkiasen/rocketeer');
		});

		$this->pretendTask('Ignite')->execute();
	}

	public function testCanIgniteConfigurationOutsideLaravel()
	{
		$command = $this->getCommand(array('ask' => 'foobar'));

		$server = $this->server;
		$this->mock('rocketeer.igniter', 'Configuration', function ($mock) use ($server) {
			return $mock
				->shouldReceive('exportConfiguration')->once()->andReturn($server)
				->shouldReceive('updateConfiguration')->once()->with($server, array(
					'connection'       => 'production',
					'scm_repository'   => 'https://github.com/'.$this->repository,
					'scm_username'     => '',
					'scm_password'     => '',
					'application_name' => 'foobar',
				));
		});

		$this->assertTaskOutput('Ignite', 'Rocketeer configuration was created', $command);
	}

	public function testCanIgniteConfigurationInLaravel()
	{
		$command = $this->getCommand(array('isInsideLaravel' => true));
		$command->shouldReceive('call')->with('config:publish', array('package' => 'anahkiasen/rocketeer'))->andReturn('foobar');

		$path = $this->app['path'].'/config/packages/anahkiasen/rocketeer';
		$this->mock('rocketeer.igniter', 'Configuration', function ($mock) use ($path) {
			return $mock
				->shouldReceive('exportConfiguration')->never()
				->shouldReceive('updateConfiguration')->once()->with($path, array(
					'connection'       => 'production',
					'scm_repository'   => 'https://github.com/'.$this->repository,
					'scm_username'     => '',
					'scm_password'     => '',
					'application_name' => '',
				));
		});

		$this->assertTaskOutput('Ignite', 'anahkiasen/rocketeer', $command);
	}
}
