<?php

namespace App\Http\Controllers;

use App\Models\Cataloggr;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\Review;
use App\Models\SEO;
use App\Models\Vacancy;
use App\Models\Category;
use App\Models\Categorygr;
use App\Models\CategoryPortfolio;
use App\Models\CategoryStyledet;
use App\Models\CategoryStylevz;
use App\Models\Catformat;
use App\Models\Format;
use App\Models\Garantkachestva;
use App\Models\Ourp;
use App\Models\Portfolio;
use App\Models\Povodi;
use App\Models\Productgr;
use App\Models\Quiz;
use App\Models\Slidergl;
use App\Models\Youtube;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Http\Request;


/**
 * Контроллер для вывода страниц
 * Методы возвращают представление, настройки и данные
 */



class FrontendController extends Controller
{
    public function renderMain()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'main')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
          $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['portfolio'] = CategoryPortfolio::withCount('portfolioel')->get();
        $data['portfolios'] = Portfolio::where(['active'=>true])->orderBy('dataprov', 'desc')->get();
        $data['prodgotresh'] = Productgr::where(['active'=>true])->orderBy('created_at', 'desc')->get();
        $data['sliders'] = Slidergl::where(['active'=>true])->orderBy('datepub', 'desc')->get();
        $data['linkvideos'] = Youtube::where(['active'=>true])->orderBy('created_at', 'desc')->get();

        return view('main', $data);
    }


    public function renderOrf()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'oformlenie')->first();

        $data['portfolios'] = Portfolio::where(['active'=>true])->orderBy('dataprov', 'desc')->get();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
          $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        
        $data['oformlenievz'] = CategoryStylevz::where(['active'=>true])->orderBy('created_at', 'asc')->get();
        $data['oformleniedet'] = CategoryStyledet::where(['active'=>true])->orderBy('created_at', 'asc')->get();

        return view('oformlenie', $data);
    }

    public function renderMenuUslugi()
    {
        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
          $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'uslugi')->first();
       
        $data['portfolios'] = Portfolio::where(['active'=>true])->orderBy('dataprov', 'desc')->get();
        
        $data['povodi'] = Povodi::where(['active'=>true])->orderBy('created_at', 'desc')->get();

        $data['catformat'] = Format::where(['active'=>true])->orderBy('created_at', 'desc')->get();

        return view('service', $data);
    }
   
    

    public function renderOrfEl($elemof){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $data['info'] = CategoryStylevz::where('url', $elemof)->first();
      $idcat=$data['info']['id'];

      $data['basket'] = 0;
      if(isset($_COOKIE['cart_id'])){
          $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
      }

      $data['level1name']='Оформление';
      $data['level1url']='oformlenie';
      $data['level2name']=$data['info']->name;
      $data['level2url']=null;

      $data['level3name']=null;

      $data['prodgotresh'] = Productgr::where(['active'=>true])->orderBy('created_at', 'desc')->get();

      $data['title'] = $data['info']->name;
      $data['portfolios'] = Portfolio::where(['active'=>true])->orderBy('dataprov', 'desc')->get();
      return view('oformlenie.detail', $data);
    }

    public function renderOrfElDet($elemofdet){
      $data['cont'] = SEO::where('page', 'contacts')->first();
      $data['info'] = CategoryStyledet::where('url', $elemofdet)->first();
      $idcat=$data['info']['id'];

      $data['basket'] = 0;
      if(isset($_COOKIE['cart_id'])){
          $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
      }

      $data['level1name']='Оформление';
      $data['level1url']='oformlenie';
      $data['level2name']=$data['info']->name;
      $data['level2url']=null;
      $data['level3name']=null;

      $data['prodgotresh'] = Productgr::where(['active'=>true])->orderBy('created_at', 'desc')->get();
      
      $data['title'] = $data['info']->name;
      $data['portfolios'] = Portfolio::where(['active'=>true])->orderBy('dataprov', 'desc')->get();
      return view('oformlenie.detail', $data);
    }




    public function renderContacts(){
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'contacts')->first();
        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        return view('contacts', $data);
    }



    public function renderAboutCompany()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'company')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        
        $data['garkach'] = Garantkachestva::where('active', true)->get();
        $data['ourp'] = Ourp::where('active', true)->get();

        return view('company', $data);
    }
    public function renderDelivery()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'dostavka')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        return view('dostavka', $data);
    }
    public function renderFAQ()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'faq')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        // GET FAQ's questions
        $questions = FAQ::where('enabled', true)->get()->toArray();
        $data['questions'] = $questions;
        return view('faq', $data);
    }
    public function renderReviews()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'reviews')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['reviews'] = Review::where('active', true)->orderBy('created_at', 'DESC')->paginate(9);
        return view('reviews', $data);
    }
    public function renderPolitics()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'policy')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        return view('policy', $data);
    }
    public function renderReviewsDetail($url)
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = Review::where('url', $url)->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['level1name']='Отзывы';
        $data['level1url']='otzyvy';
        $data['level2name']=$data['page']['name'];
        $data['level2url']=null;

        $data['level3name']=null;

        $human_date = $data['page']->human_date;
        // TODO: Add Media
        $data['human_date'] = $human_date;
        return view('reviews.detail', $data);
    }
    public function renderVacancy()
    {
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'vakansii')->first();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['vakancy'] = Vacancy::where('active', true)->get();
        $data['title'] = 'Вакансии';
        $data['h1'] = 'Вакансии';
        return view('vacancies', $data);
    }
    public function renderVacancyDetail($url)
    {
        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = Vacancy::where('url', $url)->first();
        $data['level1name']='Вакансии';
        $data['level1url']='vakansii';
        $data['level2name']=$data['page']['title'];
        $data['level2url']=null;
        $data['level3name']=null;

        return view('vacancies.detail', $data);
    }
    public function renderMenu(Request $request){
        $data['cont'] = SEO::where('page', 'contacts')->first();

        $menug = Category::withCount('productel')->get();
        $menugrg = Cataloggr::withCount('productgrel')->get();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
       
        if (isset($menugrg)){
          $data['menugr'] = $menugrg;
        }else{
          $data['menugr'] = null;
        }

        if (isset($menug)){
          $data['menu'] = $menug;
        }else{
          $data['menu'] = null;
        }

        // Выборка просмотра
        $massvr=session('prosmotr');
        $data['prosmotrprod']=null;
        $data['prosmotrgotresh']=null;
        $k=0;
        if ($massvr!=null){
          $cnt = count($massvr);
          for ($i=count($massvr)-1; $i>=count($massvr)-$cnt; $i--) {
              //$values = $massvr[$i];
              $perstr = $massvr[$i];
              $final_str = preg_replace('~^(.*?)\s~', '', $perstr);
              $arr = explode(' ',trim($perstr));
              $arrstr='';
              for ($n = 1; $n < count($arr); $n++) {
                $arrstr = $arrstr.$arr[$n]." ";
              }
              if($arr[0]=='p'){
                $data['prosmotrprod'][$k]=Product::where('id', $arrstr)->first();
              }else{
                $data['prosmotrgotresh'][$k]=Productgr::where('id', $arrstr)->first();
              }
              $k++;
              if($k>=10){
                break;
              }
          }
        }

        $data['title'] = 'Меню';
        $data['h1'] = 'Меню';
        $data['products'] = Product::paginate(6);
        $data['productsgr'] = Productgr::paginate(3);
        $data['productspop'] = Product::where(['popular'=>true, 'active'=>true])->inRandomOrder()->take(7)->get();

        return view('menu', $data);
    }
    public function renderMenuCategory(Request $request, $slug){
        $data['cont'] = SEO::where('page', 'contacts')->first();

        $menug = Category::withCount('productel')->get();
        $menugrg = Cataloggr::withCount('productgrel')->get();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        if (isset($menugrg)){
          $data['menugr'] = $menugrg;
        }else{
          $data['menugr'] = null;
        }

        if (isset($menug)){
          $data['menu'] = $menug;
        }else{
          $data['menu'] = null;
        }

        $category = Category::where(['url'=>$slug, 'active'=>true])->first();
        $category2 = Cataloggr::where(['url'=>$slug, 'active'=>true])->first();

        if (isset($category->name)){
          $data['title'] = $category->name;
          $data['h1'] = $category->name;
        }else{
          $data['title'] = $category2->name;
          $data['h1'] = $category2->name;
        }
        if (isset($category)){
          $data['products'] = $category->productel()->paginate(6);
        }else{
          $data['products'] = null;
        }
        if (isset($category2)){
          $data['productsgr'] = $category2->productgrel()->paginate(3);
        }else{
          $data['productsgr'] = null;
        }
        $data['productspop'] = Product::where(['popular'=>true, 'active'=>true])->inRandomOrder()->take(7)->get();

        // Выборка просмотра
        $massvr=session('prosmotr');
        $data['prosmotrprod']=null;
        $data['prosmotrgotresh']=null;
        $k=0;
        if ($massvr!=null){
          $cnt = count($massvr);
          for ($i=count($massvr)-1; $i>=count($massvr)-$cnt; $i--) {
              //$values = $massvr[$i];
              $perstr = $massvr[$i];
              $final_str = preg_replace('~^(.*?)\s~', '', $perstr);
              $arr = explode(' ',trim($perstr));
              $arrstr='';
              for ($n = 1; $n < count($arr); $n++) {
                $arrstr = $arrstr.$arr[$n]." ";
              }
              if($arr[0]=='p'){
                $data['prosmotrprod'][$k]=Product::where('id', $arrstr)->first();
              }else{
                $data['prosmotrgotresh'][$k]=Productgr::where('id', $arrstr)->first();
              }
              $k++;
              if($k>=10){
                break;
              }
          }
        }


        return view('menu', $data);
    }
    public function renderMenuProduct(Request $request, $category, $product){
        $data['cont'] = SEO::where('page', 'contacts')->first();

        $category1 = Category::where(['url'=>$category, 'active'=>true])->first();
        $category2 = Cataloggr::where(['url'=>$category, 'active'=>true])->first();
        $data['prodpoprob']=Product::where(['active' => true])->inRandomOrder()->take(20)->get();

        $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        $data['level1name']='Меню';
        $data['level1url']='menu';
        $data['level2name']=null;
        $data['level2url']=null;
        $data['level3name']=null;

        $fl=false;

        if (isset($category1->name)){
          $product2 = Product::where(['url'=> $product, 'active' => true])->first();
          $data['title'] = $product2->name;
          $data['product'] = $product2;
          $data['h1'] = $product2->name;
          
          $data['level2name']=$category1->name;
          $data['level2url']='menu/'.$category1->url;
          $data['level3name']=$product2->name;

          if(session('prosmotr')==null){
            $request->session()->push('prosmotr', 'p '.$product2->id);
          }else{
            if (!in_array('p '.$product2->id, session('prosmotr'))){
                $request->session()->push('prosmotr', 'p '.$product2->id);
            }
          }
          //$request->session()->flush(); //удалить все элементы сесии
          //$data['ses']=session('prosmotr');

          // Выборка просмотра
          $massvr=session('prosmotr');
          $data['prosmotrprod']=null;
          $data['prosmotrgotresh']=null;
          $k=0;
          if ($massvr!=null){
            $cnt = count($massvr);
            for ($i=count($massvr)-1; $i>=count($massvr)-$cnt; $i--) {
                //$values = $massvr[$i];
                $perstr = $massvr[$i];
                $final_str = preg_replace('~^(.*?)\s~', '', $perstr);
                $arr = explode(' ',trim($perstr));
                $arrstr='';
                for ($n = 1; $n < count($arr); $n++) {
                  $arrstr = $arrstr.$arr[$n]." ";
                }
                if($arr[0]=='p'){
                  $data['prosmotrprod'][$k]=Product::where('id', $arrstr)->first();
                }else{
                  $data['prosmotrgotresh'][$k]=Productgr::where('id', $arrstr)->first();
                }
                $k++;
                if($k>=10){
                  break;
                }
            }
          }

          
          return view('menu.detail', $data);

        }else{
          $product2 = Productgr::where(['url'=> $product, 'active' => true])->first();
          $data['title'] = $product2->name;
          
          $data['product'] = $product2;
          $data['h1'] = $product2->name;

          $data['level2name']=$category2->name;
          $data['level2url']='menu/'.$category2->url;

          $data['level3name']=$product2->name;
          
          $data['productgrsp1'] = $product2->products()->get();
          $data['productgrsp2'] = $product2->products2()->get();
          $data['productgrsp3'] = $product2->products3()->get();
          $data['productgrsp4'] = $product2->products4()->get();
          $data['productgrsp5'] = $product2->products5()->get();

          if(session('prosmotr')==null){
            $request->session()->push('prosmotr', 'g '.$product2->id);
          }else{
            if (!in_array('g '.$product2->id, session('prosmotr'))){
                $request->session()->push('prosmotr', 'g '.$product2->id);
            }
          }

          // Выборка просмотра
          $massvr=session('prosmotr');
          $data['prosmotrprod']=null;
          $data['prosmotrgotresh']=null;
          $k=0;
          if ($massvr!=null){
            $cnt = count($massvr);
            for ($i=count($massvr)-1; $i>=count($massvr)-$cnt; $i--) {
                //$values = $massvr[$i];
                $perstr = $massvr[$i];
                $final_str = preg_replace('~^(.*?)\s~', '', $perstr);
                $arr = explode(' ',trim($perstr));
                $arrstr='';
                for ($n = 1; $n < count($arr); $n++) {
                  $arrstr = $arrstr.$arr[$n]." ";
                }
                if($arr[0]=='p'){
                  $data['prosmotrprod'][$k]=Product::where('id', $arrstr)->first();
                }else{
                  $data['prosmotrgotresh'][$k]=Productgr::where('id', $arrstr)->first();
                }
                $k++;
                if($k>=10){
                  break;
                }
            }
          }
          //$data['ses']=session('prosmotr');
          return view('menu.ready.detail', $data);
        }
    }
    public function renderMenuProductAPI($url){
        
        $product2 = Productgr::where(['url'=> $url, 'active' => true])->first();
        $data['title'] = $product2->name;
        
        $data['product'] = $product2;
        $data['h1'] = $product2->name;
        
        $k2=0;
        $massel=[];
        $fl=true;

        if($product2->sp1!=null){
          $massel[$k2]['id']=$k2;
          $massel[$k2]['tab']=$product2->sp1;
          if($k2==0){
            $massel[$k2]['isActiveTab']=true;
          }else{
            $massel[$k2]['isActiveTab']=false;
          };
          $k3=0;
          foreach($product2->products as $itemel){
            $massel[$k2]['info'][$k3]['id']=$itemel->id;
            $massel[$k2]['info'][$k3]['title']=$itemel->name;
            if($itemel->attachment()->first()!=null){
              $massel[$k2]['info'][$k3]['image']=$itemel->attachment()->first()->url();
            }else{
              $massel[$k2]['info'][$k3]['image']='';
            }
            
            $massel[$k2]['info'][$k3]['compound']=$itemel->composition;
            if($fl){
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
              $fl=false;
            }else{
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
            }
            $k3++;
          };
          $k2++;
        };
        if($product2->sp2!=null){
          $massel[$k2]['id']=$k2;
          $massel[$k2]['tab']=$product2->sp2;
          if($k2==0){
            $massel[$k2]['isActiveTab']=true;
          }else{
            $massel[$k2]['isActiveTab']=false;
          };
          $k3=0;
          foreach($product2->products2 as $itemel){
            $massel[$k2]['info'][$k3]['id']=$itemel->id;
            $massel[$k2]['info'][$k3]['title']=$itemel->name;
            if($itemel->attachment()->first()!=null){
              $massel[$k2]['info'][$k3]['image']=$itemel->attachment()->first()->url();
            }else{
              $massel[$k2]['info'][$k3]['image']='';
            }
            $massel[$k2]['info'][$k3]['compound']=$itemel->composition;
            if($fl){
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
              $fl=false;
            }else{
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
            }
            $k3++;
          };
          $k2++;
        };
        if($product2->sp3!=null){
          $massel[$k2]['id']=$k2;
          $massel[$k2]['tab']=$product2->sp3;
          if($k2==0){
            $massel[$k2]['isActiveTab']=true;
          }else{
            $massel[$k2]['isActiveTab']=false;
          };
          $k3=0;
          foreach($product2->products3 as $itemel){
            $massel[$k2]['info'][$k3]['id']=$itemel->id;
            $massel[$k2]['info'][$k3]['title']=$itemel->name;
            if($itemel->attachment()->first()!=null){
              $massel[$k2]['info'][$k3]['image']=$itemel->attachment()->first()->url();
            }else{
              $massel[$k2]['info'][$k3]['image']='';
            }
            $massel[$k2]['info'][$k3]['compound']=$itemel->composition;
            if($fl){
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
              $fl=false;
            }else{
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
            }
            $k3++;
          };
          $k2++;
        };
        if($product2->sp4!=null){
          $massel[$k2]['id']=$k2;
          $massel[$k2]['tab']=$product2->sp4;
          if($k2==0){
            $massel[$k2]['isActiveTab']=true;
          }else{
            $massel[$k2]['isActiveTab']=false;
          };
          $k3=0;
          foreach($product2->products4 as $itemel){
            $massel[$k2]['info'][$k3]['id']=$itemel->id;
            $massel[$k2]['info'][$k3]['title']=$itemel->name;
            if($itemel->attachment()->first()!=null){
              $massel[$k2]['info'][$k3]['image']=$itemel->attachment()->first()->url();
            }else{
              $massel[$k2]['info'][$k3]['image']='';
            }
            $massel[$k2]['info'][$k3]['compound']=$itemel->composition;
            if($fl){
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
              $fl=false;
            }else{
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
            }
            $k3++;
          };
          $k2++;
        };
        if($product2->sp5!=null){
          $massel[$k2]['id']=$k2;
          $massel[$k2]['tab']=$product2->sp5;
          if($k2==0){
            $massel[$k2]['isActiveTab']=true;
          }else{
            $massel[$k2]['isActiveTab']=false;
          };
          $k3=0;
          foreach($product2->products5 as $itemel){
            $massel[$k2]['info'][$k3]['id']=$itemel->id;
            $massel[$k2]['info'][$k3]['title']=$itemel->name;
            if($itemel->attachment()->first()!=null){
              $massel[$k2]['info'][$k3]['image']=$itemel->attachment()->first()->url();
            }else{
              $massel[$k2]['info'][$k3]['image']='';
            }
            $massel[$k2]['info'][$k3]['compound']=$itemel->composition;
            if($fl){
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
              $fl=false;
            }else{
              $massel[$k2]['info'][$k3]['isActiveProduct']=$fl;
            }
            $k3++;
          };
          $k2++;
        };

        $data['spprod']=$massel;

        return $data;
    }

    public function renderPortf(){
      $data['cont'] = SEO::where('page', 'contacts')->first();
      $data['page'] = SEO::where('page', 'portfolio')->first();

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      $data['portfolio'] = CategoryPortfolio::withCount('portfolioel')->get();
      $data['portfolios'] = Portfolio::where(['active'=>true])->paginate(6);
      return view('portfolio', $data);
    }

    public function renderPortfCategory($elem){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      $data['portfolio'] = CategoryPortfolio::withCount('portfolioel')->get();
      $category = CategoryPortfolio::where(['url'=>$elem, 'active'=>true])->first();
      
      $data['page']['h1']= $category->name;
      $data['page']['title'] = $category->name;
      $data['page']['description'] = $category->name;
      $data['page']['keywords'] = $category->name;

      $data['portfolios'] = $category->portfolioel()->where(['active'=>true])->paginate(6);
      return view('portfolio', $data);
    }

    public function renderPortfCategoryEl($catelem, $prof){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $catelem = CategoryPortfolio::where(['url'=>$catelem, 'active'=>true])->first();
      $prof = Portfolio::where(['url'=> $prof, 'active' => true])->first();
      $data['portfolio'] = $prof;

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      $data['level1name']='Портфолио';
      $data['level1url']='portfolio';

      $data['level2name']=$catelem->name;
      $data['level2url']='portfolio/'.$catelem->url;
      
      $data['level3name']=$prof->name;

      $data['page']['h1']= $prof->name;
      $data['page']['title'] = $prof->name;
      $data['page']['description'] = $prof->doptxt;
      $data['page']['keywords'] = '';


      $data['portfolios'] = Portfolio::take(7)->get();
      return view('portfolio.detail', $data);
    }

    public function renderFormatCategory($elem){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      $category = Catformat::where(['url'=>$elem, 'active'=>true])->first();

      $data['title'] = $category->title;
      $data['h1'] = $category->title;
      $data['desc'] = $category->desc;
      $data['formats'] = $category->formatel()->where(['active'=>true])->paginate();
      return view('wedding', $data);
    }
    public function renderFormatelem($elem){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      //$category = Catformat::where(['url'=>$category, 'active'=>true])->first();
      $elem = Format::where(['url'=> $elem, 'active' => true])->first();

      $data['level1name']='Услуги';
      $data['level1url']='uslugi';
      $data['level2name']=$elem->title;
      $data['level2url']=null;

      $data['level3name']=null;

      $data['format'] = $elem;
      
      $data['page']['h1']= $elem->title;
      $data['page']['title'] = $elem->title;
      $data['page']['description'] = $elem->shortdesc;
      $data['page']['keywords'] = '';

      return view('welcom', $data);
    }

    public function renderPovodEl($elem){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      $elem = Povodi::where(['url'=>$elem, 'active'=>true])->first();
      
      $data['level1name']='Услуги';
      $data['level1url']='uslugi';
      $data['level2name']=$elem->title;
      $data['level2url']=null;

      $data['level3name']=null;

      $data['format'] = $elem;

      $data['page']['h1']= $elem->title;
      $data['page']['title'] = $elem->title;
      $data['page']['description'] = $elem->shortdesc;
      $data['page']['keywords'] = '';

      return view('welcom', $data);
    }



    public function renderAPIQuiz(){
      $data['cont'] = SEO::where('page', 'contacts')->first();

      $data['basket'] = 0;
        if(isset($_COOKIE['cart_id'])){
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

      $el = Quiz::where(['active'=>true])->get();
      $k=0;
      foreach($el as $item){
          $data['quiz'][$k]['title']=$item->title;
          $data['quiz'][$k]['name']=$item->name;
          $data['quiz'][$k]['price']=$item->price;
          $k++;
      }
      return $data;
    }


    public function helperCategoryMenu(){
      return Category::withCount('products')->get()->toArray();
    }
    public function helperCategoryPortf(){
      return CategoryPortfolio::withCount('portfolio')->get()->toArray();
    }
    public function helperPortfImg(){
      return Portfolio::withCount('attachment')->get()->toArray();
    }
}
