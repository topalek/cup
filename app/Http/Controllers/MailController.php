<?php

namespace App\Http\Controllers;

use App\Mail\FbMail;
use App\Mail\ModalMail;
use App\Mail\ReqMail;
use App\Mail\RevVakMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function sendEmail(Request $req){
      $req->validate([
          'user'=>'required|min:4|max:60',
          'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);
      $price=$req->price;
      if($price==null){$price=0;};

      $kids=$req->kids;
      if($kids==null){$kids=0;};

      $adults=$req->adults;
      if($adults==null){$adults=0;};

      $datebegin=$req->datebegin;
      if($datebegin==null){$datebegin='не указана';};

      $data=[
          'title'=>'Заказ мероприятия с сайта CUP',
          'user'=> 'Имя: '.$req->user,
          'phone'=> 'Телефон: '.$req->phone,
          'titlemer'=> 'Мероприятие: '.$req->titlemer,
          'datebegin'=> 'Дата проведения: '.$datebegin,
          'adults'=> 'Количество взрослых: '.$adults,
          'kids'=> 'Количество детей: '.$kids,
          'price'=> 'Стоимость: '.$price.' руб.'
      ];

      Mail::to("AZuribeda@yandex.ru")
        //->bcc("AZuribeda@yandex.ru")
        //("zaevka@umax.agency")
        ->send(new ReqMail($data));
      return response()->json(['output'=>'Заявка на заказ мероприятия отправлена!']);
    }

    public function sendEmailFb(Request $req){
      $req->validate([
          'userName'=>'required|min:4|max:60',
          'userPhone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);

      $data=[
          'title'=>'Заявка на звонок с сайта CUP',
          'user'=> 'Имя: '.$req->userName,
          'phone'=> 'Телефон: '.$req->userPhone,
      ];

      Mail::to("AZuribeda@yandex.ru")
        //->bcc("AZuribeda@yandex.ru")
        //("zaevka@umax.agency")
        ->send(new FbMail($data));
      return redirect()->back()->with('success','Заявка отправлена!');
    }

    public function sendEmailFb2(Request $req){
      $req->validate([
          'userName'=>'required|min:4|max:60',
          'userPhone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);

      $data=[
          'title'=>'Заявка с сайта CUP',
          'user'=> 'Имя: '.$req->userName,
          'phone'=> 'Телефон: '.$req->userPhone,
      ];

      Mail::to("AZuribeda@yandex.ru")
        //->bcc("AZuribeda@yandex.ru")
        //("zaevka@umax.agency")
        ->send(new FbMail($data));
      return redirect()->back()->with('success','Заявка отправлена!');
    }

    public function sendModalZakMer(Request $req){
      $req->validate([
          'usermod'=>'required|min:4|max:60',
          'phonemod'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);

      $param4='';
      if($req->hiddenparmod!=null&&$req->hiddenparmod!=''&&$req->hiddenparmod!='null'){
        $param4='Название мероприятия: '.$req->hiddenparmod;
      }

      $data=[
          'title'=>'Заказ мероприятия',
          'user'=> 'Имя: '.$req->usermod,
          'phone'=> 'Телефон: '.$req->phonemod,
          'param1'=>'Комментарий: '.$req->messmod,
          'param2'=>'Дата проведения: '.$req->dateprovmod,
          'param3'=>'Количество гостей: '.$req->countguestmod,
          'param4'=>$param4,
      ];

      Mail::to("AZuribeda@yandex.ru")
        //->bcc("AZuribeda@yandex.ru")
        //("zaevka@umax.agency")
        ->send(new ModalMail($data));
      return redirect()->back()->with('success','Предыдущая заявка успешна отправлена!');
    }


    public function sendModalRevVak(Request $req){
      $req->validate([
          'usermrv'=>'required|min:4|max:60',
          'phonemrv'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);

      $files = $req->file('files');

      $user='';
      $phone='';
      $email='';
      $mess='';
      if($req->usermrv!=''){$user='Имя: '.$req->usermrv;};
      if($req->phonemrv!=''){$phone='Телефон: '.$req->phonemrv;};
      if($req->emailmrv!=''){$email='Почта: '.$req->emailmrv;};
      if($req->messmrv!=''){$mess='Сообщение: '.$req->messmrv;};

      $data=[
          'title'=>'Отзыв с сайта',
          'user'=> $user,
          'phone'=> $phone,
          'email'=> $email,
          'mess'=> $mess,
      ];

      Mail::send('emails.modalrevak', $data, function($message)use($data, $files) {
        $message->to('AZuribeda@yandex.ru')
                ->subject($data["title"]);
        if($files!=null){
          foreach($files as $file) {
              $message->attach($file->getRealPath(), array(
                  'as' => $file->getClientOriginalName(),
                  'mime' => $file->getMimeType())
              );
          }
        }
      });

      return redirect()->back()->with('success','Предыдущая заявка успешна отправлена!');
    }



    public function sendModalRevVak2(Request $req){
      $req->validate([
          'usermrv'=>'required|min:4|max:60',
          'phonemrv'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);

      $files = $req->file('files');

      $user='';
      $phone='';
      $email='';
      $mess='';
      if($req->usermrv!=''){$user='Имя: '.$req->usermrv;};
      if($req->phonemrv!=''){$phone='Телефон: '.$req->phonemrv;};
      if($req->emailmrv!=''){$email='Почта: '.$req->emailmrv;};
      if($req->messmrv!=''){$mess='Сообщение: '.$req->messmrv;};

      $data=[
          'title'=>'Отклик на вакансию "'.$req->messmrv2.'" с сайта',
          'user'=> $user,
          'phone'=> $phone,
          'email'=> $email,
          'mess'=> $mess,
      ];

      Mail::send('emails.modalrevak', $data, function($message)use($data, $files) {
        $message->to('AZuribeda@yandex.ru')
                ->subject($data["title"]);
        if($files!=null){
          foreach($files as $file) {
              $message->attach($file->getRealPath(), array(
                  'as' => $file->getClientOriginalName(),
                  'mime' => $file->getMimeType())
              );
          }
        }
      });

      return redirect()->back()->with('success','Предыдущая заявка успешна отправлена!');
    }


    public function sendModalFaq(Request $req){
      $req->validate([
          'userfaq'=>'required|min:4|max:60',
      ]);

      $user='';
      $email='';
      $mess='';
      if($req->userfaq!=''){$user='Имя: '.$req->userfaq;};
      if($req->emailfaq!=''){$email='Почта: '.$req->emailfaq;};
      if($req->mesfaq!=''){$mess='Вопрос: '.$req->mesfaq;};

      $data=[
          'title'=>'Вопрос с сайта',
          'user'=> $user,
          'email'=> $email,
          'mess'=> $mess,
      ];

      Mail::send('emails.faqmail', $data, function($message)use($data) {
        $message->to('AZuribeda@yandex.ru')
                ->subject($data["title"]);
      });

      return redirect()->back()->with('success','Предыдущая заявка успешна отправлена!');
    }

    
    public function sendModalZakZvonka(Request $req){
      $req->validate([
          'userzvon'=>'required|min:4|max:60',
          'phonezvon'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
      ]);

      $user='';
      $phone='';
      $mess='';
      if($req->userzvon!=''){$user='Имя: '.$req->userzvon;};
      if($req->phonezvon!=''){$phone='Телефон: '.$req->phonezvon;};
      if($req->messzvon!=''){$mess='Комментарий: '.$req->messzvon;};

      $data=[
          'title'=>'Заказ звонка с сайта',
          'user'=> $user,
          'phone'=> $phone,
          'mess'=> $mess,
      ];

      Mail::send('emails.zvon', $data, function($message)use($data) {
        $message->to('AZuribeda@yandex.ru')
                ->subject($data["title"]);
      });

      return redirect()->back()->with('success','Предыдущая заявка успешна отправлена!');
    }


    
}
