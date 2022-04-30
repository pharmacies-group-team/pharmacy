### create new Table

```bash
php artisan make:migration create_tableName_table
```

### add new column

```bash
php artisan make:migration add_columnName_columns_to_tableName_table
```

### create new Table with Model

```bash
php artisan make:model SocialMedia -m
```

---

### migrate Database Table

```bash
php artisan migrate:fresh --seed
```

### Update Database

```bash
php artisan migrate
```
