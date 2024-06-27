<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        // Custom log levels for specific exceptions
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        // Add exceptions that you do not want to report
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'status' => false,
                'message' => 'Method Not Allowed',
                'error' => $e->getMessage()
            ], Response::HTTP_METHOD_NOT_ALLOWED);
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            return response()->json([
                'status' => false,
                'message' => 'Resource Not Found',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        });

        $this->renderable(function (HttpResponseException $e, $request) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid JSON',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        });

        // You can add more custom handlers here as needed
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'status' => false,
                'message' => 'Method Not Allowed',
                'error' => $e->getMessage()
            ], Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'status' => false,
                'message' => 'Resource Not Found',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof HttpResponseException) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid JSON',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }

        return parent::render($request, $e);
    }
}
