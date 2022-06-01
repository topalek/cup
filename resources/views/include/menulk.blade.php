<div class="menu">
  <a href="{{route('user.personal')}}" class="menu__item {{ Request::is('kabinet/personal-area*') ? 'menu__item--active' : '' }}">
    <svg
      width="18"
      height="18"
      viewBox="0 0 18 18"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      >
      <path
        d="M9.0013 0.666672C7.90695 0.666672 6.82332 0.88222 5.81227 1.30101C4.80123 1.7198 3.88257 2.33363 3.10875 3.10745C1.54594 4.67025 0.667969 6.78987 0.667969 9.00001C0.667969 11.2101 1.54594 13.3298 3.10875 14.8926C3.88257 15.6664 4.80123 16.2802 5.81227 16.699C6.82332 17.1178 7.90695 17.3333 9.0013 17.3333C11.2114 17.3333 13.3311 16.4554 14.8939 14.8926C16.4567 13.3298 17.3346 11.2101 17.3346 9.00001C17.3346 7.90566 17.1191 6.82202 16.7003 5.81098C16.2815 4.79993 15.6677 3.88127 14.8939 3.10745C14.12 2.33363 13.2014 1.7198 12.1903 1.30101C11.1793 0.88222 10.0957 0.666672 9.0013 0.666672ZM4.89297 14.2333C5.2513 13.4833 7.43464 12.75 9.0013 12.75C10.568 12.75 12.7513 13.4833 13.1096 14.2333C11.9425 15.1634 10.4937 15.6688 9.0013 15.6667C7.4513 15.6667 6.0263 15.1333 4.89297 14.2333ZM14.3013 13.025C13.1096 11.575 10.218 11.0833 9.0013 11.0833C7.78464 11.0833 4.89297 11.575 3.7013 13.025C2.81479 11.8705 2.33436 10.4556 2.33464 9.00001C2.33464 5.32501 5.3263 2.33334 9.0013 2.33334C12.6763 2.33334 15.668 5.32501 15.668 9.00001C15.668 10.5167 15.1513 11.9167 14.3013 13.025ZM9.0013 4.00001C7.38464 4.00001 6.08464 5.30001 6.08464 6.91667C6.08464 8.53334 7.38464 9.83334 9.0013 9.83334C10.618 9.83334 11.918 8.53334 11.918 6.91667C11.918 5.30001 10.618 4.00001 9.0013 4.00001ZM9.0013 8.16667C8.66978 8.16667 8.35184 8.03498 8.11742 7.80056C7.883 7.56614 7.7513 7.24819 7.7513 6.91667C7.7513 6.58515 7.883 6.26721 8.11742 6.03279C8.35184 5.79837 8.66978 5.66667 9.0013 5.66667C9.33282 5.66667 9.65077 5.79837 9.88519 6.03279C10.1196 6.26721 10.2513 6.58515 10.2513 6.91667C10.2513 7.24819 10.1196 7.56614 9.88519 7.80056C9.65077 8.03498 9.33282 8.16667 9.0013 8.16667Z"
        fill="#5F5839"
      />
    </svg>
    Личные данные
  </a>
  <a href="{{route('user.history')}}" class="menu__item {{ Request::is('kabinet/history-order*') ? 'menu__item--active' : '' }}">
    <svg
      width="19"
      height="16"
      viewBox="0 0 19 16"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      >
      <path
        d="M10.832 0.5C8.84291 0.5 6.93525 1.29018 5.52873 2.6967C4.12221 4.10322 3.33203 6.01088 3.33203 8H0.832031L4.0737 11.2417L4.13203 11.3583L7.4987 8H4.9987C4.9987 4.775 7.60703 2.16667 10.832 2.16667C14.057 2.16667 16.6654 4.775 16.6654 8C16.6654 11.225 14.057 13.8333 10.832 13.8333C9.2237 13.8333 7.76536 13.175 6.71536 12.1167L5.53203 13.3C6.22654 13.9983 7.05244 14.5523 7.96208 14.9299C8.87173 15.3075 9.84713 15.5012 10.832 15.5C12.8212 15.5 14.7288 14.7098 16.1353 13.3033C17.5419 11.8968 18.332 9.98912 18.332 8C18.332 6.01088 17.5419 4.10322 16.1353 2.6967C14.7288 1.29018 12.8212 0.5 10.832 0.5ZM9.9987 4.66667V8.83333L13.5654 10.95L14.1654 9.94167L11.2487 8.20833V4.66667H9.9987Z"
        fill="#5F5839"
      />
    </svg>
    История заказов
  </a>
  <a href="{{route('user.settings')}}" class="menu__item {{ Request::is('kabinet/settings*') ? 'menu__item--active' : '' }}">
    <svg
      width="18"
      height="18"
      viewBox="0 0 18 18"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      >
      <path
        d="M11.5 4.83333C11.942 4.83333 12.366 5.00893 12.6785 5.32149C12.9911 5.63405 13.1667 6.05797 13.1667 6.5L11.5 4.83333ZM16.5 6.5C16.5002 7.28097 16.3175 8.05114 15.9665 8.74879C15.6155 9.44643 15.1059 10.0521 14.4786 10.5174C13.8514 10.9826 13.1238 11.2945 12.3543 11.4279C11.5848 11.5614 10.7948 11.5127 10.0475 11.2858L8.16667 13.1667H6.5V14.8333H4.83333V16.5H2.33333C2.11232 16.5 1.90036 16.4122 1.74408 16.2559C1.5878 16.0996 1.5 15.8877 1.5 15.6667V13.5117C1.50005 13.2907 1.58788 13.0787 1.74417 12.9225L6.71417 7.9525C6.50621 7.26501 6.4488 6.54079 6.54587 5.82912C6.64293 5.11746 6.89219 4.43506 7.27666 3.82837C7.66113 3.22168 8.1718 2.70495 8.77391 2.31335C9.37602 1.92174 10.0554 1.66446 10.7659 1.559C11.4764 1.45355 12.2012 1.5024 12.8911 1.70224C13.581 1.90207 14.2198 2.2482 14.7639 2.71705C15.308 3.18591 15.7447 3.76649 16.0443 4.41928C16.3439 5.07207 16.4993 5.78175 16.5 6.5V6.5Z"
        stroke="#5F5839"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    Настройки
  </a>
  <a href="{{route('user.notifications')}}" class="menu__item {{ Request::is('kabinet/notifications*') ? 'menu__item--active' : '' }}">
    <svg
        width="16"
        height="18"
        viewBox="0 0 16 18"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            d="M6.45512 1.70662C6.57964 1.39888 6.79321 1.13533 7.06848 0.949765C7.34374 0.764195 7.66815 0.665056 8.00012 0.665056C8.3321 0.665056 8.65651 0.764195 8.93177 0.949765C9.20704 1.13533 9.42061 1.39888 9.54513 1.70662C10.7774 2.04552 11.8644 2.77958 12.6391 3.79607C13.4138 4.81255 13.8334 6.05524 13.8335 7.33329V11.2475L15.3601 13.5375C15.4439 13.663 15.4919 13.8088 15.4993 13.9595C15.5066 14.1102 15.4729 14.2601 15.4017 14.3931C15.3305 14.5261 15.2246 14.6373 15.0951 14.7148C14.9657 14.7924 14.8177 14.8333 14.6668 14.8333H10.8876C10.7873 15.5275 10.4402 16.1624 9.90988 16.6216C9.37957 17.0807 8.70159 17.3335 8.00012 17.3335C7.29866 17.3335 6.62067 17.0807 6.09037 16.6216C5.56007 16.1624 5.21296 15.5275 5.11262 14.8333H1.33346C1.18259 14.8333 1.03454 14.7924 0.905117 14.7148C0.775691 14.6373 0.669738 14.5261 0.598563 14.3931C0.527388 14.2601 0.493662 14.1102 0.500982 13.9595C0.508301 13.8088 0.556392 13.663 0.640125 13.5375L2.16679 11.2475V7.33329C2.16679 4.64662 3.98346 2.38329 6.45512 1.70662ZM6.82179 14.8333C6.90786 15.0772 7.06745 15.2883 7.27856 15.4377C7.48968 15.5871 7.74193 15.6673 8.00054 15.6673C8.25916 15.6673 8.51141 15.5871 8.72252 15.4377C8.93364 15.2883 9.09323 15.0772 9.17929 14.8333H6.82096H6.82179ZM8.00012 3.16662C6.89506 3.16662 5.83525 3.60561 5.05385 4.38701C4.27244 5.16841 3.83346 6.22822 3.83346 7.33329V11.5C3.83349 11.6646 3.78478 11.8255 3.69346 11.9625L2.89096 13.1666H13.1085L12.306 11.9625C12.2149 11.8254 12.1665 11.6645 12.1668 11.5V7.33329C12.1668 6.22822 11.7278 5.16841 10.9464 4.38701C10.165 3.60561 9.10519 3.16662 8.00012 3.16662Z"
            fill="#5F5839"
        />
    </svg>
      Уведомления
      <div class="count">{{$notices_count ?? 0}}</div>
  </a>
    <a href="{{route('user.logout')}}" class="menu__item exit">
        <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
        d="M15.8333 2.5H4.16667C3.2475 2.5 2.5 3.2475 2.5 4.16667V7.5H4.16667V4.16667H15.8333V15.8333H4.16667V12.5H2.5V15.8333C2.5 16.7525 3.2475 17.5 4.16667 17.5H15.8333C16.7525 17.5 17.5 16.7525 17.5 15.8333V4.16667C17.5 3.2475 16.7517 2.5 15.8333 2.5Z"
        fill="#C8A98D"
      />
      <path
        d="M9.16667 13.3333L13.3333 10L9.16667 6.66666V9.1675H2.5V10.8342H9.16667V13.3333Z"
        fill="#C8A98D"
      />
    </svg>
    Выйти
  </a>
</div>
