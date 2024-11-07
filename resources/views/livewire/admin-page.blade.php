<div>
	<div class=" px-4 gap-4 w-full flex md:flex-row flex-col py-4">
		<div class="bg-[#2284bd] rounded-md text-white  md:p-10 p-8  w-full ">
			<p class=" text-sm pb-3">Events</p>
			<p class=" text-2xl md:text-4xl font-semibold  items-end justify-end text-end">{{$eventdetails}}</p>
		</div>
		
		<div class="bg-[#195c77] rounded-md text-white  md:p-10 p-8  w-full ">
			<p class=" text-sm pb-3">Total Amount Collected</p>
			<p class=" text-2xl md:text-4xl font-semibold  items-end justify-end text-end">{{$totalfee}}</p>
		</div>
		 
	</div>


	<div class=" px-4 gap-4 w-full flex  flex-col py-4">

		 {{-- <div class=" w-full flex flex-col md:flex-row gap-4">
			 <div class=" md:w-1/2 w-full">
				<h1 class=" text-[#061751]  text-lg font-semibold pb-3">Delegation Details</h1>

				<div class=" grid md:grid-cols-2 grid-cols-2  gap-8">
					<div class=" bg-[#5886ff] rounded-md text-white  md:p-10 md-py-4 p-8 py-2">
						<h1 class=" text-sm font-semibold py-2">Events</h1>
						<h1 class=" text-2xl md:text-4xl text-end font-semibold ">{{$eventdetails}}</h1>
					</div>
					<div class=" bg-[#5886ff] rounded-md text-white  md:p-10 md-py-4 p-8 py-2"> 
						<h1 class=" text-sm font-semibold py-2">Applications</h1>
						<h1 class=" text-2xl md:text-4xl font-semibold text-end    ">{{$application}}</h1>
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

			<div class=" md:w-1/2 w-full flex   flex-col">
				<h1 class=" text-[#061751]  text-lg font-semibold pb-3">Upcoming Delegations</h1>

			<div class=" bg-white shadow-md rounded-md h-full w-full   md:p-10 p-8">
				<div class=" md:flex-row flex flex-col justify-between">
					<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Events</h1>
					<h1 class=" text-2xl  font-medium ">{{$upcomingevent}}</h1>
				</div>
				<div class=" md:flex-row flex flex-col justify-between">
					<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Applications</h1>
					<h1 class=" text-2xl  font-medium ">{{$up_ap}}</h1>
				</div>
				<div class=" md:flex-row flex flex-col justify-between">
					<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Selected Applications</h1>
					<h1 class=" text-2xl  font-medium ">{{$up_selected}}</h1>
				</div>
				<div class=" md:flex-row flex flex-col justify-between">
					<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Rejected Applications</h1>
					<h1 class=" text-2xl  font-medium ">{{$up_rejected}}</h1>
				</div>
				<div class=" md:flex-row flex flex-col justify-between">
					<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Payment Completed</h1>
					<h1 class=" text-2xl  font-medium ">{{$up_payment}}</h1>
				</div>
			</div> 
			</div>
			

		 </div> --}}
		
	 </div>


   
	{{-- <div class=" px-4 gap-4 w-full flex md:flex-row flex-col py-4">
		<div class=" bg-[#5886ff] rounded-md text-white  md:p-10 p-8 md:w-2/3 w-full flex flex-col">
			<h1 class=" text-white md:text-2xl text-xl font-semibold pb-4">Delegation Details</h1>
			<div class=" grid grid-cols-3  gap-4 ">
				<div>
					<h1 class=" text-sm font-semibold py-2">Events</h1>
					<h1 class=" text-2xl md:text-4xl font-semibold ">{{$eventdetails}}</h1>
				</div>
				<div>
					<h1 class=" text-sm font-semibold py-2">Applications</h1>
					<h1 class=" text-2xl md:text-4xl font-semibold ">{{$application}}</h1>
				</div>
				<div>
					<h1 class=" text-sm font-semibold py-2">Selected Applications</h1>
					<h1 class=" text-2xl md:text-4xl font-semibold ">{{$selected}}</h1>
				</div>
				<div>
					<h1 class=" text-sm font-semibold py-2">Rejected Applications</h1>
					<h1 class=" text-2xl md:text-4xl font-semibold ">{{$rejected}}</h1>
				</div>

				<div>
					<h1 class=" text-sm font-semibold py-2">Payment Completed</h1>
					<h1 class=" text-2xl md:text-4xl font-semibold ">{{$payment}}</h1>
				</div>
				
			</div>
		</div>
		<div class=" bg-white rounded-md md:p-10 p-8 md:w-1/3 w-full flex  flex-col">
			<h1 class=" md:text-2xl text-xl  pb-4 text-[#3058bd]  font-medium">Upcoming Delegations</h1>

		

			<div class=" md:flex-row flex flex-col justify-between">
				<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Events</h1>
				<h1 class=" text-2xl  font-medium ">{{$upcomingevent}}</h1>
			</div>
			<div class=" md:flex-row flex flex-col justify-between">
				<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Applications</h1>
				<h1 class=" text-2xl  font-medium ">{{$up_ap}}</h1>
			</div>
			<div class=" md:flex-row flex flex-col justify-between">
				<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Selected Applications</h1>
				<h1 class=" text-2xl  font-medium ">{{$up_selected}}</h1>
			</div>
			<div class=" md:flex-row flex flex-col justify-between">
				<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Rejected Applications</h1>
				<h1 class=" text-2xl  font-medium ">{{$up_rejected}}</h1>
			</div>
			<div class=" md:flex-row flex flex-col justify-between">
				<h1 class=" text-sm text-[#1e6579] font-medium  py-4">Payment Completed</h1>
				<h1 class=" text-2xl  font-medium ">{{$up_payment}}</h1>
			</div>
		</div>
	</div> --}}

	<div class=" flex md:flex-row flex-col px-4">
		<div class=" w-full">
			<livewire:admin.dashboard.applicationtable />

		</div>
		<div>

		</div>
	</div>
</div>



<div class=" flex items-end ">

</div>


