<div class=" max-w-screen">
    <div class="mt-10  mb-3 w-full items-end justify-end flex">
        <a href="{{ route('admin.viewapplication.show', ['event' => $application->event->hid]) }}" class="  flex w-fit gap-6 text-blue-900 px-8 rounded-sm shadow-lg font-semibold py-2">
            <span class="flex gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            <span>
            <span class="flex">Back</span>
        </a>
    </div>
    
    <div>
        <div class=" bg-[#061751]  p-6">
            <h1 class=" px-2 text-white text-sm">Data from Unique ID</h1>
            <div class=" text-white w-full py-2 px-2 uppercase md:text-xl text-sm">
                <h1> {{ $application->startup->name }}</h1>
            </div>
            <div class=" flex md:flex-row flex-col text-white pb-6">
                <div class="md:w-2/5 w-full">
                    <h1 class="px-3 py-2  text-white ">
                        Name of the directors
                    </h1>
                </div>
                @foreach($application->startup->directors as $products)
                    <div class="md:w-3/5 w-full">
                        <h1 class="px-3 py-2  text-white  ">
                            {{ $products->name }}
                        </h1>
                       
                    </div>
                @endforeach
            </div>

            <div class="grid lg:grid-cols-2 grid-cols-1 pb-6">
               
                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-white ">
                            KSUM Unique ID
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-white   ">
                            {{ $application->startup->unique_id }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-white  ">
                            Founding Year
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-white  ">
                            {{ $application->startup->founding_year }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-white  ">
                            Location of Startup
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-white  ">
                            {{ $application->startup->location }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-white ">
                            Email
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-white   ">
                            {{ $application->startup->email }} 
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-white ">
                            Website
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <a class="px-3 py-2  text-white underline   " href="{{ $application->startup->website }}" target="_blank">
                            {{ $application->startup->website }}
                        </a>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-white  ">
                            Contact Number
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-white  ">
                            {{ $application->startup->contact_num }}
                        </h1>
                    </div>
                </div>

            </div>

            <div class="toggleDiv" style="display: {{ $application->status != 'Selected' ? 'block' : 'none' }};">
                <div class=" text-white" id="productdetails">
                    <div class=" text-white w-full py-2 px-2 uppercase md:text-xl text-sm">
                        <h1>Product Details</h1>
                    </div>
                    @foreach($application->startup->products as $products)
                        <div class=" flex md:flex-row flex-col py-2 px-2">
                            <div class="md:w-1/4 w-full font-semibold">
                                Product Name 
                            </div>
                            <div class="md:w-3/4 w-full font-bold">
                                {{$products->name}}

                            </div>
                        </div>

                        <div class=" flex md:flex-row flex-col py-2 px-2">
                            <div class="md:w-1/4 w-full pb-1 font-semibold">
                                Product Details 
                            </div>
                            <div class="w-full md:w-3/4 text-justify">
                                {{$products->brief}}
                            </div>
                        </div>

                        <div class=" flex md:flex-row flex-col py-2 px-2">
                            <div class="md:w-1/4 w-full font-semibold pb-1">
                                Product Usecase 
                            </div>
                            <div class=" w-full md:w-3/4 text-justify">
                                {{$products->pitch}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="  py-4 bg-white" >
            <h1 class=" px-2 text-[#061751] text-sm py-4">Application Details</h1>
            <div class="grid lg:grid-cols-2 grid-cols-1">
                
                <div class=" flex md:flex-row flex-col text-black">
                    <div class="md:w-2/5 w-full">
                        <h1 class="px-3 py-2  text-black ">
                            Startup Stage
                        </h1>
                    </div>
                    <div class="md:w-3/5 w-full">
                        <h1 class="px-3 py-2  text-black  ">
                            {{ $application->startup_stage }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-black ">
                            Business Sector
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-black   ">
                            {{ $application->business_sector }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-black  ">
                            Revenue Generated for {{$application->current_fy}}
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-black  ">
                            {{ $application->revenue_generated_current }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-black  ">
                            Revenue Generated for {{$application->previous_fy}}
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-black  ">
                            {{ $application->revenue_generated_previous }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-black ">
                            Investment Raised
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-black   ">
                            {{ $application->investment_raised }}
                        </h1>
                    </div>
                </div>

                <div class=" flex md:flex-row  flex-col">
                    <div class=" md:w-2/5 w-full ">
                        <h1 class="px-3 py-2  text-black ">
                            I accept the terms and is willing to pay the registration fee
                        </h1>
                    </div>
                    <div class=" md:w-3/5 w-full ">
                        <h1 class="px-3 py-2  text-white   ">
                            <h1 class="px-3 py-2  text-black    ">
                                @if($application->willing_to_pay =="1")
                                    <p class="text-green-700">Yes</p>
                                @else
                                    <p class=" text-red-500">No</p>
                                @endif
                            </h1>
                        </h1>
                    </div>
                </div>
            </div>
          
            <div class=" flex md:flex-row  flex-col">
                <div class=" md:w-2/5 w-full ">
                    <h1 class="px-3 py-2  text-black  ">
                        Why do you want to participate in this delegation?
                    </h1>
                </div>
                <div class=" md:w-3/5 w-full ">
                    <h1 class="px-3 py-2  text-black  ">
                        {{ $application->why_participate }} 
                    </h1>
                </div>
            </div>
        </div>

        <div class="toggleDiv" style="display: {{ $application->status != 'Selected' ? 'block' : 'none' }};">
            <section id="selectionprocess" class="bg-white py-3  mt-4 w-full h-auto  flex mx-auto flex-col">
                <h1 class="px-2 text-[#061751] text-sm  text-start items-start  py-4">Selection process.</h1>
                <div class="   sm:rounded-lg  w-full items-center justify-center ">

                
                    @foreach($application->remark as $remarks)

                        <div class=" flex  flex-col">
                            <div class=" flex md:flex-row  flex-col">
                                <div class=" md:w-1/4 w-full ">
                                    <h1 class="px-3 py-2  text-black  ">
                                        Remarks from  {{ $remarks->user->name}}
                                    </h1>
                                </div>
                                <div class="md:w-3/4 w-full">
                                    <div class="px-3 py-2  text-black flex  ">
                                        @if($remarks->type =="Recommended") 
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class=" w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                        </svg> --}}
                                        <p class=" text-xs text-white bg-green-800 p-1">Recommended</p> 
                                        @endif  

                                        @if($remarks->type =="Not Recommended") 
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                                            </svg>                                   --}}
                                        <p class=" text-xs text-white bg-red-800 p-1">Not&nbsp;Recommended</p>
                                        
                                        &nbsp; 
                                        @endif  

                                        @if($remarks->type =="On Hold") 
                                        <div class="  w-14">
                                            <h1 class=" text-sm text-orange-600 ">On Hold</h1>
                                        </div>
                                        
                                        @endif  

                                        <div class="w-full">
                                            <h1 class="px-3   text-black   text-justify">
                                            <span class=" text-xs">Remark :</span> {{ $remarks->remark }}
                                            </h1>
                                        </div>

                                    </div>
                                </div>
                            
                            </div>
                        
                        </div>
                        @endforeach

                        @if($application->remark_select !=null)
                        <div class=" flex  flex-col md:flex-row ">
                            <div class=" md:w-1/4 w-full ">
                                <h1 class="px-3 py-2  text-black  ">
                                    Remarks
                                </h1>
                            </div>
                            <div class=" md:w-3/4 w-full">
                                
                                <div class="px-3 py-2  text-black flex  ">

                                    @if($application->status =="Selected") 
                                    <p class=" text-xs text-white bg-green-800 p-1">Selected</p>
                                    &nbsp; 
                                    @endif  

                                    @if($application->status =="Rejected") 
                                    <p class=" text-xs text-white bg-red-800 p-1">Rejected</p>
                                    &nbsp; 
                                    @endif  

                                    @if($application->status =="On hold") 
                                    <p class=" text-xs text-white bg-orange-800 p-1 w-fit flex">On&nbsp;hold</p>
                                    &nbsp; 
                                    @endif  

                                    <div class="w-full">
                                        <h1 class="px-3   text-black   text-justify">
                                            <span class=" text-xs">Remark :</span>  {{ $application->remark_select }} 
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class=" flex md:flex-row  flex-col">
                            <div class=" md:w-1/4 w-full ">
                                <h1 class="px-3 py-2  text-black  ">
                                    Application Status
                                </h1>
                            </div>
                            <div class=" md:w-3/4 w-full ">
                                @if($application->status =="Selected")
                                <h1 class="px-3 py-2   text-green-700 font-semibold  ">
                                    {{ $application->status }}
                                </h1>
                                @elseif($application->status =="On hold")
                                <h1 class="px-3 py-2   text-orange-700 font-semibold  ">
                                    {{ $application->status }}
                                </h1>
                                @elseif($application->status =="Rejected")
                                <h1 class="px-3 py-2   text-red-700 font-semibold  ">
                                    {{ $application->status }}
                                </h1>
                                @else
                                <h1 class="px-3 py-2   text-blue-700 font-semibold  ">
                                    {{ $application->status }}
                                </h1>
                                @endif
                            </div>
                        </div>

                        @if($application->paymentstatus != null)
                        <div class=" flex md:flex-row  flex-col">
                            <div class=" md:w-1/4 w-full ">
                                <h1 class="px-3 py-2  text-black  ">
                                    Payment Status
                                </h1>
                            </div>
                            <div class=" md:w-3/4 w-full ">
                                <h1 class="px-3   text-black  ">
                                    @if($application->paymentstatus =="Payment Completed")
                                    <h1 class="px-3 py-2   text-green-700 font-semibold  ">
                                        {{ $application->paymentstatus }}
                                    </h1>
                                    @else
                                    <h1 class="px-3 py-2   text-red-700 font-semibold  ">
                                        {{ $application->paymentstatus }}
                                    </h1>
                                    @endif
                                </h1>
                            </div>
                        </div>
                @endif
                </div>

            </section>
        </div>

        <div class=" flex flex-col w-full">
            <div class=" flex items-end justify-end  w-full">
                <div class="flex md:flex-row flex-col  float-right w-full items-end justify-end ">
                    @can("superadmin:select:view")
                        <div class=" flex md:flex-row flex-col items-end justify-end float-right ">
                            @if($application->status =="Applied")
                                <div class=" items-end flex justify-end px-8  my-2">
                                    <div>
                                        <button wire:click="selectstpsecond()" class=" bg-green-900 text-white px-8 rounded-sm shadow-lg font-semibold py-2">Select for Next Round</button>
                                    </div>
                                </div>
                        
                                {{-- <div class=" items-end flex justify-end px-8 gap-10  my-2">
                                    <div>
                                        <button wire:click="rejectstp()" class=" bg-red-700 text-white px-8 rounded-sm shadow-lg font-semibold py-2">Reject</button>
                                    </div>
                                </div> --}}

                                {{-- @if($application->status !="On hold") --}}

                                    <div class=" items-end flex justify-end px-8 gap-10  my-2">
                                        <div>
                                            <button wire:click="on_hold()" class=" bg-orange-700 text-white px-8 rounded-sm shadow-lg font-semibold py-2">On&nbsp;Hold</button>
                                        </div>
                                    </div>
                                {{-- @endif --}}
                            @endif
                        </div>
                    @endcan
                </div>
            </div>

            <div class=" flex items-end justify-end  w-full">
                <div class="flex md:flex-row flex-col  float-right w-full items-end justify-end ">
                    @can("superadmin:select:view")
                        <div class=" flex md:flex-row flex-col items-end justify-end float-right ">
                            @if($application->status =="Selected for Next Round" || $application->status =="On hold" )
                               
                                <div class=" items-end flex justify-end px-8  my-2">
                                    <div>
                                        <button wire:click="selectstp()" class=" bg-green-900 text-white px-8 rounded-sm shadow-lg font-semibold py-2">Select</button>
                                    </div>
                                </div>
                        
                                <div class=" items-end flex justify-end px-8 gap-10  my-2">
                                    <div>
                                        <button wire:click="rejectstp()" class=" bg-red-700 text-white px-8 rounded-sm shadow-lg font-semibold py-2">Reject</button>
                                    </div>
                                </div>

                                {{-- @if($application->status !="On hold")

                                    <div class=" items-end flex justify-end px-8 gap-10  my-2">
                                        <div>
                                            <button wire:click="on_hold()" class=" bg-orange-700 text-white px-8 rounded-sm shadow-lg font-semibold py-2">On&nbsp;Hold</button>
                                        </div>
                                    </div>
                                @endif --}}
                            @endif
                        </div>
                    @endcan
                </div>
            </div>

            <div class=" flex items-end justify-end  w-full">
                @can("admin:addremark:create")
                    <div class="flex md:flex-row w-full items-end justify-end  flex-col ">
                        @if($application->status === "Applied")
                            @if(!$application->remark()->where('user_id', auth()->id())->exists())
                                <div class="items-end flex justify-end px-8 my-2">
                                    <div>
                                        <button wire:click="recommended()" class="bg-green-900 text-white px-4 text-sm rounded-sm shadow-lg font-semibold py-2">Recommended</button>
                                    </div>
                                </div>
                
                                <div class="items-end flex justify-end px-8 my-2">
                                    <div>
                                        <button wire:click="notrecommended()" class="bg-orange-700 text-white px-4 text-sm rounded-sm shadow-lg font-semibold py-2">Not recommended</button>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                @endcan
            </div>
        </div>
    </div>


@if($application->status == 'Selected')
<div class=" flex items-end justify-end ">
    <button id="toggleButton" class="mt-4 w-fit px-4 py-2 text-blue-500 underline rounded cursor-pointer">
        {{ $application->status == 'Selected' ? 'View all data' : 'Hide' }}
    </button>
</div>
@endif

    {{-- @if($application->attendeedetails->count())
        <div class="mt-10  mb-3 w-full flex flex-col bg-white p-4">
            <h1 class="text-lg  text-blue-900">Event Attendee Details</h1>

                @foreach($application->attendeedetails as $attendeed)
                    <div class="bg-white p-4 flex flex-col">
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                            <div class="flex w-full">
                                <div class="flex gap-10 w-full">
                                    <div class="w-1/3 flex">Name</div>
                                    <div class="w-2/3 flex">{{$attendeed->name}}</div>
                                </div>
                            </div>
                            <div class="flex w-full">
                                <div class="flex gap-10 w-full">
                                    <div class="w-1/3 flex">Passport Number</div>
                                    <div class="w-2/3 flex">{{$attendeed->passportnum}}</div>
                                </div>
                            </div>

                            <div class="flex w-full">
                                <div class="flex gap-10 w-full">
                                    <div class="w-1/3 flex">Mobile Number</div>
                                    <div class="w-2/3 flex">{{$attendeed->mobilenum}}</div>
                                </div>
                            </div>

                            <div class="flex w-full">
                                <div class="flex gap-10 w-full">
                                    <div class="w-1/3 flex">Mail Id</div>
                                    <div class="w-2/3 flex">{{$attendeed->email}}</div>
                                </div>
                            </div>

                        </div>
                        <div class="flex w-full pt-4">
                            <div class="flex gap-10 w-full">
                                <div class="w-1/2 flex">Do you currently hold a valid visa for travel to the country where the event is being held?
                                </div>
                                <div class="w-1/2 flex">
                                    @if($attendeed->valid_visa ==1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full pt-4">
                            <div class="flex gap-10 w-full">
                                <div class="w-1/2 flex">
                                    <a href="/storage/{{$attendeed->passportcopy}}" target="_blank" class="text-blue-500 underline">View Passport</a>
                                </div>
                            </div>
                        </div>

                        <div class=" h-[1px] mt-4 bg-gray-200 w-1/12"></div>


                    </div>
                @endforeach
                <h1 class="text-lg  text-blue-900 pb-6">Company Details</h1>
                    <div>
                        <div class="flex w-full">
                            <div class="flex gap-10 w-full">
                                <div class="w-1/6 flex">Company Details</div>
                                <div class="w-2/3 flex">{{$application->companydetails}}</div>
                            </div>
                        </div>

                        <div class="flex w-full pt-6">
                            <div class="flex gap-10 w-full">
                                <div class="w-1/6 flex">Product Details</div>
                                <div class="w-2/3 flex">{{$application->productdetails}}</div>
                            </div>
                        </div>

                        <div class="flex w-full pt-4">
                            <div class="flex gap-10 w-full">
                                <div class="w-1/2 flex">
                                    <a href="/storage/{{$application->companylogo}}" target="_blank" class="text-blue-500 underline">Company Logo</a>
                                </div>
                            </div>
                        </div>

                    </div>
        </div>
    @endif
    --}}


@if($application->attendeedetails->count())
    <div class="bg-white py-3 my-4">
        <div>
            <div class=" flex md:flex-row flex-col px-4">
                <div class=" w-full ">
                    <livewire:admin.events.attendeedetailspage :applicationId="$application->id" />
        
                </div>
                <div>
        
                </div>
            </div>
            <div class="p-8">
                <h1 class="text-base text-blue-900 pb-6">Company Details</h1>

                <div class="flex w-full">
                    <div class="flex gap-10 w-full">
                        <div class="w-1/6 flex">Company Details</div>
                        <div class="w-2/3 flex text-justify">{{$application->companydetails}}</div>
                    </div>
                </div>

                <div class="flex w-full pt-6">
                    <div class="flex gap-10 w-full">
                        <div class="w-1/6 flex">Product Details</div>
                        <div class="w-2/3 flex text-justify">{{$application->productdetails}}</div>
                    </div>
                </div>

                <div class="flex w-full pt-4">
                    <div class="flex gap-10 w-full">
                        <div class="w-1/2 flex">
                            <a href="/storage/{{$application->companylogo}}" target="_blank" class="text-blue-500 underline">Company Logo</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif



    <div class=" text-justify py-2 font-light w-full">
         
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <h1 class=" px-2 text-[#061751] text-sm py-4">Event Details</h1>

            <section class=" container mx-auto pt-10 pb-6 px-4">
                <div class=" flex md:flex-row flex-col gap-8 ">
                    <div class="md:w-2/3 w-full ">
                        
                        <div class=" uppercase  text-lg font-semibold py-2">{{$application->event->name}}</div>
                        <div class=" text-justify py-2 font-light">{!! $application->event->description !!}</div>
                    </div>
                    <div class=" text-justify py-2 font-light md:w-1/3 w-full mx-auto bg-white ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right ">
                                <tbody>
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4  text-gray-900 whitespace-nowrap ">
                                            Event date
                                        </th>
                                        <td class="px-3 py-4 ">
                                            {{$application->event->startdate}} - {{$application->event->enddate}}
                                        </td>
                                       
                                    </tr>
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4  text-gray-900 whitespace-nowrap ">
                                            Venue
                                        </th>
                                        <td class="px-3 py-4 ">
                                            {{$application->event->venue}}
                                        </td>
                                       
                                    </tr>
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4  text-gray-900 whitespace-nowrap ">
                                            Last date to apply
                                        </th>
                                        <td class="px-3 py-4 ">
                                            {{$application->event->lastdate}}
                                        </td>
                                       
                                    </tr>
                                    
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4  text-gray-900 whitespace-nowrap ">
                                            Registration fee
                                        </th>
                                        <td class="px-3 py-4 ">
                                            {{$application->event->fee}}/-
                                        </td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
        
                </div>
                        
            </section>
        </div>
        
    </div>
    
   
</div>


<script>
    let isVisible = {{ $application->status == 'Selected' ? 'false' : 'true' }};

    document.getElementById('toggleButton').addEventListener('click', function() {
        const toggleDivs = document.querySelectorAll('.toggleDiv');

        toggleDivs.forEach(function(div) {
            if (isVisible) {
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
        });

        this.textContent = isVisible ? 'View all data' : 'Hide';

        isVisible = !isVisible;
    });
</script>
