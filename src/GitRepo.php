<?php

namespace Ajthinking\Git;

use Exception;

class GitRepo {

	protected $repoPath = null;
	protected $bare = false;
	protected $envopts = [];

	public function add($files = "*")
	{
		if (is_array($files)) {
			$files = '"'.implode('" "', $files).'"';
		}
		return $this->run("add $files -v");
	}

	public function rm($files = "*", $cached = false)
	{
		if (is_array($files)) {
			$files = '"'.implode('" "', $files).'"';
		}
		return $this->run("rm ".($cached ? '--cached ' : '').$files);
	}

	public function commit($message = "", $commitAll = true)
	{
		$flags = $commitAll ? '-av' : '-v';
		return $this->run("commit " . $flags . " -m " . escapeshellarg($message));
	}

	public function clean($dirs = false, $force = false)
	{
		return $this->run("clean".(($force) ? " -f" : "").(($dirs) ? " -d" : ""));
	}

	public function createBranch($branch)
	{
		return $this->run("branch " . escapeshellarg($branch));
	}

	public function checkout($branch)
	{
		return $this->run("checkout " . escapeshellarg($branch));
	}

	public function fetch()
	{
		return $this->run("fetch");
	}

	public function push($remote = "", $branch = "")
	{
		return $this->run("push $remote $branch");
	}

	public function pull($remote = "", $branch = "")
	{
		return $this->run("pull $remote $branch");
	}

	public function setenv($key, $value)
	{
		$this->envopts[$key] = $value;
	}
}