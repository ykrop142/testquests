<?php

namespace App\Http\Middleware;

use Closure;

class CheckReg
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty($request)){
            if($request->password==$request->password2){
            }
            else
                {
                    echo 'Пароли не совпадают';
                }
        }
        else
            {
                echo 'Ошибка запроса. Повторите через пару минут';
            }
        return $next($request);
    }
}
