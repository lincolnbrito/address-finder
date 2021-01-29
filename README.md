# Laravel + Vue
- Laravel 8
- Vue.js 2

## Installation
- Copy ```api/.env.example``` to ```api/.env```


### Notes

- Create API structure:
```
docker-compose run --rm api composer create-project --prefer-dist laravel/laravel .
```
  
- Create APP structure:
```
docker-compose run --rm app bash -c "yarn global add @vue/cli && vue create ." 
```