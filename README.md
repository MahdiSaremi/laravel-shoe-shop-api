
# Shoe Shop Api
The shoe shop front-end project is [here](#).

## Installation:
1- Clone the repository

2- Run the following command to install dependencies:
```shell
composer i
```

2- Copy `.env.example` as `.env` and edit the configurations.

3- Run the following command to generate a new key:
```shell
php artisan key:generate
```

4- Run the following command to install database:
```php
php artisan migrate
```

## Run Api
Run the following command to run the api in dev mode:
```shell
php artisan serve
```

## Model List
### User
- `id` - `int`
- `first_name` - `string`
- `last_name` - `string`
- `phone` - `string`
- `referral_code` - `string`
- `invited_by_id` - `?int`
- `club_score` - `int`
- -`password` - `string`
- `created_at` - `int`
- `updated_at` - `int`

### ClubHistory
- `id` - `int`
- `user_id` - `int`
- `cause` - `enum[Order, Use]`
- `amount` - `int`
- `order_id` - `int`
- `created_at` - `int`
- `updated_at` - `int`

### Offer
- `id` - `int`
- `code` - `string`
- `max_use` - `int`
- `use_count` - `int`
- `offer` - `float - range(0 - 100)`

### Product
- `id` - `int`
- `title` - `string`
- `slug` - `string`
- `description` - `string`
- `content` - `string - markdown`
- `keywords` - `string - split(',')`
- `price` - `int`
- `offer` - `float - range(0 - 100)`

### ProductColor
- `id` - `int`
- `product_id` - `int`
- `name` - `string`
- `code` - `string - format(#xxxxxx)`

### ProductSize
- `id` - `int`
- `product_id` - `int`
- `size` - `int`

### ProductImage
- `id` - `int`
- `product_id` - `int`
- `file_id` - `int`
- `color_id` - `?int`
- `size_id` - `?int`

### File
- `id` - `int`
- `extension` - `string`
- `mime_type` - `string`
- -`path` - `string`

### Order
- `id` - `int`
- `user_id` - `int`
- `product_id` - `int`
- `color_id` - `?int`
- `size_id` - `?int`
- `paid_price` - `int`
- `used_offer_id` - `?int`
- `status` - `enum[Queue, Completed]`


## Api List
- Api Url: `http://localhost:8000/`
- Content Type: `application/json`

### Auth

Register

- POST `/register`
- Fields: `first_name`, `last_name`, `phone`, `referral_code`, `password`
- Result: `true`

Login

- POST `/login`
- Fields: `phone`, `password`
- Result: `true`

Logout

- POST `/logout`
- Result: `true`

### Product

List

- POST `/product`
- Result: Paginate<[Product](#Product)>

Show

- POST `/product/{product:id}`
- Result: [Product](#Product)

## Usage
### Setup In React
```js
axios.defaults.baseURL = "http://localhost:8000"
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
```

### Initialize CSRF Cookie
Run the following api to set the CSRF cookie:
```js
axios.get('/sanctum/csrf-cookie').then(() => {
    // CSRF is set
});
```
The CSRF has expiration time.

### Request
```js
    axios.METHOD('URL', {
        FIELDS
    })
    .then(response => console.log(response))
```

## Api Status
- `200` - Successful
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Unprocessable Content
- `500` - Internal Server Error

### Validation
Validation errors returns `422` status and has `message`
    and `errors` as following syntax:

```json
{
    "message": "The test field is required.",
    "errors": {
        "test": [
            "The test field is required."
        ]
    }
}
```
