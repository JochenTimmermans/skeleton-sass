<?php
/**
 * Config class
 *
 * @author Jochen Timmermans <jochen@tigron.be>
 */

namespace Skeleton\Sass;

class External {

	public static function get_this() {
		if (self::$skeleton_cache === null) {
			/**
			 * Search for other Skeleton packages installed
			 */
			$composer_dir = realpath(__DIR__ . '/../../../../../');
			$installed = file_get_contents($composer_dir . '/composer/installed.json');
			$installed = json_decode($installed);

			$skeletons = [];
			foreach ($installed as $install) {
				$package = $install->name;
				list($vendor, $name) = explode('/', $package);
				if ($vendor != 'jochentimmermans') {
					continue;
				}

				$skeleton = new self();
				$skeleton->name = $name;
				$skeleton->path = $composer_dir . '/jochentimmermans/' . $name;
				$skeleton->template_path = $composer_dir . '/jochentimmermans/' . $name . '/template';
				$skeleton->asset_path = $composer_dir . '/jochentimmermans/' . $name . '/media';
				$skeleton->migration_path = $composer_dir . '/jochentimmermans/' . $name . '/migration';

				$skeletons[] = $skeleton;
			}
			self::$skeleton_cache = $skeletons;
		}
		return self::$skeleton_cache;
	}

}
