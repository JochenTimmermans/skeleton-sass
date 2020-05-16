<?php
/**
 * sass:watch command for Skeleton Console
 *
 * @author Jochen Timmermans <jochen@tigron.be>
 */

namespace Skeleton\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Sass_Watch extends \Skeleton\Console\Command {

	/**
	 * Configure the Create command
	 *
	 * @access protected
	 */
	protected function configure() {
		$this->setName('sass:watch');
		$this->setDescription('Start SASS watcher');
	}

	/**
	 * Execute the Command
	 *
	 * @access protected
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		if (!file_exists(\Skeleton\Sass\Config::$watch_directory)) {
			$output->writeln('<error>Config::$watch_directory is not set to a valid directory</error>');
			return 1;
		}

		$watch_directory = \Skeleton\Test\Config::$watch_directory;
		$output_directory = \Skeleton\Test\Config::$output_directory;

		echo "Watch directory: " . $watch_directory . " - " . $output_directory;

		return 0;
	}

}