#!/usr/bin/env bash

# -o pipefail Produce a failure return code if any command errors
set -o pipefail

echo    "file                           | exception handler    | error handler        | shutdown handler     | exit code"
echo -n "------------------------------ | -------------------- | -------------------- | -------------------- | ---------"

for f in error-*.php; do
	php -d memory_limit=4M -d max_execution_time=5 -f test.php $f || echo -n $?
done

echo ""
