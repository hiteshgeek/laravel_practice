<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionControlller;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get("/test", function () {
    // dispatch(function () {
    //     logger('hello from queue');
    // });

    $job = Job::first();
    TranslateJob::dispatch($job);
    return "Test Route";
});

Route::view("/", 'home');
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class)->middleware('auth');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware(['auth'])
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//Auth
Route::get("/register", [RegisteredUserController::class, 'create']);
Route::post("/register", [RegisteredUserController::class, 'store']);

Route::get("/login", [SessionControlller::class, "create"])->name('login');
Route::post("/login", [SessionControlller::class, "store"]);
Route::post("/logout", [SessionControlller::class, "destroy"]);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

// Route::get('/jobs', [JobController::class, 'index']);
// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::post('/jobs', [JobController::class, 'store']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/contact', function () {
//     return view("contact");
// });

//Index
// Route::get('/jobs', function () {
//     // $jobs = Job::all();
//     // $jobs = Job::with('employer')->get();
//     $jobs = Job::with('employer')->latest()->simplePaginate(3);
//     return view("jobs.index", [
//         "jobs" => $jobs,
//     ]);
// });

//Create
// Route::get('/jobs/create', function () {
//     return view("jobs.create");
// });

//Show
// Route::get('/jobs/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.show', ['job' => $job]);
// });
//using route model mapping
// Route::get('/jobs/{job}', function (Job $job) {
//     return view('jobs.show', ['job' => $job]);
// });

//Store
// Route::post('/jobs', function () {

//     request()->validate(
//         [
//             'title' => ['required', 'min:3'],
//             "salary" => ['required']
//         ]
//     );

//     Job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 3
//     ]);

//     return redirect("/jobs");
// });

//Edit
// Route::get('/jobs/{job}/edit', function (Job $job) {
//     // $job = Job::find($job);
//     return view('jobs.edit', ['job' => $job]);
// });

//Update
// Route::patch('/jobs/{job}', function (Job $job) {
//     request()->validate(
//         [
//             'title' => ['required', 'min:3'],
//             "salary" => ['required']
//         ]
//     );

//     // $job = Job::findOrFail($job);

//     // $job->title = request("title");
//     // $job->salary = request("salary");
//     // $job->save();

//     $job->update([
//         'title' => request("title"),
//         'salary' => request("salary")
//     ]);

//     return redirect("/jobs/" . $job->id);
// });

//Destroy
// Route::delete('/jobs/{job}', function (Job $job) {
//     //VAlidate
//     //authorize
//     //delete the job

//     // $job = Job::findOrFail($job);
//     $job->delete();

//     return redirect("/jobs");
// });
