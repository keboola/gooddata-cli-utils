# GoodData CLI Utilities

[![Build Status](https://travis-ci.org/keboola/gooddata-cli-utils.svg?branch=master)](https://travis-ci.org/keboola/gooddata-cli-utils)

### Running in Docker

```
docker run --rm -it quay.io/keboola/gooddata-cli-utils php ./cli.php USERNAME PASSWORD PID
```

Each command has these required arguments:
- `USERNAME` - GoodData login
- `PASSWORD` - GoodData password
- `PID` - Project pid

And optional option `--backend=URI` to set custom backend uri. 

## Optimize SLI Hash

Beware that there shouldn't be any data load during the optimization.

**Command**

```
php cli.php optimize-sli-hash USERNAME PASSWORD PID 
```

## Synchronize dataset

You need to know dataset's identifier. You can find it e.g. in this Grey Pages location: https://secure.gooddata.com/gdc/md/[PID]/data/sets 

By default it runs "soft" synchronization with data preservation. If you want a "hard" synchronization without data preservation, use option `--hard` 

**Command**

```
php cli.php synchronize-dataset USERNAME PASSWORD PID DATASET 
```
## License

MIT licensed, see [LICENSE](./LICENSE) file.
