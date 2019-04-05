<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use PDF;

class IndexController extends Controller
{
    public function index()
    {
        \Log::info('begin');
        $data = ['title' => 'Welcome to HDTuto.com'];


//        $pdf = \PDFgen::loadHtml('Irronhoang');
//        $pdf = PDF::loadView('pages.user.pdf.index', $data);
        \Log::info('End');
//        return $pdf->stream();
//        return $pdf->download('dowwnload.pdf');
        return view('pages.user.pdf.index', []);
    }

    public function pdf1( Request $request)
    {
        \Log::info('begin');
        $data = $request->all();


//        $pdf = PDF::loadHtml('Irronhoang');
        $pdf = PDF::loadView('pages.user.pdf.index', ['data'=>$data]);
//        dump($pdf);
        \Log::info('End');

        $pdf->save(public_path('sample2.pdf'));
//        return $pdf->download('dowwnload.pdf');
        return view('pages.user.pdf.index', []);
    }
}
