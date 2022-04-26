# Project and code roles

## branch's name

`v-1.1/branchName`

example

```
`v-1.1/login`

`v-1.2/sign-up`
```

## Github/git roles

The commit type can include the following:

`add` – a new feature

`fix` – a bug fix has occurred

## Names

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

## controller and routers

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

---

---

## Leader roles

### Github/git roles

`feat` – a new feature is introduced

`fix` – a bug fix has occurred

`refactor` – refactored code that neither fixes a bug nor adds a feature

`docs` – updates to documentation such as a the README or other markdown files

`style` – changes that do not affect the meaning of the code, likely related to code formatting such as white-space, missing semi-colons, and so on.

`test` – including new or correcting previous tests

`perf` – performance improvements

`build` – changes that affect the build system or external dependencies

---

### Validation roles

```php
# title
'required|min:5|max:100|string'
or
 'title' => 'required|unique:posts|max:255'
 or
   'title' => 'required|exists:blogs,created_at'

#phone
  'phone' => 'required|digits:10'
  or
 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
or
'phone' => 'required | numeric | digits:10 | starts_with: 6,7,8,9'
or
// Adds phone number functionality to Laravel based on the PHP port of Google's libphonenumber API by giggsey
// https://github.com/Propaganistas/Laravel-Phone
////////////////////
# link
'required|min:5|max:100|string'
//
'required|url'
or with regex
 $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
    $request->validate([
        'url' => 'required|regex:'.$regex,
# email
'email' => 'required|email'
ex
   protected function validator(array $data)
    {
    return Validator::make($data, [
        'name' => 'required|Regex:/^[\D]+$/i|max:100',
        'last_name' => 'required|Regex:/^[\D]+$/i|max:100',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);
   }
for more follow this link https://laravel.com/docs/9.x/verification
# image
'required|image|mimes:png,jpg'

/////////////////
# date
'required|date'
// //
// Note :
// The field under validation must match the given format. You should use either date or date_format when validating a field, not both.This validation rule supports all formats supported by PHP's DateTime class.
// The dates will be passed into the PHP strtotime function.
// date
// date_equals
// date_format
// after:date
// after_or_equal:date
// before:date
// before_or_equal:date
// //ex
// 'start_date' => 'required|date|after:tomorrow'
//    'start_at'      => 'required|date|date_format:Y-m-d|after:yesterday',
//     'end_at'        => 'required|date|date_format:Y-m-d|after:xxxx',
//     or
//      'start_at'      => 'required|date|date_format:Y-m-d|before:end_at',
//     'end_at'        => 'required|date|date_format:Y-m-d|after:start_at',
//     or
//      'start_at'      => 'required|date|date_format:Y-m-d|after:tomorrow',
//     'end_at'        => 'required|date|date_format:Y-m-d|befor_or_eqle:start_at',
```
