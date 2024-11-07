<div>
	<div class=" px-4 gap-4 w-full flex md:flex-row flex-col py-4">
			<div class="bg-[#2284bd] rounded-md text-white  md:p-10 p-8  w-full ">
				<p class=" text-sm pb-3">Payment Completed</p>
				<p class=" text-2xl md:text-4xl font-semibold  items-end justify-end text-end">{{$payment_completed}}</p>
			</div>
			
			<div class="bg-[#195c77] rounded-md text-white  md:p-10 p-8  w-full ">
				<p class=" text-sm pb-3">Total Amount</p>
				<p class=" text-2xl md:text-4xl font-semibold  items-end justify-end text-end">{{$totalfee}}</p>
			</div>
			 
		 </div>
	</div>
	
	 <div class=" px-4 gap-4 w-full flex  flex-col py-4">
		<h1 class=" text-[#061751]  text-lg font-semibold">Delegation Details</h1>

		 <div class=" w-full flex flex-col">
			 <div class=" grid md:grid-cols-3 grid-cols-2  gap-8">
				 {{-- <div class=" bg-[#5886ff] rounded-md text-white  md:p-10 md-py-4 p-8 py-2">
					 <h1 class=" text-sm font-semibold py-2">Events</h1>
					 <h1 class=" text-2xl md:text-4xl text-end font-semibold ">{{$eventdetails}}</h1>
				 </div> --}}
				 <div class=" bg-[#5886ff] rounded-md text-white  md:p-10 md-py-4 p-8 py-2"> 
					 <h1 class=" text-sm font-semibold py-2">My Applications</h1>
					 <h1 class=" text-2xl md:text-4xl font-semibold text-end    ">{{$applications}}</h1>
				 </div>
				 <div class=" bg-[#5886ff] rounded-md text-white  md:p-10 md-py-4 p-8 py-2">
					 <h1 class=" text-sm font-semibold py-2">Selected Applications</h1>
					 <h1 class=" text-2xl md:text-4xl font-semibold text-end    ">{{$selected}}</h1>
				 </div>
				 <div class=" bg-[#5886ff] rounded-md text-white  md:p-10 md-py-4 p-8 py-2">
					 <h1 class=" text-sm font-semibold py-2">Rejected Applications</h1>
					 <h1 class=" text-2xl md:text-4xl font-semibold text-end    ">{{$rejected}}</h1>
				 </div>
				 
			 </div>
		 </div>
		
	 </div>


	<div>
		<div class=" px-4 flex md:flex-row flex-col gap-4">
			
			<div class=" md:w-1/2 bg-white w-full shadow-md rounded-md h-fit">
				<h1 class="p-2 text-[#061751]">Upcoming Delegations</h1>
				<div class=" md:px-10 px-8 py-3">

					<ul>
						@foreach($up_events as $event)
							<a href="{{ route('event.show', ['event' => $event->hid]) }}" target="_blank">
								<li class=" list-decimal list-outside py-1"><span class="  text-blue-500 text-lg">{{$event->name}}</span> - <span class="text-sm">{{$event->venue}}</span></li>
							</a>
						@endforeach

					</ul>
				</div>
			</div>

			<div class=" md:w-1/2 bg-white w-full shadow-md rounded-md h-fit">
				<h1 class="p-2 text-[#061751]">Completed Delegations</h1>
				<div class=" md:px-10 px-8 py-3">

					<ul>
						@foreach($completed_events as $event)
							<a href="{{ route('event.show', ['event' => $event->hid]) }}" target="_blank">
								<li class=" list-decimal list-outside py-1"><span class="  text-blue-500 text-lg">{{$event->name}}</span> - <span class="text-sm">{{$event->venue}}</span></li>
							</a>
						@endforeach

					</ul>
				</div>
			</div>
		 </div>
	</div>
	
</div>