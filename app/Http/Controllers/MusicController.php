<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Album;
use App\Models\Song;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MusicController extends Controller
{
     public function layout(){
        return view('musicana.layout');
     }
     //////////////////////////////////////////////
     /////////////////////////////////////////////

    public function register(Request $request){

              $message=null;

              if(isset($request->name)){
                  $name=trim($request->name);
                  $email=trim($request->email);
                  $user_id=trim($request->user_id);
                  $password=md5($request->password);

                  $ob=new Music();
                  $ob->name=$name;
                  $ob->email=$email;
                  $ob->user_id=$user_id;
                  $ob->password=$password;
                  $ob->save();
                  $message="register successfully";
                 
          }
           return view('musicana.register',compact('message'));    
        }  
         
    
  ////////////////////////////////////////////////////
  ////////////////////////////////////////////////////

  public function login(Request $request){

              $message=null;

              if(isset($request->email)){
                $email= trim($request->email);
                $password=md5($request->password);
                $is_valid=Music::where('email',$email)->where('password',$password)->count();
              if($is_valid > 0){
                    Session::put('email',$email);
                    return redirect('/index');
                 } else {
                        $message="<font color=green>Invalid user login</font>";

                 }
              }
              return view('musicana.login',compact('message'));
     }
     /////////////////////////////////////////////
     /////////////////////////////////////////////

     public function addalbum( Request $request){

               $message=null;
            if(isset($request->title)){
                $title=trim($request->title);  
                $ob= new Album();
                $ob->title=$title;
            

            if (@$_FILES['photo']['name'] != null) { 

              $_FILES['photo']['name'] =  time().$_FILES['photo']['name']; 
            move_uploaded_file($_FILES['photo']['tmp_name'], public_path() . "/photos/" . $_FILES['photo']['name']); 
         
                $ob->photo = $_FILES['photo']['name'];
                  
            }
                $ob->save();
                $message="Album added succesfully";
        }

        return view('musicana.addalbum');
     }
     //////////////////////////////////////////////
     //////////////////////////////////////////////

      public function albumlist(){
        
        $datas=null;
        $total=0;
        if(isset($request->data)){
        $datas=Album::where('title','like',"%$request->data%")->orwhere('title','like',"%$request->data%")->get();
        $total=Album::where('title','like',"%$request->data%")->orwhere('title','like',"%$request->data%")->count();
        }else{

        $datas=Album::orderBy('id','DESC')->get();
        $total=Album::count();
        }
        return view('musicana.albumlist',compact('datas','total'));
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////

    public function edit_album($id,Request $request){
        
       $id=Crypt::decrypt($id);
           $message=null;

           if(isset($request->title)){
             $title=trim($request->title);

            Album::where('id',$id)->update(
                [   
                    'title'=>$title,
                ]
            );
            if(@$_FILES['photo']['name']!=null){
                $_FILES['photo']['name']=time().$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],public_path()."/photos/".$_FILES['photo']['name']);
                Album::where('id',$id)->update(
                   [
                    'photo'=>$_FILES['photo']['name'],

                    

                   ]
                );
              
            }
             $message="Data updated successfully";

           }
             $data=Album::where('id',$id)->first();
            
            return view('musicana.edit_album',compact('data','message'));
        
    }
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    public function delete_album($id){

         Album::where('id',$id)->delete();
            return redirect('/albumlist');

    }
    //////////////////////////////////////
    //////////////////////////////////////

     public function addmusic(Request $request){

              $message=null;
             
         if (isset($request->title)) {
            $title=trim($request->title);
            $album_id=trim($request->album);
            

            $ob1=new Song();
            $ob1->title=$title;
            $ob1->album_id=$album_id;
           
            if (@$_FILES['audio']['name'] != null) { 

            $_FILES['audio']['name'] =  time().$_FILES['audio']['name']; 
              move_uploaded_file($_FILES['audio']['tmp_name'], public_path() . "/audios/" . $_FILES['audio']['name']); 
         
                 $ob1->audio = $_FILES['audio']['name'];
                  
            }

                if (@$_FILES['photo']['name'] != null) { 

                $_FILES['photo']['name'] =  time().$_FILES['photo']['name']; 
              move_uploaded_file($_FILES['photo']['tmp_name'], public_path() . "/photos/" . $_FILES['photo']['name']); 
         
                 $ob1->photo = $_FILES['photo']['name'];
                  
            }
                 $ob1->save();
                 $message="Songs added succesfully";
          }       

        return view('musicana.addmusic',compact('message'));
     }
     /////////////////////////////////////////////////
     /////////////////////////////////////////////////

     public function musiclist(){

         $datas=null;
        $total=0;
        if(isset($request->data)){
        $datas=Song::where('title','like',"%$request->data%")->get();
        $total=Song::where('title','like',"%$request->data%")->count();
        }else{
        $datas=Song::orderBy('id','DESC')->get();
        $total=Song::count();
        }


      return  view('musicana.musiclist',compact('datas','total'));
    }
    /////////////////////////////////////////////////
    /////////////////////////////////////////////////

    public function edit_music(Request $request,$id){

          $id=Crypt::decrypt($id);
           $message=null;

           if(isset($request->title)){
             $title=trim($request->title);
             $album_id=trim($request->album);

            Song::where('id',$id)->update(
                [   
                    'title'=>$title,
                    'album_id'=>$album_id,
                ]
            );

            if(@$_FILES['audio']['name']!=null){
                $_FILES['audio']['name']=time().$_FILES['audio']['name'];
                move_uploaded_file($_FILES['audio']['tmp_name'],public_path()."/audios/".$_FILES['audio']['name']);
                Song::where('id',$id)->update(
                   [
                    'audio'=>$_FILES['audio']['name'],

                   ]
                );
              
            }
            if(@$_FILES['photo']['name']!=null){
                $_FILES['photo']['name']=time().$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],public_path()."/photos/".$_FILES['photo']['name']);
                Song::where('id',$id)->update(
                   [
                    'photo'=>$_FILES['photo']['name'],

                   ]
                );
              
            }
             $message="Data updated successfully";

           }
             $data=Song::where('id',$id)->first();
             $albums = Album::all();
            
            return view('musicana.edit_music',compact('data','message','albums'));
        
    }
    ////////////////////////////////////////////
    ////////////////////////////////////////////

    public function delete_music($id){

         Song::where('id',$id)->delete();
            return redirect('/musiclist');

    }
    /////////////////////////////////////////////////
    ////////////////////////////////////////////////
    public function listofsong($id)
    {
        $lists =Song::where('album_id', $id)->get();
        return view('musicana.listofsong', compact('lists'));
    }
    //////////////////////////////////////////////
    //////////////////////////////////////////////
    public function forgotpassword(Request $request){
        
        return view('musicana.forgotpassword');
    }

  
}

