
# Shoe Shop Api
The shoe shop front-end project is [here](#).

## Installation:
First clone the repository, and then run:
```shell
composer i
```

## Run Api
Run the following command to run the api in dev mode:
```shell
php artisan serve
```

## Class List
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


