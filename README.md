# php-framework

php-framework

## Generate docs

```bash
$ phpdoc
$ php -S localhost:8080 -t build/docs
```

## Query SQL

```sql
SELECT
       *
FROM
     nodes
WHERE
    parent_id IS NULL
AND
      depth = 0
```
