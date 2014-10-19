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
Pingpong Modules CLI version 1.0-dev

Usage:
  [options] command [arguments]

Options:
  --help           -h Display this help message.
  --quiet          -q Do not output any message.
  --verbose        -v|vv|vvv Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
  --version        -V Display this application version.
  --ansi              Force ANSI output.
  --no-ansi           Disable ANSI output.
  --no-interaction -n Do not ask any interactive question.

Available commands:
  help                  Displays help for a command
  list                  Lists commands
  new                   Generate a new module
  setup                 Setup modules path
  use                   Use the specified module for cli session
generate
  generate:controller   Generate a new controller
  generate:filter       Generate a new filter
  generate:migration    Generate a new migration
  generate:model        Generate a new model
  generate:provider     Generate a new service provider
  generate:seed         Generate a new seed
```

### Available Commands

Coming Soon

### License

This package is open-sourced software licensed under [The BSD 3-Clause License](http://opensource.org/licenses/BSD-3-Clause)