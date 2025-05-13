
protected $routeMiddleware = [
    // Other middlewares
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
];
