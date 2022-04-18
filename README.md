# Project and code roles

## branch's name

`v-1.1/branchName`

example

```
`v-1.1/login`

`v-1.2/sign-up`
```

### Names

| What           | How                                  | Example                 |
| -------------- | ------------------------------------ | ----------------------- |
| Controller     | singular                             | ArticleController       |
| -              | -                                    | -                       |
| Route          | plural                               | /articles/2             |
| -              | -                                    | -                       |
| Model          | singular                             | User                    |
| Model property | snake_case                           | $model->created_at      |
| -              | -                                    | -                       |
| Table          | plural                               | article_comments        |
| Table column   | snake_case without model name        | title                   |
| -              | -                                    | -                       |
| Primary key    | -                                    | id                      |
| Foreign key    | singular model name with \_id suffix | article_id              |
| -              | -                                    | -                       |
| Method         | camelCase                            | getAll                  |
| Variable       | camelCase                            | $articlesWithAuthor     |
| -              | -                                    | -                       |
| View           | kebab-case                           | show-filtered.blade.php |
| -------------- | ------------------------------------ | ----------------------- |

### controller and routers

| Verb   | URI                    | why                  | Function name |
| ------ | ---------------------- | -------------------- | ------------- |
| GET    | `/photos`              | show all items page  | index         |
| GET    | `/photos/{photo}`      | show one item page   | show          |
| GET    | `/photos/create`       | create new item page | create        |
| GET    | `/photos/{photo}/edit` | edit one item page   | edit          |
| POST   | `/photos`              | store new item       | store         |
| PUT    | `/photos/{photo}`      | update item          | update        |
| DELETE | `/photos/{photo}`      | delete item          | destroy       |

example

```php
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
```
