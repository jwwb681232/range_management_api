<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable               $exception
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        //后台管理系统
        if ($request->is('admin/api/*') && $exception instanceof ValidationException) {
            return response()->json([
                'code'    => 422,
                'messages' => $exception->errors(),
                'status'  => 'error',
            ],422);
        }

        if ($request->is('api/*') && $exception instanceof ModelNotFoundException) {
            return response()->json([
                'code'    => 404,
                'message' => $exception->getMessage(),
                'status'  => 'error',
            ],404);
        }

        if ($request->is('api/*') && $exception instanceof ValidationException) {
            return response()->json([
                'code'    => $exception->status,
                'message' => current($exception->errors())[0],
                'status'  => 'error',
            ]);
        }

        return parent::render($request, $exception);
    }

}
