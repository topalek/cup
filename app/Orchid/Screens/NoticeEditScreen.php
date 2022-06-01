<?php

namespace App\Orchid\Screens;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NoticeEditScreen extends Screen
{
    public $name = 'Создать уведомление';
    public $description = 'CUP - уведомления';
    public $exists = false;
    public $notice;

    public function query(Notice $notice): array
    {
        $this->exists = $notice->exists;
        $this->notice = $notice;
        if ($this->exists) {
            $this->name = 'Редактировать уведомление: ' . $notice->title;
        }
        $notice->load(['users', 'attachment']);
        return [
            'notice' => $notice
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Создать')
                ->icon('save-alt')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),
            Button::make('Сохранить')
                ->icon('save')
                ->method('createOrUpdate')
                ->canSee($this->exists),
            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
            Link::make('Назад')
                ->icon('arrow-left')
                ->route('platform.notice.list'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Group::make([
                    Input::make('notice.title')
                        ->title('Заголовок')
                        ->required(),
                    Select::make('notice.users')
                        ->fromModel(User::class, 'name')
                        ->multiple()
                        ->title('Клиенты')
                        ->required(),

                ]),
                Group::make([
                    Quill::make('notice.content')
                        ->title('Контент')
                        ->required(),
                    Picture::make('notice.img')
                        ->title('Изображение уведомления'),
                ])
            ])->title('Основная информация'),
        ];
    }

    public function createOrUpdate(Notice $notice, Request $request)
    {
        $data = $request->get('notice');
        $img = Arr::get($data, 'img');
        if ($img) {
            $img = str_replace(url('/'), '', $img);
            $img = str_replace('//', '/', $img);
        }
        $data['img'] = $img;
        $notice->fill($data)->save();
        $notice->users()->sync($request->input('notice.users', []));

        Alert::info('You have successfully created.');
        return redirect()->route('platform.notice.list');
    }

    public function remove(Notice $notice)
    {
        $notice->delete();
        Alert::info('You have successfully deleted.');
        return redirect()->route('platform.notice.list');
    }

}
