
## LSD
,,LSD” - tai sistema, skirta laisvai samdomų darbuotojų bei nuolatinės darbo vietos paieškai.
 

## Diegimo instrukcija

### Techninė specifikacija

* git
* php 8+
* Laravel 9
* Composer
* mySQL (MariaDB)
* NPM

### Local

* `git@github.com:Luxis6/LSDps.git`
* Susikurti MySQL DB ir atitinkamai http/https serverį
* http root folderis turi būti nurodytas `/public`
* `composer install`
* DB config'us įrašyti į .env failą
* Pakoreguoti `.env` failą kaip priklauso
* `php artisan migrate`
* `npm install`
* `npm run dev` (sukurs reikiamus frontend failus /public folderyje)

### Testing
`php artisan test --filter FolderName or php artisan test --filter FileName `