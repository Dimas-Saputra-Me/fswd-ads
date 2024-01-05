<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\CutisController;
use App\Http\Controllers\EmployeesController;
use App\Models\Cutis;
use App\Models\employees;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    // Instantiate controllers
    $employeesController = new EmployeesController();
    $cutisController = new CutisController();

    // Get Data
    $employees = $employeesController->latest();
    $cutis = $cutisController->latest();

    // Get Data Count
    $employees_count = Employees::count();
    $cutis_count = Cutis::count();

    // Return a view with the combined data
    return view('homepage', compact('employees', 'cutis', 'employees_count', 'cutis_count'));
});

// Employee
Route::prefix('employees')->group(function () {
    // Get All employees
    Route::get('/', function() {
        // Instantiate controllers
        $employeesController = new EmployeesController();
    
        // Get Data
        $employees = $employeesController->getEmployees();
    
        // Return a view with the combined data
        return view('employees.employees', compact('employees'));
    });

    // Create Employee
    Route::get('/create', function() {
        return view('employees.create');
    });
    Route::Post('/create', [EmployeesController::class, 'store']);

    // Delete Employee
    Route::delete('/delete/{nomor_induk}', [EmployeesController::class, 'destroy']);

    // Edit Employee
    Route::get('/edit/{nomor_induk}', function($nomor_induk) {
        $employee = Employees::where('nomor_induk', $nomor_induk)->first();

        return view('employees.edit', compact('employee'));
    });
    Route::Post('/edit', [EmployeesController::class, 'update']);

});


// Cuti
Route::prefix('cutis')->group(function () {
    // All Cuti
    Route::get('/', function() {
        // Instantiate controllers
        $cutisController = new CutisController();
    
        // Get Data
        $cutis = $cutisController->getCutis();
    
        // Return a view with the combined data
        return view('cutis.cutis', compact('cutis'));
    });

    // Create Cuti
    Route::get('/create', function() {
        return view('cutis.create');
    });
    Route::Post('/create', [CutisController::class, 'store']);

    // Delete Cuti
    Route::delete('/delete/{id}', [CutisController::class, 'destroy']);

    // Edit Employee
    Route::get('/edit/{id}', function($id) {
        $cuti = Cutis::find($id);

        return view('cutis.edit', compact('cuti'));
    });
    Route::Post('/edit', [CutisController::class, 'update']);

});


