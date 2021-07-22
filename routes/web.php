<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::post('/posts/{post}/comments', [CommentController::class, 'store']);

Route::get('/register', [AuthController::class, 'getRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'getLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
// class QueryBuilder
// {
//     private $fields = '*';
//     private $table;
//     private $conditions = [];
//     private $groupBy;
//     private $orderBy;
//     private $having;
//     private $limit;

//     public function __construct()
//     {
//     }

//     public function select($fields)
//     {
//         $this->fields = $fields;
//         return $this;
//     }

//     public function from($table)
//     {
//         $this->table = $table;
//         return $this;
//     }

//     public function where($condition)
//     {
//         $this->conditions[] = $condition;
//         return $this;
//     }

//     public function groupBy($groupBy)
//     {
//         $this->groupBy = $groupBy;
//         return $this;
//     }

//     public function orderBy($orderBy)
//     {
//         $this->orderBy = $orderBy;
//         return $this;
//     }

//     public function limit($limit)
//     {
//         $this->limit = $limit;
//         return $this;
//     }

//     public function build()
//     {
//         return new Query(
//             $this->fields,
//             $this->table,
//             $this->conditions,
//             $this->groupBy,
//             $this->orderBy,
//             $this->having,
//             $this->limit
//         );
//     }
// }

// class QueryBuilder2
// {
//     public function select($fields)
//     {
//         $this->fields = $fields;
//         return $this;
//     }
// }
// $car = new QueryBuilder2;
// $car->select('*') === $car;

// $queryBuilder = new QueryBuilder;
// $queryBuilder->select('*')->from('posts');
// $queryBuilder->where('id=1');
// $queryBuilder->build()->execute();

// // $queryBuilder
// class Query
// {
//     private $fields;
//     private $table;
//     private $conditions;
//     private $groupBy;
//     private $orderBy;
//     private $having;
//     private $limit;

//     public function __construct($fields, $table, $conditions, $groupBy, $orderBy, $having, $limit)
//     {
//         $this->fields = $fields;
//         $this->table = $table;
//         $this->conditions = $conditions;
//         $this->groupBy = $groupBy;
//         $this->orderBy = $orderBy;
//         $this->having = $having;
//         $this->limit = $limit;
//     }

//     public function execute()
//     {
//         $query = "select $this->fields from $this->table";

//         if ($this->conditions) {
//             $this->conditions = ['is_published = 1', 'id > 3'];
//             $query = $query . "where $this->conditions->join(' and ')";
//         }

//         if ($this->groupBy) {
//             $query = $query . "group by $this->groupBy";
//         }

//         return DB::select($query);
//     }
// }

// Post::find(1); // select * from posts where id=1 limit 1;
// new Query('*', 'posts', null, null, null, null, 1);
