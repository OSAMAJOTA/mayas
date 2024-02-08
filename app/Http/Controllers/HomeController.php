<?php

namespace App\Http\Controllers;

use App\agents;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $agents=agents::count();
        $agents1=agents::where('Status_id',1)->count();
        $agents2=agents::where('Status_id',2)->count();
        $agents3=agents::where('Status_id',3)->count();
        $agents4=agents::where('Status_id',4)->count();
        $agents5=agents::where('Status_id',5)->count();


        $chartjs1 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['عملاء بنتظار التوجيه','عملاء بانتظار التواصل معهم','عملاء تم التواصل معهم','عملاء طلبو زيارة منزلية ','عملاء محظورين '])
            ->datasets([
                [
                    'backgroundColor' => ['rgba(218, 170, 46)', 'rgba(228, 104, 104 )','rgba(85, 123, 66  )','rgba(64, 182, 196 )','rgba(68, 70, 70  )'],
                    'hoverBackgroundColor' => ['rgba(218, 170, 46)', 'rgba(228, 104, 104 )','rgba(85, 123, 66  )','rgba(64, 182, 196 )','rgba(68, 70, 70  )'],
                    'data' => [$agents1, $agents2,$agents3,$agents4,$agents5]
                ]
            ])
            ->options([]);









        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels([ ' العملاء','عملاء بنتظار التوجيه','عملاء بانتظار التواصل معهم','عملاء تم التواصل معهم','عملاء طلبو زيارة منزلية ','عملاء محظورين '])
            ->datasets([
                [
                    "label" => "  جميع العملاء ",
                    'backgroundColor' => ['rgba(24, 33, 138)'],
                    'data' => [$agents]
                ],

                [
                    "label" => "   العملاء بانتظار التوجيه",
                    'backgroundColor' => ['rgba(218, 170, 46)'],
                    'data' => [$agents1]
                ],
                [
                    "label" => " عملاء بانتظار التواصل معهم",
                    'backgroundColor' => ['rgba(228, 104, 104 )'],
                    'data' => [$agents2]
                ],
                [
                    "label" => "عملاء تم التواصل معهم",
                    'backgroundColor' => ['rgba(85, 123, 66  )'],
                    'data' => [$agents3]
                ]
                ,
                [
                    "label" => " عملاء طلبو زيارة منزلية",
                    'backgroundColor' => ['rgba(64, 182, 196 )'],
                    'data' => [$agents4]
                ]
                ,
                [
                    "label" => " عملاء محظورين",
                    'backgroundColor' => ['rgba(68, 70, 70  )'],
                    'data' => [$agents5]
                ],


                ])
            ->options([]);



        $users = User::select("*")
            ->whereNotNull('last_seen')
            ->orderBy('last_seen', 'DESC')
            ->paginate(10);


        return view('home',compact('users','chartjs','chartjs1'));

    }
}
