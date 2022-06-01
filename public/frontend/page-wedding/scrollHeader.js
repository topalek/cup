// // смена класса при скроллинге header меню

import { classHead } from "../assets/js/scrollHeader.js";

window.addEventListener("scroll", () =>
  classHead(".header", ".footer", "header-white", "header-dark")
);
