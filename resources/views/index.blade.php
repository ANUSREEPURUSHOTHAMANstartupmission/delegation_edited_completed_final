
<x-layouts.base>
    
  <nav class="z-50 border-gray-200 px-2 sm:px-20 bg-white absolute w-full py-1">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="/img/logo.svg" alt="Logo" class="h-14">
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto absolute md:relative top-16 md:top-0 left-0" id="navbar-default">
         
          <ul class="flex flex-col p-4 mt-4  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent bg-[#06131ce6]">
            @if(auth()->user())
            <li class="flex items-center justify-center">
              <a href="{{ route('index')}}" class="block px-3 py-1  md:text-[#061751] text-white bg-[#061751] rounded md:bg-transparent" aria-current="page">Home</a>
            </li>
            @else
            <li class="">
              <a href="{{ route('index')}}" class="block px-3 py-1  md:text-[#061751] text-white bg-[#061751] rounded md:bg-transparent" aria-current="page">Home</a>
            </li>
            @endif
 
            @if(auth()->user())
              <li class=" text-[#061751] flex items-center justify-center">
                <a href="{{ route('login')}}" class=" flex text-sm rounded-full focus:outline-none items-center justify-center text-center" id="user-menu-button">
                  <div class="relative">
                    <div class="h-10 w-10 rounded-full border border-[#061751] bg-[#061751] items-center justify-center flex">
                     <div class="text-white ">
                          {{substr(auth()->user()->name, 0, 1)}}
                        </div>
                    </div>
                    <span title="online" class="flex justify-center absolute -bottom-0.5 right-1 text-center bg-green-500 border border-white w-3 h-3 rounded-full"></span>
                  </div>
                  <span class="block ml-1 self-center text-[#061751] ">
                    {{auth()->user()->name}}
                  </span>
                </a>
              </li>
            @else
              <li><a href="{{ route('startups')}}" class="block  text-white bg-[#061751] rounded  px-3 py-1 " aria-current="page">Login</a></li>
            @endif
          </ul>
        
        </div>
    </div>
  </nav>

  {{-- <main class="py-24 h-[70vh] flex flex-col items-center justify-center relative" >
		<div class="absolute -z-10 w-full h-full top-0 left-0  bg-opacity-40 " style="background-color: #06131ce6"></div>
  	<div class="absolute -z-20 bg-cover bg-bottom bg-no-repeat w-full h-full top-0 left-0" style="background-image:url('/img/GITEX-Global.jpg')"></div>  

		<div class="container mx-auto text-white text-center">

      <div>
          <h1 class=" md:text-6xl text-3xl  font-semibold">KSUM DELEGATION</h1>
      </div>

		</div>
		
	</main> --}}


 


    {{-- <section class=" container mx-auto py-24 min-h-[100vh]">
        <div class=" items-center justify-center flex-col flex w-full mx-auto">
          
          @foreach($eventdetails as $event)

            <a href="{{ route('event.show', ['id' => $event->id]) }}" class=" flex md:flex-row flex-col w-4/5  cursor-pointer gap-6 items-center justify-center mx-auto bg-white border-blue-900 pb-2 hover:border-b-[0.05px] group ">
                <div class="group-hover:duration-700 group-hover:-translate-y-2 group-hover:shadow-md p-3 w-full flex md:flex-row flex-col">
                  <div class=" md:w-3/5 w-full">
                    <p class=" text-lg">{{$event->name}}</p>
                  </div>
                  <div class=" md:w-1/5 w-full">
                    @if ($event->status==="Application Open")
                      <p class=" text-green-800">{{$event->status}}</p>
                    @endif
                    @if ($event->status==="Application Closed")
                    <p class=" text-red-800">{{$event->status}}</p>
                  @endif
                  </div>
                  <div class=" md:w-1/5 w-full ">
                      <div><p> View details</p></div>
                      <div class=" group-hover:translate-x-20 group-hover:duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                        
                      </div>
                  </div>
                </div>
              </a>

          @endforeach

        </div>
       <div class=" md:w-4/5 flex items-center justify-center mx-auto w-full space-x-10 ">
        {{ $eventdetails->links() }}
       </div>

    </section> --}}
    {{-- 144f95 --}}


   <div class=" relative min-h-screen" >
    <div class="absolute -z-10 w-full h-full top-0 left-0  bg-opacity-70 " style="background-color: #144f95"></div>
  	<div class="fixed -z-10 bg-cover bg-bottom bg-no-repeat w-full h-full top-0 left-0" style="background-image:url('/img/background_2.svg')"></div>  

    <section class=" w-5/6   items-center justify-center mx-auto py-24  bg-cover bg-no-repeat" >
      <h1 class=" text-white  pt-20 text-2xl md:text-4xl  font-semibold" style="Montserrat Alternates', sans-serif">KSUM DELEGATION</h1>

      <h1 class=" text-white  pt-4 pb-10 text-lg md:text-2xl  font-semibold" style="Montserrat Alternates', sans-serif">Event Schedule</h1>
        <div class=" items-center justify-center flex-col flex w-full mx-auto">
          <div class=" grid lg:grid-cols-2 grid-cols-1 gap-6 w-full  rounded-2xl ">
            
            @foreach($eventdetails as $event)
                <a href="{{ route('event.show', ['event' => $event->hid]) }}" class="">
                  <div  class="flex md:flex-row flex-col  lg:h-[40vh] h-fit gap-5 bg-[#f3f4f5] rounded-lg">

                    @if($event->poster)
                    <div class="md:w-2/5  items-center justify-center flex">
                      <img src="/storage/{{$event->poster}}" class=" h-full w-full object-contain  items-center justify-center rounded-l-lg">
                    </div>
                    @endif

                    <div class=" md:w-3/5 w-full   flex mx-auto my-auto flex-col p-4 ">
                        <h1 class=" text-lg md:text-xl">{{$event->name}}</h1>
      
                        <div class=" w-full pt-2">
                          @if ($event->status==="Application Open")
                            <p class=" bg-green-800  text-white w-fit p-1 rounded-sm text-xs">{{$event->status}}</p>
                          @endif
                          @if ($event->status==="Application Closed")
                            <p class=" bg-red-700 text-white text-xs w-fit p-1 rounded-sm">{{$event->status}}</p>
                          @endif
                        </div>
                        
                        <div class=" md:pt-4 pt-5 flex-col flex gap-2">
                          <div class=" flex flex-row gap-2">
                           <img src="/img/calendar.svg" class=" w-3">
                            <p>{{ \Carbon\Carbon::parse($event->startdate)->format('d-m-Y') }}</p>-<p>{{ \Carbon\Carbon::parse($event->enddate)->format('d-m-Y') }}</p> 


                          </div>
      
                          <div class=" flex flex-row gap-2">
                            <img src="/img/location.svg" class=" w-3">
                            
                            <p class=" text-sm">{{$event->venue}}</p>
                          </div>

                          <div class=" flex flex-row gap-2">
                              <p class=" bg-[#123464] text-white px-3 py-1">View More</p>

                          </div>
                          
                        </div>
                    </div>
                  
                  </div>
                </a>
            @endforeach

          
          </div>

        
        </div>
        <div class=" md:w-4/5 pt-10 flex  items-center justify-center mx-auto w-full space-x-10 text-white ">
          {{ $eventdetails->links() }}
         </div>
    </section>
   </div>


    <footer class="bg-white dark:bg-gray-800 p-6 py-3 shadow-sm w-full bottom-0">
      <div class="mx-auto">
        <div class="flex flex-wrap flex-row -mx-4">
          <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 text-center md:text-left">
            All right reserved &copy; {{date('Y')}}
          </div>
          <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 text-center md:text-right ">
            <!-- copyright text -->
            <p class="mb-0 mt-3 md:mt-0">
              Kerala Startup Mission
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

</x-layouts.base>