<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use TypeError;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     *
     * @throws Exception
     * @throws Throwable
     */
    public function report(Throwable $e): void
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($request->acceptsJson()) {
            $payLoads = match (true) {
                $e instanceof ValidationException => ['data' => $e->getMessage(), 'code' => 400],
                $e instanceof AuthenticationException => ['data' => $e->getMessage(), 'code' => 401],
                $e instanceof QueryException => ['data' => 'Internal Error', 'code' => 500],
                $e instanceof TypeError => ['data' => 'Type Error', 'code' => 500],
                $e instanceof NotFoundHttpException => ['data' => 'Sorry we dont serve this route', 'code' => 404],
                $e instanceof ModelNotFoundException => ['data' => 'Sorry record not found.', 'code' => 404],
                default => ['data' => $e->getMessage(), 'code' => $e->getCode()]
            };

            return response()->fail($payLoads);
        }

        return parent::render($request, $e);
    }
}
