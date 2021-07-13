## Install
```
git clone https://github.com/konpaa/laravelOffice.git
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
Сохранение связей между сущностями реализовано в сервисе SaveObjectServices.
В репозиториях /Repositories/ реализована логика касающееся моделей и из запросы.
Отображений связей на главной странице между сущностями реализовано с помощью библиотеки jQuery и JsonResponse метода.
</p>
<p>
Реализованы unit test косающееся репозиторий. Для них были созданы seeders для добавление в тестовую базу данных таблиц.
При помощи команды. php artisan migrate:fresh --seed --env=testing.
</p>
<p>
Так же в начале проекта был подключен линтер для соблюдения стандарта кода.
Хотелось бы изучить front-end фреймворки для удобного отображения данных пользователю.
Так же не хватило времени для интеграционных тестов.
</p>
<p>Данный проект был задеплоин на heroku <a href="http://staff-department.herokuapp.com">Result</a></p>
<p>На реализацию данного проекта затраченно 20 часов</p>
