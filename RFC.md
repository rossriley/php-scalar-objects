
====== PHP RFC: Scalar Object Handlers ======
  * Version: 0.1
  * Date: 2014-01-23
  * Authors: Ross Riley, ...., ....
  * Status: Draft
  * First Published at: http://wiki.php.net/rfc/scalar_object_handlers

This is a proposal to introduce scalar object support to the next major version of PHP.

Based on the concept introduced by nikic and built on top of the Scalar Object PHP extension.

===== Introduction =====

This proposal offers an alternative Object-Oriented way to interact with PHP scalar type.

Each type is coerced into a Scalar Object and a Handler class defines the API for interacting with each type.

Support is currently proposed for:

*Arrays*
    $array = [1,2,3,4,5];
    $array->count();   //  4

*Booleans*
    $bool = true;
    $bool->isBool();  // true

*Floats*
    $float = 123.456;
    $float->toInt(); // 123

*Integers*
    $int = -100;
    $int->abs();  // 100

*Null*
    $n = null;
    $n->isNull();  // true

*Strings*
    $str = "Hello World";
    $str->length();  // 11
    $str->upper();   // "HELLO WORLD"



===== Proposal =====

Features and examples of the proposal go here.

===== Backward Incompatible Changes =====

No backwards incompatible functionality is intended since all of the features represent new language functionality.


===== Proposed PHP Version(s) =====

Next major version, probably PHP 6.0

===== SAPIs Impacted =====

Describe the impact to CLI, Development web server, embedded PHP etc.

===== Impact to Existing Extensions =====

No known impact on existing extensions.

===== New Constants =====

No constants will be created in the global space.

===== php.ini Defaults =====

No new ini settings will need to be created.

===== Open Issues =====

Make sure there are no open issues when the vote starts!

===== Unaffected PHP Functionality =====

List existing areas/features of PHP that will not be changed by the RFC.

This helps avoid any ambiguity, shows that you have thought deeply about the RFC's impact, and helps reduces mail list noise.

===== Future Scope =====

This sections details areas where the feature might be improved in future, but that are not currently proposed in this RFC.

===== Proposed Voting Choices =====

Include these so readers know where you are heading and can discuss the proposed voting options.

===== Patches and Tests =====

[[https://github.com/rossriley/php-scalar-objects|Project on Github]]

This patch is intended to be a prototype.

Work will commence on a native patch once the API has been carefully analysed tested and assuming there is general agreement from the internals list to explore further.

===== Implementation =====

After the project is implemented, this section should contain
  - the version(s) it was merged to
  - a link to the git commit(s)
  - a link to the PHP manual entry for the feature

===== References =====

WIP project: https://github.com/rossriley/php-scalar-objects
The Scalar Objects Extension: https://github.com/nikic/scalar_objects


===== Rejected Features =====

Keep this updated with features that were discussed on the mail lists.

