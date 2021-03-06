<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use Illuminate\Http\Request;
use App\Mail\ContactUsClientEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\Model\Entities\Banner;
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
        $banners = Banner::all();
        return view('welcome', compact('banners'));
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function contactUs()
    {
        return view('pages.contact');
    }

    public function sendEmail(SendMailRequest $request)
    {
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

    public function pricing(Request $request)
    {
        return redirect()->route('contact')
            ->with('link', 'Saya ingin bertanya seputar produk : ' . $request->_link);
    }

    public function getBannerImage($image)
    {
        $storage = Storage::disk('banner');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }
}