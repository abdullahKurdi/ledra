<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutSection;
use App\Models\Client;
use App\Models\Contact;
use App\Models\ContactInformation;
use App\Models\Empolyee;
use App\Models\Home;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Purpose;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Social;
use App\Models\Value;
use App\Models\Work;
use App\Models\WorkSection;
use App\Models\WorkSectionList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){
        $home = Home::first();
        return view('backend.home' ,compact('home'));
    }
    public function homeUpdate(Request $request){

        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $data['title']=$request->title;
        $data['description']=$request->description;

        $home = Home::first();
        $home->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }

    public function contact(){
        $contact = Contact::first();
        return view('backend.contact' ,compact('contact'));
    }
    public function contactUpdate(Request $request){

        $validate =Validator::make($request->all(),[
            'address'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $data['address']=$request->address;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['latitude']=$request->latitude;
        $data['longitude']=$request->longitude;

        $contact = Contact::first();
        $contact->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }

    public function social(){
        $social = Social::first();
        return view('backend.social' ,compact('social'));
    }
    public function socialUpdate(Request $request){

        $validate =Validator::make($request->all(),[
            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'twitter'=>'nullable',
            'whatsapp'=>'nullable',
            'linkedin'=>'nullable',
            'snapchat'=>'nullable',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $data['facebook']=$request->facebook;
        $data['instagram']=$request->instagram;
        $data['twitter']=$request->twitter;
        $data['whatsapp']=$request->whatsapp;
        $data['linkedin']=$request->linkedin;
        $data['snapchat']=$request->snapchat;

        $social = Social::first();
        $social->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }

    public function services(){
        $services = Service::all();
        return view('backend.services',compact('services'));
    }
    public function servicesCreate(){
        return view('backend.services-create');
    }
    public function servicesStore(Request $request){
        $validate =Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'img'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['name']=$request->name;
        $data['description']=$request->description;

        $filename = Str::slug($data['name']).'-'.time().'-'.$request->img->getClientOriginalName();
        $path = public_path('images/'.$filename);
        Image::make($request->img->getRealPath())->resize(900,null,function ($constraint){
            $constraint->aspectRatio();
        })->save($path,100);

        $data['img']= $filename;

        Service::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function servicesEdit($id){
        $service = Service::whereId($id)->first();
        if($service){
            return view('backend.services-edit',compact('service'));
        }
        return redirect()->back();
    }
    public function serviceUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $service = Service::whereId($id)->first();
        if($service){
            if($request->hasFile('img')){
                if(File::exists('images/'.$service->img)){
                    unlink('images/'.$service->img);
                }
            }

            $data['name']=$request->name;
            $data['description']=$request->description;


            if($request->hasFile('img')){
                $filename = Str::slug($data['name']).'-'.time().'-'.$request->img->getClientOriginalName();
                $path = public_path('images/'.$filename);
                Image::make($request->img->getRealPath())->resize(900,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $data['img']= $filename;
            }
            $service->update($data);

        }else{return redirect()->back();}
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function serviceDestroy($id){
        $service = Service::whereId($id)->first();

        if($service){
            if(File::exists('images/'.$service->img)){
                unlink('images/'.$service->img);
            }
        }
        $service->delete();
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }

    public function about(){
        $about = About::first();
        $aboutSections =AboutSection::all();
        //dd($aboutSections);
        return view('backend.about' ,compact('about','aboutSections'));
    }
    public function aboutUpdate(Request $request){
        $validate =Validator::make($request->all(),[
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $data['description']=$request->description;

        $about = About::first();
        $about->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function aboutSectionCreate(){
        return view('backend.about-create');
    }
    public function aboutSectionStore(Request $request){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['title']=$request->title;
        $data['about_id']=1;
        $data['description']=$request->description;

        AboutSection::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function aboutSectionEdit($id){
        $aboutSection = AboutSection::whereId($id)->first();
        if($aboutSection){
            return view('backend.about-edit',compact('aboutSection'));
        }
        return redirect()->back();
    }
    public function aboutSectionUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $about = AboutSection::whereId($id)->first();

            $data['title']=$request->title;
            $data['description']=$request->description;

        $about->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function aboutSectionDestroy($id)
    {
        $about = AboutSection::whereId($id)->first();
        $about->delete();
        return redirect()->back()->with([
            'message' => 'Successfully',
            'alert' => 'success'
        ]);
    }


    public function ourValue(){
        $value = Value::all();
        return view('backend.value',compact('value'));
    }
    public function ourValueCreate(){
        return view('backend.value-create');
    }
    public function ourValueStore(Request $request){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['title']=$request->title;
        $data['description']=$request->description;


        Value::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function ourValueEdit($id){
        $value = Value::whereId($id)->first();
        if($value){
            return view('backend.value-edit',compact('value'));
        }
        return redirect()->back();
    }
    public function ourValueUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $value = Value::whereId($id)->first();
        if($value){
            $data['title']=$request->title;
            $data['description']=$request->description;


            $value->update($data);

        }else{return redirect()->back();}
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function ourValueDestroy($id){
        $value = Value::whereId($id)->first();

        $value->delete();
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }



    public function ourPurpose(){
        $value = Purpose::all();
        return view('backend.purpose',compact('value'));
    }
    public function ourPurposeCreate(){
        return view('backend.purpose-create');
    }
    public function ourPurposeStore(Request $request){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['title']=$request->title;
        $data['description']=$request->description;


        Purpose::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function ourPurposeEdit($id){
        $value = Purpose::whereId($id)->first();
        if($value){
            return view('backend.purpose-edit',compact('value'));
        }
        return redirect()->back();
    }
    public function ourPurposeUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $value = Purpose::whereId($id)->first();
        if($value){
            $data['title']=$request->title;
            $data['description']=$request->description;


            $value->update($data);

        }else{return redirect()->back();}
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function ourPurposeDestroy($id){
        $value = Purpose::whereId($id)->first();

        $value->delete();
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }



    public function work(){
        $about = Work::first();
        $aboutSections =WorkSection::all();
        $list = WorkSectionList::all();
        //dd($aboutSections);
        return view('backend.work' ,compact('about','aboutSections','list'));
    }
    public function workUpdate(Request $request){
        $validate =Validator::make($request->all(),[
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $data['description']=$request->description;

        $about = Work::first();
        $about->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function workSectionCreate(){
        return view('backend.work-create');
    }
    public function workSectionStore(Request $request){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['title']=$request->title;
        $data['work_id']=1;


        WorkSection::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function workSectionEdit($id){
        $aboutSection = WorkSection::whereId($id)->first();
        if($aboutSection){
            return view('backend.work-edit',compact('aboutSection'));
        }
        return redirect()->back();
    }
    public function workSectionUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $about = WorkSection::whereId($id)->first();

        $data['title']=$request->title;


        $about->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function workSectionDestroy($id)
    {
        $about = WorkSection::whereId($id)->first();
        $about->delete();
        return redirect()->back()->with([
            'message' => 'Successfully',
            'alert' => 'success'
        ]);
    }

    public function workSectionListCreate(){
        $sections = WorkSection::pluck('title','id');
        return view('backend.work-list-create',compact('sections'));
    }
    public function workSectionListStore(Request $request){
        $validate =Validator::make($request->all(),[
            'work_section_id'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['description']=$request->description;
        $data['work_section_id']=$request->work_section_id;


        WorkSectionList::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function workSectionListEdit($id){
        $sections = WorkSection::pluck('title','id');

        $aboutSection = WorkSectionList::whereId($id)->first();
        if($aboutSection){
            return view('backend.work-list-edit',compact('aboutSection','sections'));
        }
        return redirect()->back();
    }
    public function workSectionListUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'work_section_id'=>'required',
            'description'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $about = WorkSectionList::whereId($id)->first();

        $data['description']=$request->description;
        $data['work_section_id']=$request->work_section_id;

        $about->update($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function workSectionListDestroy($id)
    {
        $about = WorkSectionList::whereId($id)->first();
        $about->delete();
        return redirect()->back()->with([
            'message' => 'Successfully',
            'alert' => 'success'
        ]);
    }


    public function partners(){
        $services = Partner::all();
        return view('backend.partners',compact('services'));
    }
    public function partnersCreate(){
        return view('backend.partners-create');
    }
    public function partnersStore(Request $request){
        $validate =Validator::make($request->all(),[
            'name'=>'required',
            'img'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $data['name']=$request->name;

        $filename = Str::slug($data['name']).'-'.time().'-'.$request->img->getClientOriginalName();
        $path = public_path('images/'.$filename);
        Image::make($request->img->getRealPath())->resize(900,null,function ($constraint){
            $constraint->aspectRatio();
        })->save($path,100);

        $data['img']= $filename;

        Partner::create($data);

        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function partnersEdit($id){
        $service = Partner::whereId($id)->first();
        if($service){
            return view('backend.partners-edit',compact('service'));
        }
        return redirect()->back();
    }
    public function partnersUpdate(Request $request,$id){
        $validate =Validator::make($request->all(),[
            'name'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $service = Partner::whereId($id)->first();
        if($service){
            if($request->hasFile('img')){
                if(File::exists('images/'.$service->img)){
                    unlink('images/'.$service->img);
                }
            }

            $data['name']=$request->name;


            if($request->hasFile('img')){
                $filename = Str::slug($data['name']).'-'.time().'-'.$request->img->getClientOriginalName();
                $path = path('images/'.$filename);
                Image::make($request->img->getRealPath())->resize(900,null,function ($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);

                $data['img']= $filename;
            }
            $service->update($data);

        }else{return redirect()->back();}
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }
    public function partnersDestroy($id){
        $service = Partner::whereId($id)->first();

        if($service){
            if(File::exists('images/'.$service->img)){
                unlink('images/'.$service->img);
            }
        }
        $service->delete();
        return redirect()->back()->with([
            'message'=>'Successfully',
            'alert'=>'success'
        ]);
    }

}
