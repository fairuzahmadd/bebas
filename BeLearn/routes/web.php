    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\MaterialController;
    use App\Http\Controllers\BookmarkController;
    use App\Http\Controllers\TryoutsController;
    use App\Http\Controllers\QuestionController;
    use App\Http\Controllers\AnswerController;

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return view('home'); // Ganti sesuai dengan view Anda
    })->name('home');

    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Register routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Route untuk home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index']);

    //Route untuk logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //Route untuk material
    Route::resource('material', MaterialController::class);
    Route::post('/material', [MaterialController::class, 'store'])->name('material.store');
    Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('material.show');

    //Route materials ke home
    Route::get('materials', [MaterialController::class, 'index'])->name('material.index');
    Route::get('materials/filter/{kelas}/{mata_pelajaran}', [MaterialController::class, 'filterByClassAndSubject'])->name('material.filterClassAndSubject');

    //Route untuk bookrmark
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/bookmark/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::resource('bookmark', BookmarkController::class)->only(['index', 'store', 'destroy']);
    Route::get('/bookmark/filter/{kelas}/{mata_pelajaran}', [BookmarkController::class, 'filter'])->name('bookmark.filter');

    //Route untuk Tryout
    Route::resource('tryouts', TryoutsController::class);

    // Menampilkan soal berdasarkan tryout yang dipilih
    Route::get('tryouts/{id}/questions', [TryoutsController::class, 'show'])->name('tryouts.show');

    // Menambahkan soal baru ke tryout
    Route::get('tryouts/{tryoutId}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('tryouts/{tryoutId}/questions', [QuestionController::class, 'store'])->name('questions.store');

    Route::get('/tryouts', [TryoutsController::class, 'index']);
    Route::get('/tryouts/{id}', [TryoutsController::class, 'show'])->name('tryouts.show');

    // Route untuk halaman index tryouts
    Route::get('/tryouts', [TryoutsController::class, 'index'])->name('tryouts.index');

    Route::get('tryouts/{tryoutId}/results', [AnswerController::class, 'showResults'])->name('answers.results');

    // Rute untuk Questions
    Route::prefix('tryouts/{tryoutId}')->group(function () {
        Route::get('questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('questions/{questionId}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('questions/{questionId}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('questions/{questionId}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});