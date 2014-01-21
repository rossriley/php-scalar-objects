PHP Scalar Object Handlers
===========================

## Wouldn't you prefer to write PHP like this?

```php

    $n = 12;
    echo $n->add(5)->minus(2)->divide(3); // 5

```

Or deal with strings, without remembering the parameter order?

```php

    $str = "Hello World";
    echo $str->replace("World","PHP"); // Hello PHP

    $str = "Hello World";
    echo $str->length();  //  11

```

Or chain array operations, with a simpler syntax API?

```php

    $arr = ["k1"=>"val1","k2"=>"val2"];
    print_r($arr->merge(["k3"=>"val3","k4"=>"val4"])->count()) // 4

```

PHP6 Gives us a chance to create a new API to streamline the language in a way that ensures all old code still runs in the same way.
Here's how to see this in action right now!


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

Syntax available is as follows.

```php

    $array = ["first", "second", "third", "fourth", "fifth"];
    $array->chunk(2);   //  [["first","second"],["third","fourth"],["fifth"]]

    $array = [["key1"=>"value","key2"=>"value2"],["key1"=>"value","key2"=>"value2"]];
    $array->column("key2");   //  ["value2","value2"]

    $array = ["k1","k2","k3","k4"];
    $array2 = ["val","val2","val3","val4"];
    $array->combine($array2);  //  ["k1"=>"val","k2"=>"val2","k3"=>"val3","k4"=>"val4"]


    $array = ["k1"=>"val","k2"=>"val2"];
    $array->count();  //  2

    $array  = ["k1"=>"val","k2"=>"val2"];
    $array2 = ["k2"=>"val2","k3"=>"val3"];
    $array->diff($array2);  // ["k1" => "val"]

    $array = ["k1"=>"val","k2"=>"val2"];
    $array->hasKey("k2");  //  true

    $array = ["k1"=>"val","k2"=>"val2"];
    $array->keys();  //  ["k1","k2"]

    $array = ["k1"=>"val","k2"=>"val2"];
    $array2 = ["k2"=>"val2","k3"=>"val3"];
    $array->merge($array2);  //  ["k1"=>"val","k2"=>"val2","k3"=>"val3"]

    $array = ["k1"=>"val","k2"=>"val2"];
    $array->push("val3");  //  ["k1"=>"val","k2"=>"val2",0=>"val3"]

    $array = ["k1"=>"val","k2"=>"val2","k3"=>"val3"];
    $array->rand();  //  "val3"

    $array = ["k1"=>"val","k2"=>"val2","k3"=>"val3"];
    $array->reverse();  //  ["k3"=>"va3","k2"=>"val2","k1"=>"val"]

    $array = ["k1"=>"val","k2"=>"val2","k3"=>"val3"];
    $array->toJSON();  //  {"k1":"val","k2":"val2","k3":"val3"}

```

### Strings

Syntax available is as follows.

```php

    $str = "Hello World";
    $str->length();  //  11

    $str->slice(0,4);  // Hell

    $str->contains("Hell");  // true

    $str->startsWith("Help");  // false

    $str->endsWith("rld");   // true

    $str->split(" ");  // ["Hello", "World"]

    $str->repeat(3);   // "Hello WorldHello WorldHello World"

    $str->reverse();   //  "dlroW olleH";

    $str->toArray();   // [0=>"Hello World"]

    $str->lower();   // "hello world"

    $str->upper();   // "HELLO WORLD"

```


### Floats / Integers

```php

    $n = 12;
    $n->add(4);  // 16

    $n = 12.5;
    $n->add(4.2);  // 16.7

    $n = -25;
    $n->abs();  // 25

    $n = 12.5;
    $n->ceil();  // 13

    $n = 12.5;
    $n->floor();  // 12

    $n = 12.5;
    $n->toInt();  // 12

```
###  Integers

```php

    $n = 10;
    $n->even();  // true
    $n->odd();   // false

```


### Nulls

Syntax available is as follows.

```php

    $a = null;
    $a->toJSON();  // []

```

