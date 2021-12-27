# PHP Errors

This is a test repo which demonstrates which fatal and non-fatal error types can be caught in various versions of PHP without `try ... catch`.

[Check out the GitHub Actions runs for results](https://github.com/johnbillion/php-errors/actions).

## Notes

Using a combination of an exception handler (`set_exception_handler()`), an error handler (`set_error_handler()`), and a shutdown handler (`register_shutdown_function()` with `error_get_last()`), most PHP errors can be caught or seen by userland PHP. Newer versions of PHP allow more error types to be caught and handled, including fatals.

* In PHP 8.0 and higher, the only error type that cannot be caught is an out of memory error
* In all versions of PHP 7, an unsatisfied `require` or `require_once` also cannot be caught
* In PHP 5.6, a syntax error and a call to an undefined function also cannot be caught

Versions of PHP older than 5.6 aren't tested.
