# CLI UTILS

[![Build Status](https://travis-ci.org/keboola/gooddata-cli-utils.svg?branch=master)](https://travis-ci.org/keboola/gooddata-cli-utils)

GoodData CLI utils

### Running in Docker

`docker run --rm -it quay.io/keboola/gooddata-cli-utils php ./cli.php`

## Optimize SLI Hash

Beware that there can't be any data load during the optimization.

**Command**

```
php cli.php optimize-sli-hash USERNAME PASSWORD PID 
```
