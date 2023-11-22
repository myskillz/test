# Avrillo Conveyancing Technical Test    

## Development environment

**Framework Laravel(Sail + Docker)**
> https://laravel.com/docs/10.x/sail

 **Inertia**
> https://inertiajs.com/

**tailwindcss**
> https://tailwindcss.com/

---

## Set up
1. git clone https://github.com/myskillz/test.git
2. cd test
3. composer install
4. npm install
5. npm run dev
---

## Solutions
### Authentication for these APIs should be done with an API token
Using the request 'headers' to pass token. e.g. Authorization:Bearer 

### Test
Feature / Unit

### Manager Design Pattern 
App->Manangers->ApiManager

### Enchance API response caching by 
1. install Memcache
> https://www.php.net/memcache

2. install Guzzle, PHP HTTP client
>https://github.com/guzzle/guzzle

