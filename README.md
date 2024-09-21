
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
