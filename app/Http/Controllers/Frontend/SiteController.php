<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutSection;
use App\Models\Contact;
use App\Models\Home;
use App\Models\Partner;
use App\Models\Purpose;
use App\Models\Service;
use App\Models\Social;
use App\Models\User;
use App\Models\Value;
use App\Models\Work;
use App\Models\WorkSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function index(){
        $home = Home::first();
        $services = Service::all();
        $about = About::with('sections')->first();
        //$aboutSections = AboutSection::all();
        $values = Value::all();
        //dd($about);
        $purposes = Purpose::all();
        $work = Work::first();
        $worksSections = WorkSection::with('lists')->get();
        $partners = Partner::all();
        $social = Social::first();
        $contact = Contact::first();

        return view('frontend.site',compact('home','services','about','values','purposes','work','worksSections','partners','social','contact'));
    }

//    public function sms(){
//        $number= array('962775772008','2051561653');
//        //dd($number);
//        $number1 = implode(',',$number);
//        $user = Partner::select('id')->get()->toArray();
//        //dd($user);
////        $userArray[]=nullValue();
//        $array = array();
//        foreach ($user as $id){
//            //dd($id);
//            foreach ($id as $item)
//            array_push($array,$item);
//        }
//        $num = implode(',',$array);
//
//        dd($num);
//
//        //dd ($number1);
//        //return  Http::get('http://josmsservice.com/sms/api/SendSingleMessage.cfm?numbers='.$number1.',&senderid=TONYMOLY&AccName=TonyMolyy&AccPass=T6@Ny2@MlY2&msg=SMSBody&requesttimeout=5000000');
//
//    }
}
