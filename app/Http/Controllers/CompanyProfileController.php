<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;
use App\Mail\ContactUsClientEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;

class CompanyProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);

        return view('welcome', compact(
            'productCategories'
        ));
    }

    public function contactUs()
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);
        return view('pages.contact', compact(
            'productCategories'
        ));
    }

    public function sendEmail(SendMailRequest $request)
    {
        // dd($request->all());
        Mail::to('indraranuh1@gmail.com')->send(new ContactUsClientEmail(
            $request->name,
            $request->email,
            $request->phone,
            $request->subject,
            $request->message,
        ));
        return redirect()
            ->route('contact')
            ->with(
                'success',
                'Email berhasil dikirim. Mohon tunggu respon kami selanjutnya. Terima kasih.'
            );
    }
}