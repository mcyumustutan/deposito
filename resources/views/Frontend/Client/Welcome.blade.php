<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Deposit Payment</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />

  <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />

  <style>
    @import url("https://rsms.me/inter/inter.css");

    html {
      font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
        "Noto Color Emoji";
    }

    .gradient {
      background-image: linear-gradient(-225deg, #cbbacc 0%, #2580b3 100%);
    }

    button,
    .gradient2 {
      background-color: #f39f86;
      background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%);
    }

    /* Browser mockup code
 * Contribute: https://gist.github.com/jarthod/8719db9fef8deb937f4f
 * Live example: https://updown.io
 */

    .browser-mockup {
      border-top: 2em solid rgba(230, 230, 230, 0.7);
      position: relative;
      height: 60vh;
    }

    .browser-mockup:before {
      display: block;
      position: absolute;
      content: "";
      top: -1.25em;
      left: 1em;
      width: 0.5em;
      height: 0.5em;
      border-radius: 50%;
      background-color: #f44;
      box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
    }

    .browser-mockup>* {
      display: block;
    }

    /* Custom code for the demo */
  </style>
</head>

<body class="gradient leading-relaxed tracking-wide flex flex-col">
  <!--Nav-->
  <nav id="header" class="w-full z-30 top-0 text-white py-1 lg:py-6">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-2 lg:py-6">
      <div class="pl-4 flex items-center">
        <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
          <img src="http://www.cappadociaexclusivetravel.com/images/logo.png" alt="www.cappadociaexclusivetravel.com" />
        </a>
      </div>

      <div class="block lg:hidden pr-4">
        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-green-500 appearance-none focus:outline-none">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>


    </div>
  </nav>


   

  <div class="container mx-auto lg:px-40 px-4 h-100">
    
  </div>



  <!--Footer-->
  <footer class="bg-white ">
    <div class="container mx-auto mt-8 px-8">
      <div class="w-full flex flex-col md:flex-row py-6">
        <div class="flex-1 mb-6 p-4">
          <img src="http://www.cappadociaexclusivetravel.com/images/logo.png" alt="www.cappadociaexclusivetravel.com" class="object-contain" />

        </div>

        <div class="flex-1">
          <p class="uppercase font-extrabold text-gray-500 md:mb-6">Links</p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">FAQ</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Help</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Support</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <p class="uppercase font-extrabold text-gray-500 md:mb-6">Legal</p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Terms</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Privacy</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <p class="uppercase font-extrabold text-gray-500 md:mb-6">Social</p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Facebook</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Linkedin</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Twitter</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <p class="uppercase font-extrabold text-gray-500 md:mb-6">
            Company
          </p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Official Blog</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">About Us</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
          } else {
            navMenuDiv.classList.add("hidden");
          }
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }
    }

    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  </script>
  

</body>

</html>