
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <title>Login | Tailwind Starter Kit by Creative Tim</title>
  </head>
  <body class="text-gray-800 antialiased">
    <main>
      <section class="absolute w-full h-full">
        <div class="absolute top-0 w-full h-full " style="background-image: url(./assets/img/register_bg_2.png); background-size: 100%; background-repeat: no-repeat;"
        ></div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
              <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">

                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <div class=" text-center mb-3 font-bold my-3">
                    <small class="text-blue-600">Saississez vos coordonnees</small>
                  </div>
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="relative w-full mb-3">

                      <input type="email" name="email" :value="old('email')" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Email" style="transition: all 0.15s ease 0s;"/>
                    </div>
                    <div class="relative w-full mb-3">
                      <input
                        type="password" name="password"
                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                        placeholder="Password"
                        style="transition: all 0.15s ease 0s;" />
                    </div>
                    <div>
                      {{-- <label class="inline-flex items-center cursor-pointer">
                        <input id="customCheckLogin" type="checkbox" class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5" style="transition: all 0.15s ease 0s;"/><span class="ml-2 text-sm font-semibold text-gray-700">Remember me</span>
                      </label> --}}
                    </div>
                    <div class="text-center mt-6">
                      <button class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                        type="submit" style="transition: all 0.15s ease 0s;"> Sign In
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="text-grey-dark mt-6 text-center">
                Voulez-vous creer un compte?
                <a class="text-red-500 " href="{{ route('register') }}">create an account</a>
            </div>
            </div>
          </div>
        </div>
      </section>
    </main>

  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
</html>


