<?php

namespace App\Exceptions;

use App\Models\SEO;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Exceptions\InvalidOrderException;
use Throwable;

class Handler extends ExceptionHandler
{

 
  
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
   
    public function register()
    {

        $this->reportable(function (Throwable $e) {
            //
        });
        
        $this->renderable(function (NotFoundHttpException $e, $request) {
          $data['cont'] = SEO::where('page', 'contacts')->first();
          return response()->view('errors.404', $data, 404);
        });

        
    }

   
    
}
