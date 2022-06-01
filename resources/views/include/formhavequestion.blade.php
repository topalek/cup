<section class="feedback feedback-about">
    <div class="container">
        <div class="feedback__image">
            <img class="feedback__image-img" src="/assets/img/feedbackBg-2.png" alt="" />
        </div>
        <form action="{{route('send.form.2')}}" method="post" class="form-feedback">
            @csrf
            <div class="form-feedback__inner">
                <div class="feedback__request-title">
                    Остались вопросы?
                </div>
                @if (Session::has('error'))
                <div class="errorsgl"><br>
                    {{Session::get('error')}}
                </div>
                @endif
                @if (Session::has('success'))
                <div class="noerrors"><br>
                    {{Session::get('success')}}
                </div>
                @endif
                <div class="feedback__description">
                    Оставьте заявку и мы свяжемся с Вами
                </div>
                <div class="feedback__inputs">
                    <input class="feedback__input" required type="text" placeholder="Виктор" maxlength="12" name="userName"/>
                    @error('userName')
                        <div class="errors">{{$message}}</div>
                    @enderror
                    <input class="feedback__input" 
                        required 
                        name="userPhone"
                        pattern="\+7\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}" 
                        type="text"
                        placeholder="+7 (___) ___-__-__"
                        maxlength="11" />
                    @error('userPhone')
                        <div class="errors">{{$message}}</div>
                    @enderror
                </div>
                <button class="feedback__submit link--arrow-black" type="submit">
                    отправить
                </button>
            </div>
        </form>
    </div>
    <div class="feedback__decor"></div>
</section>
