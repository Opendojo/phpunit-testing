h1. Unit Testing with PHP

using phpunit

h2. Quality Assurance

This is a Process that guarantee the quality of the Application
The unit test are *part* of it

h2. Unit testing

# Manual Testing (var dump, form test...)
## no benefit
## should be only done by business team
## not all case tested
## no automation
## intrusive
# Automated testing
## test APIs (infomaniak, ...)
## heavy - db related / cache related ...
# Unit test
## UnitTest (*)--(1) Method (One test for the size of the password, one test for the character in the password, one test for the ...)
# Functional testing
## End user side
# Technical test
# code unit
## smallest part testable of a code (method)

Test Suite (1)--(*) Test Case (1)--(*) Unit test

Test Group: selected list of unit test

Fixture: test data hard coded

Stub: Check depencies with cache/files/db

Mock: Stub with function check and call validation

TDD mandatory for Unit testing

BDD: behat / mink

h2. Phpunit

h3. Phpunit.xml

default configuration, default options add code coverage on non used file

h3. First test case

* Install using composer

<pre>
{
    "require-dev": {
        "phpunit/phpunit": "4.2.*"
    }
}
</pre>

