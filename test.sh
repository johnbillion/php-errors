#!/usr/bin/env bash

# -o pipefail Produce a failure return code if any command errors
set -o pipefail

echo    "file                           | exception handler    | error handler        | shutdown handler     | exit code"
echo -n "------------------------------ | -------------------- | -------------------- | -------------------- | ---------"

for f in error-*.php; do
	php \
		-d display_errors=0 \
		-d error_reporting=E_ALL \
		-d assert.exception=1 \
		-d memory_limit=4M \
		-d max_execution_time=9 \
		-f test.php $f \
		|| echo -n "$?"
done

echo ""
