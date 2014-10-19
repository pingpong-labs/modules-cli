Modules CLI Generators
===========

This package is part of [pingpong/modules](https://github.com/pingpong-labs/modules) package.

### Installation

Install globally.
```shell
composer global require "pingpong/modules-cli:dev-master"
```

Install locally for laravel project.
```shell
composer require "pingpong/modules-cli:dev-master"
```

### Setup

After installation completed, you can access the `module` cli from `bin` folder.

Globally:
```
~/composer/vendor/bin/module
```

Locally:
```
vendor/bin/module
```

You may create alias for quick access the `module` cli, or export the bin path to your `~/.bashrc` file.

```shell
alias module="vendor/bin/module"

export PATH="vendor/bin:$PATH"
```

### Usage

There is some command you can use for generating a module, module's controller or others.
You may also show all available command using `module list` command.

```shell
$ module list
```

![Screenshot](https://raw.githubusercontent.com/pingpong-labs/modules-cli/master/shots/console.png)

### Available Commands

Coming Soon

### License

This package is open-sourced software licensed under [The BSD 3-Clause License](http://opensource.org/licenses/BSD-3-Clause)