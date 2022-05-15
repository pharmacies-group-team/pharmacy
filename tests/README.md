# Testing

## code

```php
public function test_pharmacy_ordersRefusal_page()
{
  $this
    ->get('/pharmacy/orders/refusal/3')
    ->assertStatus(302);
}
```

## commands

```bash
php artisan make:test PharmacyTest
```

### run testing

```bash
php artisan test
```
