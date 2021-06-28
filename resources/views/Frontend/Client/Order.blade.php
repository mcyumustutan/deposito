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
 
</head>

<body class="bg-gradient-to-r from-gray-400 to-yellow-200 flex flex-col h-screen text-white">
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


  @if($client["status"]=='waiting')
  <div class="container mx-auto lg:px-40 px-4 mb-8">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
      <strong class="font-bold">Hello!</strong>
      <span class="block sm:inline">Please check information summary! Because, your paying for deposit.</span>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">

      </span>
    </div>
  </div>

  @elseif($client["status"]=='cancelled')
  <div class="container mx-auto lg:px-40 px-4 mb-8">
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded" role="alert">
      <span class="font-semibold mr-2 text-left flex-auto p-4">Your deposit cancelled!</span>

    </div>
  </div>
  @endif

  <div class="container mx-auto lg:px-40 px-4">
    <div class="flex flex-wrap ">
      <div class="w-full sm:w-1/1 lg:w-3/6 px-3 mb-6">

        <div class="col-span-1 lg:col-span-4 order-first lg:order-last mb-4">
          <h4 class="text-3xl text-gray-700 mb-5">Your Summary</h4>
          <div class="p-10 rounded-md shadow-md bg-white">
            <div class="grid grid-cols-8 overflow-hidden col-gap-6 mb-5">
              <div class="col-span-5">

                <p class="text-sm truncate text-gray-600">Name:</p>
                <p class=" mb-4 text-gray-800">{{$client["fullname"]}}</p>
                <p class="text-sm truncate text-gray-600">Phone:</p>
                <p class=" mb-4 text-gray-800">{{$client["phone"]}}</p>
                <p class="text-sm truncate text-gray-600">Email:</p>
                <p class=" mb-4 text-gray-800">{{$client["email"]}}</p>
                <p class="text-sm truncate text-gray-600">Address:</p>
                <p class=" mb-4 text-gray-800">{{$client["email"]}}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-span-1 lg:col-span-4 order-first lg:order-last">
          <h4 class="text-3xl text-gray-700 mb-5">Tour Summary</h4>
          <div class="p-10 rounded-md shadow-md bg-white">
            <div class="grid grid-cols-8 overflow-hidden col-gap-6 mb-5">
              <div class="col-span-5 text-sm truncate text-green-600">


                {!!$client["note"]!!}

              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="w-full sm:w-1/1 lg:w-3/6 px-3 mb-6 mb-4">
        <h4 class="text-3xl text-gray-700 mb-5">Deposit Payment</h4>
        <div class="lg:p-10 rounded-md shadow-md bg-white">

          @if($client["status"]=='success')
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
            <span class="font-semibold mr-2 text-left flex-auto p-4">Your deposit already payed!</span>

          </div>
          @endif

          @if(session()->has('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative block" role="alert">
            {{ session()->get('error') }}
          </div>
          @endif


          @if(session()->has('success'))
          <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            {{ session()->get('success') }}
          </div>
          @endif



          <div id="iyzipay-checkout-form" class="responsive my-5"></div>

        </div>
      </div>



      <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">

      </div>
    </div>
  </div>



  <!--Footer-->
  <footer class="bg-white mt-auto mb-0 ml-0 mr-0">
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
  {!!$form!!}

</body>

</html>