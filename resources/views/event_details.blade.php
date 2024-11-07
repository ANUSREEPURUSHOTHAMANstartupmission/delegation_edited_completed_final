<x-layouts.base>
    
  <nav class="z-50 border-gray-200 px-2 sm:px-20 py-2.5 bg-white bg-opacity-5 absolute w-full">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="/img/logo-white.svg" alt="Logo" class="h-14">
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto absolute md:relative top-16 md:top-0 left-0" id="navbar-default">
         
          <ul class="flex flex-col p-4 mt-4  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent bg-[#06131ce6]">
            
            <li class="flex items-center justify-center"><a href="{{ route('index')}}" class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:p-0" aria-current="page">Home</a></li>
               
            @if(auth()->user())
              <li class=" text-white flex items-center justify-center">
                <a href="{{ route('login')}}" class=" flex text-sm rounded-full focus:outline-none items-center justify-center text-center" id="user-menu-button">
                  <div class="relative">
                    <div class="h-10 w-10 rounded-full border border-gray-700 bg-gray-700 items-center justify-center flex">
                     <div class="text-white ">
                          {{substr(auth()->user()->name, 0, 1)}}
                        </div>
                    </div>
                    <span title="online" class="flex justify-center absolute -bottom-0.5 right-1 text-center bg-green-500 border border-white w-3 h-3 rounded-full"></span>
                  </div>
                  <span class="block ml-1 self-center text-white ">
                    {{auth()->user()->name}}
                  </span>
                </a>
              </li>
            @else
              <li><a href="{{ route('startups')}}" class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:p-0" aria-current="page">Login</a></li>
            @endif
          </ul>
        
        </div>
    </div>
  </nav>

  
  <main class="py-24 h-[40vh]  flex flex-col items-center justify-center relative" >
      <div class="absolute -z-10 w-full h-full top-0 left-0  bg-opacity-70" style="background-color: rgba(6, 19, 28, 0.90)"></div>
      <div class="absolute -z-20 bg-cover bg-bottom bg-no-repeat w-full h-full top-0 left-0" style="background-image:url('/img/GITEX-Global.jpg')"></div>  

      <div class="container mx-auto text-white text-center">

        <div>
            <h1 class=" md:text-6xl text-3xl  font-semibold">KSUM DELEGATION</h1>
        </div>

      </div>

  </main>
    

 
    <div class=" container flex md:px-20 px-10 pt-10 ">
      
        <a href="{{ route('index')}}" class="text-blue-800 flex  items-center justify-center"><span class=" px-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
          </svg>
          </span>Back to Events
        </a>

    </div>

    <section class=" container mx-auto pt-10 pb-6 md:px-16 px-10">
        <div class=" flex md:flex-row flex-col gap-8 ">
            <div class="md:w-2/3 w-full ">
                <div class=" uppercase ">
                    @if ($event->status==="Application Open")
                    <p class=" text-green-800">{{$event->status}}</p>
                  @endif
                  @if ($event->status==="Application Closed")
                  <p class=" text-red-800">{{$event->status}}</p>
                @endif
                </div>
                <div class=" uppercase  text-3xl font-semibold py-2">{{$event->name}}</div>
                <div class=" text-justify py-2 font-light">{!! $event->description !!}</div>

                <div class=" flex flex-row gap-2 w-full py-4  mb-3 rounded-md ">
                  <div class="bg-blue-400 w-fit flex p-2 rounded-xl h-fit">
                      <img src="/img/location-pin-alt-1-svgrepo-com.svg" class=" h-4 w-4">
                  </div>
                  <div class=" items-center justify-center  flex ">
                      <p>{{$event->venue}}</p>
                  </div>
                </div>
                
            </div>
            <div class=" md:w-1/3  w-full">

              @if($event->poster)
              
                <div class="  flex p-6 flex-col items-center justify-center text-center">
                  <div class=" items-center justify-center text-center flex flex-col">
                      <a href="/storage/{{$event->poster}}" download class=" items-center justify-center text-center">
                        <img src="/storage/{{$event->poster}}" class=" object-contain  items-center justify-center text-center h-[50vh]">
                      </a>
                  </div>
                  <div>
                    <span class=" text-sm m-4">Share this Event: </span>
              
                    <div class="flex flex-row items-center justify-center mb-5">
                      <a target="_blank" onclick="shareFB()" class="inline-block cursor-pointer items-center border-0 py-2 px-3 focus:outline-none text-md bg-blue-500 hover:bg-blue-800 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                        </svg>          
                      </a>
                      <a target="_blank" onclick="shareTwitter()" class="inline-block cursor-pointer items-center border-0 py-2 px-3 focus:outline-none text-md bg-blue-400 hover:bg-blue-800 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"></path>
                        </svg>          
                      </a>
                      <a target="_blank" onclick="shareLinkedin()" class="inline-block cursor-pointer items-center border-0 py-2 px-3 focus:outline-none text-md bg-blue-500 hover:bg-blue-800 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                                    <line x1="8" y1="11" x2="8" y2="16"></line>
                                      <line x1="8" y1="8" x2="8" y2="8.01"></line>
                                      <line x1="12" y1="16" x2="12" y2="11"></line>
                                      <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                        </svg>          
                      </a>
                    
                    </div>
  
                  </div>
                </div>

                
              
              @endif

              <div class="  py-2 font-light w-full mx-auto bg-white ">
               
                
                @if (session('status'))
                    <div class="alert alert-success pt-10 text-red-800 text-base text-justify">
                        {{ session('status') }}
                    </div>
                @endif

              

            </div>
          </div>

        </div>
        <div class=" pt-4">

          <div class=" grid  lg:grid-cols-4 grid-cols-1 gap-2">
              <div class=" flex flex-row gap-2 w-full bg-[#f3f0f08c] p-4 mb-3 rounded-md items-center justify-center mx-auto">
                <div class="bg-blue-400 w-fit items-center justify-center mx-auto flex p-3 rounded-xl h-fit">
                    <img src="/img/calendar-date-schedule-svgrepo-com (1).svg" class=" h-4 w-4">
                </div>
                <div class=" w-3/4">
                    <p class=" text-gray-600"> Event start date</p>
                    <p>{{ \Carbon\Carbon::parse($event->startdate)->format('d-m-Y') }}</p>
                </div>
              </div>

              <div class=" flex flex-row gap-2 w-full bg-[#f3f0f08c] p-4 mb-3 rounded-md items-center justify-center mx-auto">
                    <div class="bg-blue-400 w-fit items-center justify-center mx-auto flex p-3 rounded-xl h-fit">
                        <img src="/img/calendar-date-schedule-svgrepo-com (1).svg" class=" h-4 w-4">
                    </div>
                    <div class=" w-3/4">
                        <p class=" text-gray-600"> Event end date</p>
                        <p>{{ \Carbon\Carbon::parse($event->enddate)->format('d-m-Y') }}</p>

                    </div>
              </div>

             

              <div class=" flex flex-row gap-2 w-full bg-[#f3f0f08c] p-4 mb-3 rounded-md items-center justify-center mx-auto">
                <div class="bg-blue-400 w-fit items-center justify-center mx-auto flex p-3 rounded-xl h-fit">
                    <img src="/img/calendar-date-schedule-svgrepo-com (1).svg" class=" h-4 w-4">
                </div>
                <div class=" w-3/4">
                    <p class=" text-gray-600"> Last date to apply</p>
                    <p>{{ \Carbon\Carbon::parse($event->lastdate)->format('d-m-Y') }}</p>
                  </div>
              </div>

              <div class=" flex flex-row gap-2 w-full bg-[#f3f0f08c] p-4 mb-3 rounded-md items-center justify-center mx-auto">
                <div class="bg-blue-400 w-fit items-center justify-center mx-auto flex p-3 rounded-xl h-fit">
                    <img src="/img/rupee-sign-svgrepo-com.svg" class=" h-4 w-4"> 
                </div>
                <div class=" w-3/4">
                    <p class=" text-gray-600">Registration fee</p>
                    <p>{{$event->fee}}</p>
                </div>
              </div>
          </div>
        </div>
        
        <div class=" flex items-end justify-end pt-6 pb-10">
          <section class="   pb-24 md:px-10  px-0 flex sm:w-1/4 w-full items-end justify-end">
            @if ($event->status==="Application Open")
                <div class="  flex w-full">
                    <a href="{{ route('apply.apply', ['event' => $event->hid]) }}" class=" bg-blue-600 px-8 py-2 rounded-md font-medium text-white w-full text-center ">Apply Now</a>
                </div>
            @endif
          </section>
        </div>
      
    </section>
    
   
 @if(Session::has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showSuccessNotification('{{ Session::get('success') }}');
        });

        function showSuccessNotification(message) {
            Swal.fire({
                title: 'Already Applied!',
                text: message,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                    title: 'custom-title',
                    content: 'custom-content',
                },
                 width: '500px',
            });
        }
    </script>
@endif


@if(Session::has('warning'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showSuccessNotification('{{ Session::get('warning') }}');
    });

    function showSuccessNotification(message) {
        Swal.fire({
            title: 'Warning',
            text: message,
            customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                    title: 'custom-title',
                    content: 'custom-content', // Custom class for the content area
                },
                 width: '500px',
        });
    }
</script>
@endif



    <footer class="bg-white dark:bg-gray-800 p-6 py-3 shadow-sm">
        <div class="mx-auto">
          <div class="flex flex-wrap flex-row -mx-4">
            <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 text-center md:text-left">
              All right reserved &copy; {{date('Y')}}
            </div>
            <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 text-center md:text-right ">
              <p class="mb-0 mt-3 md:mt-0">
                <a href="/" class="hover:text-indigo-500">
                  {{ config('app.name') }}
                </a> 
              </p>
            </div>
          </div>
        </div>
      </footer>
    

      <script>
        var button = document.querySelector('[data-collapse-toggle="navbar-default"]')
        var target = button.getAttribute('data-collapse-toggle');
        document.addEventListener('click', function(){
          document.getElementById(target).classList.toggle('hidden');
        });
      </script>



<style>
  .custom-title {
      font-size: 18px;
  }
  .custom-content{
      font-size: 16px;
  }
</style>



<script>
  function shareFB(){
      window.open('https://www.facebook.com/sharer/sharer.php?u='+window.location.href)
  }

  function shareTwitter(){
      var title = document.querySelector('meta[property="og:title"]');
      var content = document.querySelector('meta[property="og:description"]');
      var keywords = document.querySelector('meta[name="keywords"]');

      var text = encodeURI((title?title.getAttribute('content'):'Kerala Startup Mission') + (content?content.getAttribute('content'):'Kerala Startup Mission is the central agency of the Government of Kerala for entrepreneurship development and incubation activities in Kerala, India.'))
      var url = `http://twitter.com/share?text=${text}&url=${window.location.href}&hashtags=${(keywords?keywords.getAttribute('content'):'Kerala Startup Mission, Government of Kerala').split(' ').join('_')}`;

      window.open(url);

  }

  function shareLinkedin(){

      var url = `https://www.linkedin.com/sharing/share-offsite/?url=${window.location.href}`;

      window.open(url);

  }
</script>
  </x-layouts.base>