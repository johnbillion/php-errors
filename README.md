# PHP Errors

This repo demonstrates which fatal and non-fatal error types can be caught across PHP versions without `try ... catch`.

[Check out the GitHub Actions runs for results](https://github.com/johnbillion/php-errors/actions).

## Notes

Most PHP errors can be caught or seen by userland PHP by using a combination of:

1. an exception handler (`set_exception_handler()`)
2. an error handler (`set_error_handler()`)
3. a shutdown handler (`register_shutdown_function()` with `error_get_last()`)

Newer versions of PHP allow more error types to be caught and handled, including fatals.

* In PHP 8.0 and higher, the following error types cannot be caught:
  - Allowed memory size exhausted
  - Maximum execution time exceeded
  - Compile-time errors
* In all versions of PHP 7, an unsatisfied `require` or `require_once` also cannot be caught

It appears that the shutdown handler can always see the error from `error_get_last()` even though it can't be caught. Whether or not userland code within the shutdown handler will execute successfully after such as error has not been determined.
