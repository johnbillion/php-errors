#!/usr/bin/env bash

# -o pipefail Produce a failure return code if any command errors
set -o pipefail

echo    "file                           | exception handler    | error handler        | shutdown handler     | exit code"
echo -n "------------------------------ | -------------------- | -------------------- | -------------------- | ---------"

for f in error-*.php; do
	php -f test.php $f || echo -n $?
done

echo ""
