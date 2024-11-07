<div>
    <div>
        <div class=" bg-[#061751] mt-10 p-6">
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
                        <h1 class="px-3 py-2  text-white   ">
                            {{ $application->startup->website }}
                        </h1>
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

           

        </div>
        
        <div class="toggleDiv" style="display: {{ $application->status != 'Selected' ? 'block' : 'none' }};">

            <div class=" bg-[#061751]  p-6 pt-0">
                <div class=" text-white">
                    <div class=" text-white w-full py-2 px-2 uppercase md:text-xl text-sm">
                        <h1>Product Details</h1>
                    </div>
                    @foreach($application->startup->products as $products)
                        <div class=" flex md:flex-row flex-col py-2 px-2">
                            <div class="md:w-1/4 w-full font-semibold">
                                Product Name 
                            </div>
                            <div class="md:w-3/4 w-full">
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

        <div class="  py-4 bg-white">
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

        <section class="bg-white py-3  mt-4 w-full h-auto  items-center justify-center flex mx-auto flex-col">
                    
            <div class="   sm:rounded-lg  w-full ">
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
                            @else
                            <h1 class="px-3 py-2   text-red-700 font-semibold  ">
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
                            <h1 class="px-3  text-black  ">
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
    
    @if($application->status == 'Selected')
    <div class=" flex items-end justify-end ">
        <button id="toggleButton" class="mt-4 w-fit px-4 py-2 text-blue-500 underline rounded cursor-pointer">
            {{ $application->status == 'Selected' ? 'View all data' : 'Hide' }}
        </button>
    </div>
    @endif



    @if(($application->status=="Selected") && ($application->paymentstatus!="Payment Completed"))
        <div class=" mt-10 px-8 items-center justify-center flex">
            <button id="rzp-button1" class=" bg-green-900 text-white px-8 py-3 shadow-md rounded-md text-xl font-semibold">Pay Now</button>
        </div>
    @endif





   

    @if(($application->paymentstatus=="Payment Completed") && ($application->attendeedetails->count() ==null))
       <div class=" mt-10 px-8 items-center justify-center flex">
            <a class="mt-4 w-fit px-4 py-2 bg-blue-500 text-white rounded cursor-pointer"
            onclick="Livewire.emit('openModal', 'admin.events.attendeedetails-collection', { model: '{{ $application->hid }}' })">
            Add Attendee Details
            </a>
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
        @foreach($application->attendeedetails as $attendeed)
            <div>
                <div class="flex w-full">
                    <div class="flex gap-10 w-full">
                        <div class="w-1/6 flex">Company Details</div>
                        <div class="w-2/3 flex">{{$attendeed->companydetails}}</div>
                    </div>
                </div>

                <div class="flex w-full pt-6">
                    <div class="flex gap-10 w-full">
                        <div class="w-1/6 flex">Product Details</div>
                        <div class="w-2/3 flex">{{$attendeed->productdetails}}</div>
                    </div>
                </div>

                <div class="flex w-full pt-4">
                    <div class="flex gap-10 w-full">
                        <div class="w-1/2 flex">
                            <a href="/storage/{{$attendeed->companylogo}}" target="_blank" class="text-blue-500 underline">Company Logo</a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
</div>
@endif --}}


@if($application->attendeedetails->count())
    <div class="bg-white py-3 my-4">
        <div>
            <div class=" flex md:flex-row flex-col px-4">
                <div class=" w-full ">
                    <livewire:user.events.attendeedetailspage :applicationId="$application->id" />
        
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
                                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            Event date
                                        </th>
                                        <td class="px-3 py-4 font-medium">
                                            {{$application->event->startdate}} - {{$application->event->enddate}}
                                        </td>
                                       
                                    </tr>
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            Venue
                                        </th>
                                        <td class="px-3 py-4 font-medium">
                                            {{$application->event->venue}}
                                        </td>
                                       
                                    </tr>
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            Last date to apply
                                        </th>
                                        <td class="px-3 py-4 font-medium">
                                            {{$application->event->lastdate}}
                                        </td>
                                       
                                    </tr>
                                    
                                    <tr class="bg-white border-b  ">
                                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            Registration fee
                                        </th>
                                        <td class="px-3 py-4 font-medium">
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
    



    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{env('RAZORPAY_KEY')}}", // Enter the Key ID generated from the Dashboard
    "amount": '{{$application->event->fee}}', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Ksum",
    "description": '{{$application->event->name}}',
    "image": "/img/logo-white.svg",
    "order_id": '{{$application->orderid}}', //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": '{{route('paymentdata')}}',
    "prefill": {
        "name": '{{$application->startup->name}}',
        "email": '{{$application->startup->email}}',
        "contact": '{{$application->startup->contact_num}}'
    },
    "notes": {
        'startupname' :'{{$application->startup->name}}',
        'eventname':'{{$application->event->name}}',
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

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
