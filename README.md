# Skeleton SASS

Add SASS functionality for the [Skeleton framework](https://www.github.com/tigron/skeleton).


## Installation
### Composer
```
composer require jochentimmermans/skeleton-sass:dev-master
```


### Add to config
In `lib/base/Bootstrap.php`, add the following lines:

```
\Skeleton\Sass\Config::$watch_directory = 'your/watch/directory';
\Skeleton\Sass\Config::$output_directory = 'your/output/directory';
```



### Add non-tigron package to console

Since Skeleton does not autoload any non-tigron packages into their console, we will need to make a few changes.

Add the following lines in `lib/external/packages/tigron/skeleton-console/lib/Skeleton/Console/Application.php` right 
after `$skeletons = \Skeleton\Core\Skeleton::get_all();`

```
$externals = \Skeleton\Sass\External::get_this();
$skeletons = array_merge($skeletons, $externals);
```

This adds the current console files to the list of console files.








## Usage
To watch a folder 
```
./util/bin/skeleton sass:watch
```