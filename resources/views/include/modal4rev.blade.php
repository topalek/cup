<div class="modal-event">
  <form action="{{route('send.modal.2')}}" enctype="multipart/form-data" method="post" class="modal-event-wrap">
    @csrf
    <div class="btn-close">
      <svg
        width="28"
        height="28"
        viewBox="0 0 28 28"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M3.79957 0.67774L13.9996 10.8777L24.1996 0.708649C24.4004 0.504307 24.6414 0.34386 24.9075 0.237453C25.1735 0.131047 25.4587 0.0809965 25.745 0.0904668C26.3069 0.126829 26.8364 0.366458 27.2345 0.764608C27.6327 1.16276 27.8723 1.69221 27.9087 2.2541C27.9115 2.53037 27.8581 2.80434 27.7518 3.05937C27.6456 3.3144 27.4886 3.54519 27.2905 3.73774L17.0596 13.9996L27.2905 24.2614C27.6923 24.6508 27.9148 25.1886 27.9087 25.745C27.8723 26.3069 27.6327 26.8364 27.2345 27.2345C26.8364 27.6327 26.3069 27.8723 25.745 27.9086C25.4587 27.9181 25.1735 27.8681 24.9075 27.7617C24.6414 27.6553 24.4004 27.4948 24.1996 27.2905L13.9996 17.1214L3.83048 27.2905C3.62965 27.4948 3.38861 27.6553 3.12259 27.7617C2.85657 27.8681 2.57137 27.9181 2.28502 27.9086C1.71265 27.8789 1.1716 27.6381 0.766322 27.2328C0.361044 26.8275 0.12027 26.2865 0.0904764 25.7141C0.0876797 25.4378 0.141031 25.1639 0.247295 24.9088C0.353559 24.6538 0.51052 24.423 0.708658 24.2305L10.9396 13.9996L0.677749 3.73774C0.48519 3.54259 0.333941 3.31063 0.233038 3.05572C0.132136 2.80081 0.0836494 2.52817 0.0904764 2.2541C0.126839 1.69221 0.366467 1.16276 0.764617 0.764608C1.16277 0.366458 1.69222 0.126829 2.25411 0.0904668C2.53824 0.076972 2.82209 0.122153 3.08799 0.223192C3.35388 0.324231 3.59611 0.478963 3.79957 0.67774Z"
          fill="#C9C9C9"
        />
      </svg>
    </div>
    <div class="title">Оставить отзыв</div>
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
    <div class="inputs">
      <div class="leftBlock">
        <div class="input-group">
          <label>Ваше имя<span>*</span></label>
          <input type="text" required name="usermrv" placeholder="Ваше имя" />
        </div>
        <div class="input-group">
          <label>Телефон<span>*</span></label>
          <input
            type="text"
            id="modal_phone"
            placeholder="+7 (___) ___ __ __"
            required
            name="phonemrv"
          />
        </div>
      </div>
      <div class="middleBlock">
        <div class="field__wrapper">
          <input
            name="files[]"
            type="file"
            id="field__file-2"
            class="field field__file"
            multiple
          />

          <label class="field__file-wrapper" for="field__file-2">
            <div class="file-title">Прикрепить файл</div>
            <svg
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g clip-path="url(#icon-clip-1)">
                <path
                  d="M18.3049 2.09557C16.1129 -0.0491944 12.6086 -0.0487279 10.4172 2.09663L1.22603 11.2878C-0.435909 12.9889 -0.404148 15.7152 1.29698 17.3772C2.97011 19.0118 5.64223 19.0118 7.31537 17.3772L15.6381 9.05442C16.7201 7.97246 16.7201 6.2182 15.6381 5.13623C14.5561 4.05427 12.8019 4.05427 11.7199 5.13623L3.75902 13.0971C3.48135 13.3846 3.48932 13.8427 3.77683 14.1204C4.0573 14.3913 4.50191 14.3913 4.78238 14.1204L12.7432 6.15955C13.2711 5.65383 14.1091 5.67185 14.6147 6.19975C15.1051 6.71171 15.1051 7.51915 14.6147 8.0311L6.29205 16.3538C5.16772 17.4621 3.35774 17.4492 2.2494 16.3248C1.15225 15.2119 1.15225 13.4241 2.2494 12.3111L11.4405 3.11995C13.0777 1.48218 15.7325 1.48172 17.3703 3.11885C19.0081 4.75599 19.0085 7.41084 17.3714 9.04861L8.18022 18.2398C7.87664 18.4998 7.84128 18.9567 8.10126 19.2602C8.36125 19.5638 8.81812 19.5992 9.1217 19.3392C9.15003 19.3149 9.1764 19.2886 9.20066 19.2602L18.3918 10.0691C20.5696 7.84325 20.5308 4.27337 18.3049 2.09557Z"
                  fill="#CECECE"
                />
              </g>
              <defs>
                <clipPath id="icon-clip-1">
                  <rect width="20" height="20" fill="white" />
                </clipPath>
              </defs>
            </svg>

            <div class="field__file-fake"></div>
          </label>
        </div>

        <div class="input-group">
          <label>E-mail</label>
          <input name="emailmrv" type="text" />
        </div>
      </div>
      <div class="rightBlock">
        <div class="input-group">
          <label>Комментарий</label>
          <textarea name="messmrv"></textarea>
        </div>
      </div>
    </div>
    <div class="bottom">
      <button class="order-link">отправить</button>
      <div class="check-group">
        <input type="checkbox" required id="modal-event" />
        <label for="modal-event"
          >Я согласен на обработку
          <a href="{{'/politics'}}">персональных данных</a></label
        >
      </div>
    </div>
  </form>
</div>