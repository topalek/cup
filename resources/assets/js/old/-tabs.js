const changeTab = function (e, selector) {
  const allTab = Array.from(document.querySelectorAll(selector));
  const tab = e.target;
  if (tab.closest(selector)) {
    allTab.map((item) => item.classList.remove("active"));
    tab.closest(selector).classList.add("active");
  }
};
export default changeTab;
