PHP Scalar Object Handlers
===========================

### An Experimental Proposal for PHP Scalar Objects

Based on the fantastic extension by nikic https://github.com/nikic/scalar_objects this project is designed to start the ball rolling on the future API for Scalar objects in PHP.

Discussions, arguments and pull requests are welcome. Once we get some consensus, we can send a pull request up to nikic and hopefully get some discussion going on the internals list. Let's make PHP6 Awesome.

Note, the handlers won't actually be implemented in PHP, but the handlers and methods can be built natively once the API is agreed. This is just a way to get contributions from the wider PHP community without the need to know the internals.

#### Getting started

The handlers are written in PHP so, you don't need to install the extension to contribute, however full instructions for getting started are on the extension readme file at: https://github.com/nikic/scalar_objects

#### Supported types

Object handlers are supported for `string`, `integer`, `array`, `float`, `null` and `resource`

The handlers are PSR-4 loaded under the namespace Spl\Scalars in the `src` directory.

### Arrays


### Floats



### Integers



### Nulls


### Strings


