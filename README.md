## LARAVEL SETUP

- Install composer
- Download php.zip at PHP official website
- Save it in C:php/
- Rename file php.ini-development to php.ini
- Enable comments extension:
    > openssl
    > pdo_mysql
    > zip

- if encounter error like "VCRUNTIME140.dll and MSVCP140.dll missing in Windows 11", install this ( https://aka.ms/vs/17/release/vc_redist.x64.exe )


## Project Setup
- download and unzip project folder
- open terminal and cd to project directory
- run "composer install" in DIR of imported project
- run 'composer require laravel/ui'
- run 'npm install'
- run 'npm run build'
- (if styling now showing, can run  'npm run dev' when running the project)
- copy .env.example = paste and rename it as .env
- run "php artisan migrate"
- run "php artisan key:generate"
- run "php artisan serve"
- open mysql ui, run query in data.txt
