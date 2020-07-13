<?php

namespace App\Http\Controllers;

use App;
use Artisan;
use Illuminate\Http\Request;

class CmdController extends Controller
{
  /**
     * Run artisan command on shared hosting
     */
    public function artisanCmd($key = null)
    {
        switch ($key) {
            case 'key_generate':
                # clear CACHE
                try {
                    echo '<br>php artisan key:generate...';
                    Artisan::call('key:generate');
                    echo '<br>php artisan key:generate completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;

            case 'cache_clear':
                # clear CACHE
                try {
                    echo '<br>php artisan cache:clear...';
                    Artisan::call('cache:clear');
                    echo '<br>php artisan cache:clear completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'config_cache':
                # CONFIG cache
                try {
                    echo '<br>php artisan config:cache...';
                    Artisan::call('config:cache');
                    echo '<br>php artisan config:cache completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'config_clear':
                # clear CONFIG cache
                try {
                    echo '<br>php artisan config:clear...';
                    Artisan::call('config:clear');
                    echo '<br>php artisan config:clear completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'logs_clear':
                # clear LOG cache
                try {
                    echo '<br>php artisan logs:clear...';
                    Artisan::call('logs:clear');
                    echo '<br>php artisan logs:clear completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'route_cache':
                # ROUTE cache
                try {
                    echo '<br>php artisan route:cache...';
                    Artisan::call('route:cache');
                    echo '<br>php artisan route:cache completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'route_clear':
                # clear ROUTE cache
                try {
                    echo '<br>php artisan route:clear...';
                    Artisan::call('route:clear');
                    echo '<br>php artisan route:clear completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'view_cache':
                # VIEW cache
                try {
                    echo '<br>php artisan view:cache...';
                    Artisan::call('view:cache');
                    echo '<br>php artisan view:cache completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'view_clear':
                # clear VIEW cache
                try {
                    echo '<br>php artisan view:clear...';
                    Artisan::call('view:clear');
                    echo '<br>php artisan view:clear completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'optimize':
              # MIGRATE database for production
              try {
                  echo '<br>php artisan optimize';
                  Artisan::call('optimize'); // using --force for run in production
                  echo '<br>php artisan optimize completed';
              }
              catch (Exception $e) {
                  response()->json($e->getMessage(), 500);
              }
              break;

            case 'optimize_clear':
              # MIGRATE database for production
              try {
                  echo '<br>php artisan optimize:clear';
                  Artisan::call('optimize:clear'); // using --force for run in production
                  echo '<br>php artisan optimize:clear completed';
              }
              catch (Exception $e) {
                  response()->json($e->getMessage(), 500);
              }
              break;

            case 'storage_link':
                # clear VIEW cache
                try {
                    echo '<br>php artisan storage:link...';
                    Artisan::call('storage:link');
                    echo '<br>php artisan storage:link completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            case 'db_migrate':
                # MIGRATE database
                try {
                    echo '<br>php artisan migrate...';
                    Artisan::call('migrate'); // using --force for run in production
                    echo '<br>php artisan migrate completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;

            case 'db_migrate_force':
                # MIGRATE database for production
                try {
                    echo '<br>php artisan migrate --force...';
                    Artisan::call('migrate', ["--force"=> true ]); // using --force for run in production
                    echo '<br>php artisan migrate --force completed';
                }
                catch (Exception $e) {
                    response()->json($e->getMessage(), 500);
                }
                break;
            
            // case 'db_migrate_rollback':
            //     # ROLL BACK latest database migration
            //     try {
            //         echo '<br>php artisan migrate rollback...';
            //         Artisan::call('migrate:rollback', ["--force"=> true ]); // using --force for run in production
            //         echo '<br>php artisan migrate:rollback completed';
            //     }
            //     catch (Exception $e) {
            //         response()->json($e->getMessage(), 500);
            //     }
            //     break;
            
            case 'db_seed':
              # MIGRATE database
              try {
                  echo '<br>php artisan db:seed...';
                  Artisan::call('db:seed'); // using --force for run in production
                  echo '<br>php artisan db:seed completed';
              }
              catch (Exception $e) {
                  response()->json($e->getMessage(), 500);
              }
              break;

            default:
                # url not found
                App::abort(404);
                break;
        }
    }
}
