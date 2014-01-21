PHP Scalar Object Handlers
===========================

### An Experimental Proposal for PHP Scalar Objects

Based on the fantastic extension by nikic https://github.com/nikic/scalar_objects this project is designed to start the ball rolling on the future API for Scalar objects in PHP.

#### Getting started

The handlers are written in PHP so, you don't need to install the extension to contribute, however full instructions for getting started are on the extension readme file at: https://github.com/nikic/scalar_objects

#### Supported types

Object handlers are supported for `string`, `integer`, `array`, `float`, `null` and `resource`

The handlers are PSR-4 loaded under the namespace Spl\Scalars in the `src` directory.

