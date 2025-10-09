<x-guest-layout-2>

<div class="container mx-auto max-w-4xl">

	<div class="row justify-content-md-center">
			<div class="col-md-12 text-center">
				<h5><strong>New Private Institution Approval Application</strong></h5>
			</div>
			<p>&nbsp;</p>
						<div class="row justify-content-md-center">
				<div class="col-md-10 clearfix text-center">
					<p>Kindly fill in the short form below to create an account for use on this portal.
					Please ensure to use a valid email address because your portal login details will be sent to the email address you provide.
					<br><b>All fields are compulsory</b>.</p>
					<br>
				</div>
			</div>
		</div>
	<form action="{{route('signup.store')}}" class=" " method="post">

		@csrf

								<div class="row">
					<div class="form-group col-md-6">
						<label>Title</label>
						<select class="form-control" required="required" name="title"><option value="" selected="selected">Select Title</option><option value="1">Alhaji</option><option value="2">Ambassador</option><option value="3">Chief</option><option value="4">Comrade</option><option value="5">Dr</option><option value="6">Elder</option><option value="7">Engineer</option><option value="8">Hajya</option><option value="9">Honourable</option><option value="10">Igwe</option><option value="11">Inspector</option><option value="12">Madamme</option><option value="13">Mallam</option><option value="14">Miss</option><option value="15">Mr</option><option value="22">Pastor</option><option value="16">Professor</option><option value="17">Reverend</option><option value="18">Senator</option><option value="19">Sir</option><option value="20">Surveyor</option><option value="21">Unknown</option></select>
					</div>
					<div class="form-group col-md-6">
						<label>Surname</label>
						<input autocomplete="off" class="form-control" name="surname" placeholder="Eg. Ogbemudia" required="required" value="">
					</div>
					<div class="form-group col-md-6">
						<label>Other Names</label>
						<input autocomplete="off" class="form-control" name="other_names" placeholder="Eg. Bright" required="required" value="">
					</div>
					<div class="form-group col-md-6">
						<label>Phone Number</label>
						<input autocomplete="off" class="form-control" name="phone_number" placeholder="Eg. 09091231234" required="required" value="" type="tel">
					</div>
					<div class="form-group col-md-6">
						<label>Email Address</label>
						<input autocomplete="off" class="form-control" name="email" placeholder="Eg. john.doe@gmail.com" required="required" value="" type="email">
					</div>
					
					<div class="form-group col-md-6">
						<label>Tax Identification Number (TIN)</label>
						<input autocomplete="off" class="form-control" name="tin" required="required" value="">
					</div>
					<div class="form-group col-md-6">
						<label>National Identification Number (NIN)</label>
						<input autocomplete="off" class="form-control" name="nin" value="">
					</div>

					<!--<div class="form-group col-md-6">
						<label>Password</label>
						<input autocomplete="off" class="form-control" name="password" placeholder="Consider a strong password" required="required" type="password">
					</div>
					<div class="form-group col-md-6">
						<label>Retype Password</label>
						<input autocomplete="off" class="form-control" name="password_confirmation" placeholder="Please enter password again" required="required" type="password">
					</div>-->

				</div>



<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Password Field -->
    <div x-data="{ show: false }" class="flex flex-col space-y-1">
        <label class="text-sm font-medium text-gray-700">Password</label>
        <div class="relative">
            <input
                :type="show ? 'text' : 'password'"
                autocomplete="off"
                name="password"
                placeholder="Consider a strong password"
                required
                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            <button
                type="button"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800 focus:outline-none"
                @click="show = !show"
            >
                <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
            </button>
        </div>
    </div>

    <!-- Confirm Password Field -->
    <div x-data="{ show: false }" class="flex flex-col space-y-1">
        <label class="text-sm font-medium text-gray-700">Retype Password</label>
        <div class="relative">
            <input
                :type="show ? 'text' : 'password'"
                autocomplete="off"
                name="password_confirmation"
                placeholder="Please enter password again"
                required
                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            <button
                type="button"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800 focus:outline-none"
                @click="show = !show"
            >
                <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
            </button>
        </div>
    </div>
</div>

				&nbsp;
				<div class="row">
					<div class="form-group col-md-4"></div>
					<div class="form-group col-md-4">
						<button class="btn btn-warning btn-block text-center">Sign Up</button>
					</div>
				</div>

			</form>


</div>
</x-guest-layout-2>
