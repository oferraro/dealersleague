
- Url to see the project working: http://dealersleague.oferraro.com/  

- Clone the project from Github
git clone 

- Install dependencies
composer install

- Copy .env file and generate required encription key
cp .env.example .env
php artisan key:generate

- Depending on the server configuration (it could be required to give files access), in dealersleague folder
chown someuser:apache storage  -R
find -type d -exec chmod ug+rwx,g+s {} \;
find -type f -exec chmod ug+rw {} \;

- Debugging (if face some errors, can be listed here in real time)
tail -f storage/logs/laravel.log

