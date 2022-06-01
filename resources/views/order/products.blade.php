@if($order->exists)
    <fieldset class="mb-3" data-async="">
        <div class="col p-0 px-3 row justify-content-between">
            <legend class="text-black col-9">
                Товары
            </legend>
            <div class="col-3">
                @if($order->exists)
                    {!! Orchid\Screen\Actions\ModalToggle::make('Добавить товар')
                        ->modal('products')
                        ->modalTitle('Добавить товары')
                        ->class('btn btn-primary')->action('addProduct')
                        ->method('post',['order'=>$order->id])->icon('plus')!!}
                @endif

            </div>
        </div>

        <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-column">
            <div class="row form-group align-items-baseline">
                <div class="col-12 col-md form-group mb-md-0  pe-md-0 ">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Кол-во</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <?php /**@var \App\Models\Product $product */ ?>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->pivot->count}}</td>
                                <td>{{$product->price_per_unit}}</td>
                                <td>
                                    {!!
                                Orchid\Screen\Actions\Button::make('Delete')
                                ->icon('close')
                                ->class('btn btn-danger')
                                ->method('deleteProduct',['order'=>$order->id,'product'=>$product->id])
                                 !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset>

@endif

