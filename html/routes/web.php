<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\JelajahController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AdminauthController;

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

// admin

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'admin');
Route::get('/admin/report', [DashboardController::class, 'report'])->name('admin.report')->middleware('auth', 'admin');
Route::get('/admin/report-to-csv', [DashboardController::class, 'csv'])->name('admin.report.csv')->middleware('auth', 'admin');
// slide banner 
Route::get('/admin/slide-banner', [GalleryController::class, 'slideList'])->name('admin.list.banner')->middleware('auth', 'admin');
Route::get('/admin/add-slide-banner', [GalleryController::class, 'slideAdd'])->name('admin.add.banner')->middleware('auth', 'admin');
Route::get('/admin/delete-banner/{id}', [GalleryController::class, 'destroyslider'])->name('admin.delete.banner')->middleware('auth', 'admin');
Route::post('admin/banner/post', [GalleryController::class, 'storebanner'])->name('admin.banner.store')->middleware('auth', 'admin');
// Route::post('admin/banner/search', [GalleryController::class, 'searchbanner'])->name('admin.banner.search');

// jelajah 
// Route::resource('/admin/jelajah', JelajahController::class)->names('admin.jelajah');
Route::get('/admin/jelajah', [JelajahController::class, 'cmsList'])->name('admin.list.artikel.jelajah')->middleware('auth', 'admin');
Route::get('/admin/add-jelajah', [JelajahController::class, 'cmsAdd'])->name('admin.add.artikel.jelajah')->middleware('auth', 'admin');
Route::get('/admin/edit-jelajah/{id?}', [JelajahController::class, 'cmsEdit'])->name('admin.edit.artikel.jelajah')->middleware('auth', 'admin');
Route::put('/admin/update-jelajah/{id?}', [JelajahController::class, 'update'])->name('admin.update.artikel.jelajah')->middleware('auth', 'admin');
Route::get('/admin/delete-jelajah/{id}', [JelajahController::class, 'destroy'])->name('admin.delete.artikel.jelajah')->middleware('auth', 'admin');
Route::get('/admin/status-jelajah/{id?}/{params?}', [JelajahController::class, 'changeStatus'])->name('admin.change.artikel.jelajah')->middleware('auth', 'admin');
Route::post('admin/jelajah/post', [JelajahController::class, 'store'])->name('admin.jelajah.store')->middleware('auth', 'admin');

// Route::get('/admin/slide-jelajah', [JelajahController::class, 'slideList']);
// Route::get('/admin/add-slide-jelajah', [JelajahController::class, 'slideAdd']);

// gallery 
Route::get('/admin/list-galeri', [GalleryController::class, 'galleryList'])->name('admin.list.galeri')->middleware('auth', 'admin');
Route::get('/admin/add-galeri', [GalleryController::class, 'galleryAdd'])->name('admin.add.galeri')->middleware('auth', 'admin');
Route::get('/admin/edit-galeri/{id?}', [GalleryController::class, 'galleryEdit'])->name('admin.edit.galeri')->middleware('auth', 'admin');
Route::put('/admin/update-galeri/{id?}', [GalleryController::class, 'update'])->name('admin.update.galeri')->middleware('auth', 'admin');
Route::get('/admin/delete-galeri/{id}', [GalleryController::class, 'destroy'])->name('admin.delete.galeri')->middleware('auth', 'admin');
Route::post('admin/galeri/post', [GalleryController::class, 'store'])->name('admin.galeri.store')->middleware('auth', 'admin');

// info
Route::get('/admin/info', [InfoController::class, 'cmsList'])->name('admin.list.artikel.info')->middleware('auth', 'admin');
Route::get('/admin/add-info', [InfoController::class, 'cmsAdd'])->name('admin.add.artikel.info')->middleware('auth', 'admin');
Route::get('/admin/edit-info/{id?}', [InfoController::class, 'cmsEdit'])->name('admin.edit.artikel.info')->middleware('auth', 'admin');
Route::put('/admin/update-info/{id?}', [InfoController::class, 'update'])->name('admin.update.artikel.info')->middleware('auth', 'admin');
Route::get('/admin/delete-info/{id}', [InfoController::class, 'destroy'])->name('admin.delete.artikel.info')->middleware('auth', 'admin');
Route::get('/admin/status-info/{id?}/{params?}', [InfoController::class, 'changeStatus'])->name('admin.change.artikel.info')->middleware('auth', 'admin');
Route::post('admin/info/post', [InfoController::class, 'store'])->name('admin.info.store')->middleware('auth', 'admin');
// event

Route::get('/admin/add-event', [EventController::class, 'cmsAdd'])->name('admin.add.artikel.event')->middleware('auth', 'admin');
Route::get('/admin/event', [EventController::class, 'cmsList'])->name('admin.list.artikel.event')->middleware('auth', 'admin');
Route::post('/admin/sort-event', [EventController::class, 'sort'])->name('admin.sort.event')->middleware('auth', 'admin');
Route::get('/admin/edit-event/{id?}', [EventController::class, 'cmsEdit'])->name('admin.edit.artikel.event')->middleware('auth', 'admin');
Route::put('/admin/update-event/{id?}', [EventController::class, 'update'])->name('admin.update.artikel.event')->middleware('auth', 'admin');
Route::get('/admin/delete-event/{id?}', [EventController::class, 'destroy'])->name('admin.delete.artikel.event')->middleware('auth', 'admin');
Route::get('/admin/status-event/{id?}/{params?}', [EventController::class, 'changeStatus'])->name('admin.change.artikel.event')->middleware('auth', 'admin');
Route::post('admin/event-main/post', [EventController::class, 'store'])->name('admin.event.store.main')->middleware('auth', 'admin');

Route::get('/admin/slide-event', [EventController::class, 'slideList'])->name('admin.list.slide.event')->middleware('auth', 'admin');
Route::get('/admin/add-slide-event', [EventController::class, 'slideAdd'])->name('admin.add.slide.event')->middleware('auth', 'admin');
Route::get('/admin/delete-event-slider/{id}', [EventController::class, 'destroyslider'])->name('admin.delete.slideevent')->middleware('auth', 'admin');
Route::post('admin/event/post', [EventController::class, 'storeslider'])->name('admin.banner.slideevent')->middleware('auth', 'admin');

Route::post('admin/set-active-event/post', [EventController::class, 'setactivedate'])->name('admin.set.active.event')->middleware('auth', 'admin');
Route::post('admin/set-auto-event/post', [EventController::class, 'autodate'])->name('admin.set.auto.event')->middleware('auth', 'admin');

Route::get('/admin/event-bulanan', [EventController::class, 'cmsListMonth'])->name('admin.list.event.bulanan')->middleware('auth', 'admin');
Route::get('/admin/event-bulanan-add', [EventController::class, 'cmsAddMonth'])->name('admin.add.event.bulanan')->middleware('auth', 'admin');
Route::get('/admin/event-bulanan-edit/{id}', [EventController::class, 'cmsEditMonth'])->name('admin.edit.event.bulanan')->middleware('auth', 'admin');
// tiket 
Route::get('/admin/tiket', [TicketController::class, 'cmsList'])->name('admin.list.artikel.tiket')->middleware('auth', 'admin');
Route::get('/admin/add-tiket', [TicketController::class, 'cmsAdd'])->name('admin.add.artikel.tiket')->middleware('auth', 'admin');
Route::get('/admin/edit-tiket/{id}', [TicketController::class, 'cmsEdit'])->name('admin.edit.artikel.tiket')->middleware('auth', 'admin');
Route::put('/admin/update-tiket/{id?}', [TicketController::class, 'update'])->name('admin.update.artikel.tiket')->middleware('auth', 'admin');
Route::get('/admin/delete-tiket/{id}', [TicketController::class, 'destroy'])->name('admin.delete.artikel.tiket')->middleware('auth', 'admin');
Route::get('/admin/status-tiket/{id?}/{params?}', [TicketController::class, 'changeStatus'])->name('admin.change.artikel.tiket')->middleware('auth', 'admin');
Route::post('admin/tiket/post', [TicketController::class, 'store'])->name('admin.tiket.store')->middleware('auth', 'admin');
// promo 
Route::get('/admin/promo', [PromoController::class, 'cmsList'])->name('admin.list.artikel.promo')->middleware('auth', 'admin');
Route::get('/admin/add-promo', [PromoController::class, 'cmsAdd'])->name('admin.add.artikel.promo')->middleware('auth', 'admin');
Route::get('/admin/edit-promo/{id?}', [PromoController::class, 'cmsEdit'])->name('admin.edit.artikel.promo')->middleware('auth', 'admin');
Route::put('/admin/update-promo/{id?}', [PromoController::class, 'update'])->name('admin.update.artikel.promo')->middleware('auth', 'admin');
Route::get('/admin/delete-promo/{id}', [PromoController::class, 'destroy'])->name('admin.delete.artikel.promo')->middleware('auth', 'admin');
Route::get('/admin/status-promo/{id?}/{params?}', [PromoController::class, 'changeStatus'])->name('admin.change.artikel.promo')->middleware('auth', 'admin');
Route::post('admin/promo/post', [PromoController::class, 'store'])->name('admin.promo.store')->middleware('auth', 'admin');

Route::get('/admin/slide-promo', [PromoController::class, 'slideList'])->name('admin.promo.slide.list')->middleware('auth', 'admin');
Route::get('/admin/add-slide-promo', [PromoController::class, 'slideAdd'])->name('admin.promo.slide.add')->middleware('auth', 'admin');
Route::get('/admin/delete-promo-slider/{id}', [PromoController::class, 'destroyslider'])->name('admin.delete.slidepromo')->middleware('auth', 'admin');
Route::post('admin/slide-promo/post', [PromoController::class, 'storeslider'])->name('admin.banner.slidepromo')->middleware('auth', 'admin');
// faq 
Route::get('/admin/faq', [FaqController::class, 'cmsList'])->name('admin.list.artikel.faq')->middleware('auth', 'admin');
Route::get('/admin/add-faq', [FaqController::class, 'cmsAdd'])->name('admin.add.artikel.faq')->middleware('auth', 'admin');
Route::get('/admin/edit-faq/{id?}', [FaqController::class, 'cmsEdit'])->name('admin.edit.artikel.faq')->middleware('auth', 'admin');
Route::put('/admin/update-faq/{id?}', [FaqController::class, 'update'])->name('admin.update.artikel.faq')->middleware('auth', 'admin');
Route::get('/admin/delete-faq/{id}', [FaqController::class, 'destroy'])->name('admin.delete.artikel.faq')->middleware('auth', 'admin');
Route::get('/admin/status-faq/{id?}/{params?}', [FaqController::class, 'changeStatus'])->name('admin.change.artikel.faq')->middleware('auth', 'admin');
Route::post('admin/faq/post', [FaqController::class, 'store'])->name('admin.faq.store')->middleware('auth', 'admin');
// kontak 
Route::get('/admin/kontak', [ContactController::class, 'cmsList'])->middleware('auth', 'admin')->name('admin.kontak.kami.main');
Route::get('/admin/add-kontak', [ContactController::class, 'cmsAdd'])->middleware('auth', 'admin')->name('admin.kontak.kami.add');
Route::get('/admin/edit-kontak/{id}', [ContactController::class, 'cmsEdit'])->middleware('auth', 'admin')->name('admin.kontak.kami.edit');
Route::get('/admin/delete-kontak-kami/{id}', [ContactController::class, 'destroy'])->name('admin.delete.kontak.kami')->middleware('auth', 'admin');
Route::get('/admin/detail/{id}', [ContactController::class, 'lihat'])->name('admin.lihat.kontak')->middleware('auth', 'admin');

// saran dan kritik


// user 
Route::get('/admin/user', [UserController::class, 'list'])->name('admin.list.user')->middleware('auth', 'admin');
Route::get('/admin/add-user', [UserController::class, 'cmsAdd'])->name('admin.add.user')->middleware('auth', 'admin');
Route::get('/admin/edit-user/{id?}', [UserController::class, 'cmsEdit'])->name('admin.edit.user')->middleware('auth', 'admin');
Route::put('/admin/update-user/{id?}', [UserController::class, 'update'])->name('admin.update.user')->middleware('auth', 'admin');
Route::get('/admin/delete-user/{id}', [UserController::class, 'destroy'])->name('admin.delete.user')->middleware('auth', 'admin');
Route::get('/admin/status-user/{id?}/{params?}', [UserController::class, 'changeStatus'])->name('admin.change.user')->middleware('auth', 'admin');
Route::post('admin/user/post', [UserController::class, 'store'])->name('admin.user.store')->middleware('auth', 'admin');

// language 
Route::get('/admin/language', [LanguageController::class, 'list'])->name('admin.list.lang')->middleware('auth', 'admin');
Route::get('/admin/add-language', [LanguageController::class, 'cmsAdd'])->name('admin.add.lang')->middleware('auth', 'admin');
Route::get('/admin/edit-language/{id?}', [LanguageController::class, 'cmsEdit'])->name('admin.edit.lang')->middleware('auth', 'admin');
Route::put('/admin/update-language/{id?}', [LanguageController::class, 'update'])->name('admin.update.lang')->middleware('auth', 'admin');
Route::get('/admin/delete-language/{id}', [LanguageController::class, 'destroy'])->name('admin.delete.lang')->middleware('auth', 'admin');
Route::post('admin/language/post', [LanguageController::class, 'store'])->name('admin.lang.store')->middleware('auth', 'admin');
Route::get('/admin/language-list-layout/{id?}', [LanguageController::class, 'listLayout'])->name('admin.layout.lang')->middleware('auth', 'admin');
Route::get('/admin/language-navbar-layout/{id?}', [LanguageController::class, 'navbar'])->name('admin.add.navbar')->middleware('auth', 'admin');
Route::post('/admin/navbar-upsert/{id?}', [LanguageController::class, 'navbarUpsert'])->name('admin.upsert.navbar')->middleware('auth', 'admin');
Route::get('/admin/language-footer-layout/{id?}', [LanguageController::class, 'footer'])->name('admin.add.footer')->middleware('auth', 'admin');
Route::post('/admin/footer-upsert/{id?}', [LanguageController::class, 'footerUpsert'])->name('admin.upsert.footer')->middleware('auth', 'admin');
Route::get('/admin/language-login-layout/{id?}', [LanguageController::class, 'login'])->name('admin.add.login')->middleware('auth', 'admin');
Route::post('/admin/login-upsert/{id?}', [LanguageController::class, 'loginUpsert'])->name('admin.upsert.login')->middleware('auth', 'admin');
Route::get('/admin/language-home-layout/{id?}', [LanguageController::class, 'home'])->name('admin.add.home')->middleware('auth', 'admin');
Route::post('/admin/home-upsert/{id?}', [LanguageController::class, 'homeUpsert'])->name('admin.upsert.home')->middleware('auth', 'admin');
Route::get('/admin/language-event-layout/{id?}', [LanguageController::class, 'event'])->name('admin.add.event')->middleware('auth', 'admin');
Route::post('/admin/event-upsert/{id?}', [LanguageController::class, 'eventUpsert'])->name('admin.upsert.event')->middleware('auth', 'admin');
Route::get('/admin/language-jelajah-layout/{id?}', [LanguageController::class, 'jelajah'])->name('admin.add.jelajah')->middleware('auth', 'admin');
Route::post('/admin/jelajah-upsert/{id?}', [LanguageController::class, 'jelajahUpsert'])->name('admin.upsert.jelajah')->middleware('auth', 'admin');
Route::get('/admin/language-info-layout/{id?}', [LanguageController::class, 'info'])->name('admin.add.info')->middleware('auth', 'admin');
Route::post('/admin/info-upsert/{id?}', [LanguageController::class, 'infoUpsert'])->name('admin.upsert.info')->middleware('auth', 'admin');
Route::get('/admin/language-ticket-layout/{id?}', [LanguageController::class, 'ticket'])->name('admin.add.ticket')->middleware('auth', 'admin');
Route::post('/admin/ticket-upsert/{id?}', [LanguageController::class, 'ticketUpsert'])->name('admin.upsert.ticket')->middleware('auth', 'admin');
Route::get('/admin/language-promo-layout/{id?}', [LanguageController::class, 'promo'])->name('admin.add.promo')->middleware('auth', 'admin');
Route::post('/admin/promo-upsert/{id?}', [LanguageController::class, 'promoUpsert'])->name('admin.upsert.promo')->middleware('auth', 'admin');
Route::get('/admin/language-contact-layout/{id?}', [LanguageController::class, 'contact'])->name('admin.add.contact')->middleware('auth', 'admin');
Route::post('/admin/contact-upsert/{id?}', [LanguageController::class, 'contactUpsert'])->name('admin.upsert.contact')->middleware('auth', 'admin');


// role 
Route::get('/admin/role', [RoleController::class, 'list'])->name('admin.list.role')->middleware('auth', 'admin');
Route::get('/admin/add-role', [RoleController::class, 'cmsAdd'])->name('admin.add.role')->middleware('auth', 'admin');
Route::get('/admin/edit-role/{id?}', [RoleController::class, 'cmsEdit'])->name('admin.edit.role')->middleware('auth', 'admin');
Route::put('/admin/update-role/{id?}', [RoleController::class, 'update'])->name('admin.update.role')->middleware('auth', 'admin');
Route::get('/admin/delete-role/{id}', [RoleController::class, 'destroy'])->name('admin.delete.role')->middleware('auth', 'admin');
Route::get('/admin/status-role/{id?}/{params?}', [RoleController::class, 'changeStatus'])->name('admin.change.role')->middleware('auth', 'admin');
Route::post('admin/role/post', [RoleController::class, 'store'])->name('admin.role.store')->middleware('auth', 'admin');
// front ---------------------------------------------------------

Route::get('/tiket', [TicketController::class, 'index'])->name('tiket.detail');
Route::get('/tiket/soon', [TicketController::class, 'soon'])->name('tiket.soon');
Route::get('/promo', [PromoController::class, 'index'])->name('tiket.promo.main');
Route::get('/promo/{id}/detail', [PromoController::class, 'detail'])->name('promo.detail');
Route::get('/jelajah', [JelajahController::class, 'show'])->name('jelajah.main');
Route::get('/jelajah/{id}/detail', [JelajahController::class, 'index'])->name('jelajah.detail');
Route::get('/info', [InfoController::class, 'index'])->name('info.main');
Route::get('/info/{id}/detail', [InfoController::class, 'detail'])->name('info.detail');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.main');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.main');
Route::post('/kontak/store', [ContactController::class, 'store'])->name('kontak.store');
Route::get('/profile', [ProfileController::class, 'index'])->name('profil.main')->middleware('auth');
Route::post('/profile/informasi-store', [ProfileController::class, 'infostore'])->name('profil.info.store')->middleware('auth');
Route::get('/profile/reset', [ProfileController::class, 'reset'])->name('profil.reset')->middleware('auth');
Route::post('/profile/password-store', [ProfileController::class, 'passstore'])->name('profil.pass.store')->middleware('auth');

Route::get('/kalender-event', [EventController::class, 'index'])->name('event.main');
Route::get('/kalender-event/{id}/{params}/list', [EventController::class, 'kanal'])->name('event.list');
Route::get('/kalender-event/{id}/detail', [EventController::class, 'detail'])->name('event.detail');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/coming-soon', [HomeController::class, 'coming'])->name('coming');

// end front --------------------------------------------------------


Route::post('/store', [AuthController::class, 'store'])->name('store');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login/admin', [AdminauthController::class, 'login'])->name('login.admin');
Route::get('/register/admin', [AdminauthController::class, 'register'])->name('register.admin');
Route::post('/store/admin', [AdminauthController::class, 'store'])->name('store.admin');
Route::post('/authenticate/admin', [AdminauthController::class, 'authenticate'])->name('authenticate.admin');
Route::post('/logout/admin', [AdminauthController::class, 'logout'])->name('logout.admin');

Route::get('locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('locale');
