Инструкция по созданию сущности:
- php artisan make:model Models/StampAct -crm
(c - Controller, r - resources, m - migration)
- Находим контроллер, его нужно переместить в нужную папку -> F6 (move file)
- В контроллере меняем extends на BaseController
- Меняем namespace на правильный
- В routes/web.php прописываем ресурсный роут:     
`` Route::resource('stampacts', 'StampActController')
->names('srg.admin.stampacts');``
- ``php artisan route:list > routes.txt``
- Добавляем нужные поля в миграцию
- Создаем Factory ``php artisan make:factory EquipmentFactory --model=Equipment``
- Создаем Seeder ``php artisan make:seeder DeviceNameTableSeeder``
- В файл seeds/DatabaseSeeder.php добавляем строку:
``factory(\App\Models\StampAct::class, 20)->create();``
- php artisan migrate --seed
- Для того чтобы достать информацию из базы данных, создаем Repository
- Для валидации данных перед отправкой в базу данных создаем Request
- Если нужно произвести какие либо действия перед create, update, delete, создаем Observer
- В Providers/AppServiceProvider.php в boot() прописываем ``StampAct::observe(StampActObserver::class);``
- В моделе прописываем:
``use SoftDeletes; // при удаление записи помечаются как удаленные, но не удаляются из базы данных``
- В моделе прописываем массив fillable, в который прописываем поля которые можно массово записывать в базу данных
- В моделе прописываем функции для связи с другими базами данных
