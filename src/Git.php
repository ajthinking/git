<?php

namespace Ajthinking\Git;

use Exception;

class Git
{
	protected $bin = '/usr/bin/git';
	protected $cwd = __DIR__;
	protected $envopts = [];	
	
	public function setBin($path)
	{
		$this->bin = $path;
	}

	public function getBin()
	{
		return $this->bin;
	}

	public function clone($remote, $repoPath = null)
	{
		return $this->run('clone '.$remote.' '.$repoPath);
	}

	public function version() {
		return $this->run('--version');
	}

	public function run($command)
	{
		return $this->runCommand($this->bin.' '.$command);
	}

	public function setenv($key, $value)
	{
		$this->envopts[$key] = $value;
	}	

	protected function runCommand($command)
	{
		$descriptorspec = [
			1 => ['pipe', 'w'],
			2 => ['pipe', 'w'],
		];
		$pipes = [];
		/* Depending on the value of variables_order, $_ENV may be empty.
		 * In that case, we have to explicitly set the new variables with
		 * putenv, and call proc_open with env=null to inherit the reset
		 * of the system.
		 *
		 * This is kind of crappy because we cannot easily restore just those
		 * variables afterwards.
		 *
		 * If $_ENV is not empty, then we can just copy it and be done with it.
		 */
		if(count($_ENV) === 0) {
			$env = NULL;
			foreach($this->envopts as $k => $v) {
				putenv(sprintf("%s=%s",$k,$v));
			}
		} else {
			$env = array_merge($_ENV, $this->envopts);
		}
		$cwd = $this->cwd ?? $this->repoPath;
		$resource = proc_open($command, $descriptorspec, $pipes, $cwd, $env);

		$stdout = stream_get_contents($pipes[1]);
		$stderr = stream_get_contents($pipes[2]);
		foreach ($pipes as $pipe) {
			fclose($pipe);
		}

		$status = trim(proc_close($resource));
		if ($status) throw new Exception($stderr . "\n" . $stdout); //Not all errors are printed to stderr, so include std out as well.

		return $stdout;
	}	
}