(function () {
  "use strict";

  /**
   * ------------------------------------------------------------------------
   *   Only for demo purpose
   * ------------------------------------------------------------------------
   */

  // Demo Theme skin (Customizer)
  // load dark mode from local Storage
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.querySelector("html").classList.add('dark')
    document.querySelector("#lightdark").checked = true;
  }

  const myLightdark = function () {
    const lightdark = document.querySelector("#lightdark");
    if ( lightdark != null) {
      lightdark.addEventListener("click", function(){
        const result = document.querySelector("html").classList.toggle("dark");
        if (result) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "");
        }
      });
    }
  }

  // Sidebar Light and Dark (Customizer)
  const mySidelight = function () {
    const sidecolor = document.querySelector("#sidecolor");
    if ( sidecolor != null) {
      sidecolor.addEventListener("click", function(){
        document.querySelector("#sidebar-menu").classList.toggle("sidebar-dark");
      });
    }
  }

  // Custom primary color (Customizer)
  const myColor = function () {
    const mycolor = document.querySelector("#customcolor");
    if ( mycolor != null) {
      const myindigo = document.querySelector("#custindigo");
      const myred = document.querySelector("#custred");
      const mygreen = document.querySelector("#custgreen");
      const mypurple = document.querySelector("#custpurple");
      const myyellow = document.querySelector("#custyellow");
      const myblue = document.querySelector("#custblue");
      const mypink = document.querySelector("#custpink");
      const bod = document.querySelector('body');

      myindigo.addEventListener("click", function(){
        bod.classList.remove('theme-red','theme-yellow','theme-purple','theme-green','theme-blue','theme-pink');
      });
      myred.addEventListener("click", function(){
        bod.classList.add('theme-red');
        bod.classList.remove('theme-blue','theme-yellow','theme-purple','theme-green','theme-indigo','theme-pink');
      });
      mygreen.addEventListener("click", function(){
        bod.classList.add('theme-green');
        bod.classList.remove('theme-red','theme-yellow','theme-purple','theme-blue','theme-indigo','theme-pink');
      });
      mypurple.addEventListener("click", function(){
        bod.classList.add('theme-purple');
        bod.classList.remove('theme-red','theme-yellow','theme-blue','theme-green','theme-indigo','theme-pink');
      });
      myyellow.addEventListener("click", function(){
        bod.classList.add('theme-yellow');
        bod.classList.remove('theme-red','theme-blue','theme-purple','theme-green','theme-indigo','theme-pink');
      });
      myblue.addEventListener("click", function(){
        bod.classList.add('theme-blue');
        bod.classList.remove('theme-red','theme-yellow','theme-purple','theme-green','theme-indigo','theme-pink');
      });
      mypink.addEventListener("click", function(){
        bod.classList.add('theme-pink');
        bod.classList.remove('theme-red','theme-yellow','theme-purple','theme-green','theme-indigo','theme-blue');
      });
    }
  }

  // Switch RTL mode (Customizer)
  const myRtl = function () {
    const rtlmode = document.querySelector("#rtlmode");
    if ( rtlmode != null) {
      rtlmode.addEventListener("click", function(){
        if (document.querySelector("#rtlmode").checked == true) {
          document.documentElement.setAttribute('dir', 'rtl');
        } else {
          document.documentElement.setAttribute('dir', 'ltr');
        }
      });
    }
  }

  /**
   * ------------------------------------------------------------------------
   * Launch Functions
   * ------------------------------------------------------------------------
   */
  myLightdark();
  mySidelight();
  myRtl();
  myColor();

})();
