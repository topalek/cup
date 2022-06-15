<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SEO;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return response()->json(['status' => 'success', 'users' => $users->toArray()], 200);
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);

        return response()->json(['status' => 'success', 'user' => $user->toArray()], 200);
    }

    public function RegUsers(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.kabinet'));
        }
        $valid = $request->validate([
            'name'     => 'required|string|max:64',
            'fio'      => 'required|string|max:64',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:16|confirmed',
            'phone'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        if (User::where('email', $valid['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'success' => 'Ошибка'
            ]);
        };
        $user = User::create($valid);
        if ($user) {
            Auth::login($user);
            return redirect(route('user.kabinet'));
        };
        return redirect(route('user.login'))->withErrors([
            'success' => 'Ошибка'
        ]);
    }

    public function LoginUsers(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.kabinet'));
        }
        $filds = $request->only(['email', 'password']);
        if (Auth::attempt($filds)) {
            return redirect()->intended(route('user.kabinet'));
        };
        return redirect(route('user.login'))->withErrors([
            'success' => 'Ошибка'
        ]);
    }

    public function FormLoginUsers()
    {
        if (Auth::check()) {
            return redirect(route('user.kabinet'));
        };
        $data['basket'] = 0;
        if (isset($_COOKIE['cart_id'])) {
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'login')->first();
        return view('users.login', $data);
    }

    public function FormRegUsers()
    {
        if (Auth::check()) {
            return redirect(route('user.kabinet'));
        };
        $data['basket'] = 0;
        if (isset($_COOKIE['cart_id'])) {
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'registration')->first();
        return view('users.reg', $data);
    }

    public function EnterKabUsers()
    {
        if (!Auth::check()){
            return redirect(route('user.login'));
        }
        $data['basket'] = 0;
        if (isset($_COOKIE['cart_id'])) {
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'kabinet')->first();
        return view('users.kabinet', $data);
    }

    public function FormRestUsers()
    {
        $data['basket'] = 0;
        if (isset($_COOKIE['cart_id'])) {
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'restore')->first();
        return view('users.restore', $data);
    }

    public function FormGoRestUsers(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
        //return redirect(route('user.restore'));
    }

    public function FormGoRestTokenUsers($token)
    {
        $data['basket'] = 0;
        if (isset($_COOKIE['cart_id'])) {
            $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'restore')->first();
        return view('users.restorepas', ['token' => $token], $data);
    }

    /* сброс пароля */
    public function UpdatePasUsers(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password'       => $request->password,
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        );


        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
        //return redirect(route('user.restore'));
    }

    /* ЛИЧНЫЙ КАБИНЕТ - НАСТРОЙКА */
    public function KabinetSet()
    {
        if (Auth::check()) {
            $data['basket'] = 0;
            if (isset($_COOKIE['cart_id'])) {
                $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            }
            $data['cont'] = SEO::where('page', 'contacts')->first();
            $data['page'] = SEO::where('page', 'settings')->first();

            return view('users.detail.settings', $data);
        };

        return redirect(route('user.login'));
    }

    /* ЛИЧНЫЙ КАБИНЕТ - ИСТОРИЯ ЗАКАЗОВ */
    public function KabinetHistOrd()
    {
        if (Auth::check()) {
            $data['basket'] = 0;
            if (isset($_COOKIE['cart_id'])) {
                $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            }
            $data['cont'] = SEO::where('page', 'contacts')->first();
            $data['page'] = SEO::where('page', 'history-order')->first();
            $data['orders'] = Order::whereUserId(Auth::id())->orderBy(
                'created_at',
                'desc'
            )->paginate(10);
            return view('users.detail.history', $data);
        };

        return redirect(route('user.login'));
    }

    public function order(Order $order)
    {
        if (Auth::check()) {
            $data['basket'] = 0;
            if (isset($_COOKIE['cart_id'])) {
                $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            }
            $data['cont'] = SEO::where('page', 'contacts')->first();
            $data['page'] = SEO::where('page', 'notifications')->first();
            $data['order'] = $order;

            return view('cabinet.order', $data);
        };

        return redirect(route('user.login'));
    }

    public function orderDownload(Order $order)
    {
        if (Auth::check()) {
            $pdf = PDF::loadView('cabinet.pdf', compact('order'));
//            $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            return $pdf->download('order.pdf');
        };

        return redirect(route('user.login'));
    }

    /* ЛИЧНЫЙ КАБИНЕТ - УВЕДОМЛЕНИЯ */
    public function KabinetNot()
    {
        if (Auth::check()) {
            $data['basket'] = 0;
            if (isset($_COOKIE['cart_id'])) {
                $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            }
            $data['cont'] = SEO::where('page', 'contacts')->first();
            $data['page'] = SEO::where('page', 'notifications')->first();
            $data['notices'] = Auth::user()->notices()->orderBy('created_at', 'desc')->paginate(10);

            return view('users.detail.notifications', $data);
        };

        return redirect(route('user.login'));
    }

    /* ЛИЧНЫЙ КАБИНЕТ - ДАННЫЕ ПОЛЬЗОВАТЕЛЯ */
    public function KabinePersArea()
    {
        if (Auth::check()) {
            $data['basket'] = 0;
            if (isset($_COOKIE['cart_id'])) {
                $data['basket'] = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            }
            $data['cont'] = SEO::where('page', 'contacts')->first();
            $data['page'] = SEO::where('page', 'personal-area')->first();
            $data['user'] = Auth::user();

            return view('users.detail.personal', $data);
        };

        return redirect(route('user.login'));
    }

    /* ЛИЧНЫЙ КАБИНЕТ - ДАННЫЕ ПОЛЬЗОВАТЕЛЯ - СОХРАНЕНИЕ*/
    public function KabinePersSaveArea(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'name'  => 'required|min:3|string|max:64',
                'email' => 'required|string|email|max:255',
                //'userPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ]);
            $datauser = User::find(Auth::id());
            $datauser->name = $request->name;
            $datauser->email = $request->email;
            $datauser->phone = $request->phone;
            $datauser->fio = $request->fio;
            $datauser->city = $request->city;
            $datauser->street = $request->street;
            $datauser->dom = $request->dom;
            $datauser->com = $request->com;

            $datauser->save();

            return redirect()->back()->with('success', 'изменения сохранены.');
        };

        return redirect(route('user.login'));
    }


    /* ЛИЧНЫЙ КАБИНЕТ - ДАННЫЕ ПОЛЬЗОВАТЕЛЯ - СОХРАНЕНИЕ ПАРОЛЯ*/
    public function KabineSavePass(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'oldpassword' => 'required|min:6',
                'password'    => 'required|min:6|confirmed',
            ]);
            $datauser = User::find(Auth::id());
            if (password_verify($request->oldpassword, $datauser->password)) {
                $datauser->password = $request->password;

                $datauser->save();

                return redirect()->back()->with('success', 'изменения сохранены.');
            }

            return redirect()->back()->with('success', 'ошибка в данных.');
        };

        return redirect(route('user.login'));
    }

}
