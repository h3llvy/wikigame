Для запуска приложения с помощью Docker ввести следущие команды:

```
cp .env.example .env
docker run --rm -v ./:/app -w /app composer install
vendor/bin/sail up -d
vendor/bin/sail artisan migrate --seed
```

Перейти на страницу с документацией и тестировать приложение
