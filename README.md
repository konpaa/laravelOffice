## Install
```
git clone https://github.com/ini1990/php-project-lvl4.git
```

### Setup
```
make setup
```
Create .env file and set up some keys like db connection, mailtrap, rollbar if you need thats


Create database in local var - Docker
```
docker-compose up -d
```
Keep on
```
php artisan key:gen --ansi
php artisan migrate
php artisan db:seed --class=TaskSeeder
npm install
```
### Launch localhost
```
make start
```

### Run tests
```
make test
```

<ol>Основные возможности приложения</ol>
<li>Создание Сотрудников и Отделов</li>
<li>Удаление и изменение моделей</li>
<li>Отображение связей межу отделами и сотрудниками</li>

<p>
В данном проекте были созданы ресурсные маршруты и контролеры Работников и Отделов.
В связи с этим созданы шаблоны для запросов. Для удобства перемещения по приложению был создана панель
навигации с ссылками на создание или отображений моделей.
</p>
<p>
Бизнес логика по изменению данных реализована в основном с помощью sql запосов.
Изменение связей между сущностями реализовано с помощью библиотеки jQuery и JsonResponse метода.
</p>
<p>Данный проект был задеплоин на heroku <a href="http://staff-department.herokuapp.com">Result</a></p>

