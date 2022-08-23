@include('layouts.header')

<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5 order-2 order-lg-1">


                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">User Registration</p>
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form class="mx-3 my-3 mx-md-6 " id="user_reg" method="POST"
                                    action="{{ route('register') }}">
                                    @csrf

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0 col-6 me-3">
                                            <label class="form-label" for="form3Example1c" for="name">First
                                                Name</label>
                                            <x-input id="first_name" class="block mt-1 w-full form-control"
                                                type="text" name="first_name" :value="old('first_name')" autofocus />


                                        </div>
                                        <div class="form-outline flex-fill mb-0 col-6">
                                            <label class="form-label" for="form3Example1c" for="name">Last
                                                Name</label>
                                            <x-input id="last_name" class="block mt-1 w-full form-control"
                                                type="text" name="last_name" :value="old('last_name')" autofocus />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <x-input id="email" class="block mt-1 w-full form-control"
                                                type="email" name="email" :value="old('email')" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <x-input id="password" class="block mt-1 w-full form-control"
                                                autocomplete="new-password" name="password" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                            <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                                type="password" name="password_confirmation" />
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 mx-5">

                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="exampleRadios1" value="Male">
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="exampleRadios2" value="Female">
                                            <label class="form-check-label" for="Female">
                                                Female
                                            </label>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 ms-3">
                                        <select class="form-control" aria-label="Default select example" name="country">
                                            <option selected>Select country</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="UAE">UAE</option>
                                        </select>
                                    </div>

                                    <div class="form-check d-flex mx-3 mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="Yes"
                                            id="form2Example3c" name="terms" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="#!">Terms of service</a>
                                        </label>
                                    </div>
                                    <div class="form-check d-flex mx-3 mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="Yes"
                                            name="newsletter" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I want toreceive the newsletter
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center ms-3 mb-3 mb-lg-4">
                                        <x-button type="submit" class="btn btn-primary col-12">{{ __('Register') }}
                                        </x-button>
                                    </div>
                                    <div class="d-flex justify-content-center ms-3 mb-3 mb-lg-4">
                                        <a href="{{ url()->previous() }}" class="btn btn-warning col-12">Back</a>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $("#user_reg").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                email: "required",
                password: "required",
                confirmPassword: "required",
                gender: "required",
                country: "country",
                terms: "required",
            },
            messages: {
                first_name: "First name is required",
                last_name: "Last name is required",
                email: "Email is required",
                email: "Phone number is required",
                // password: "Password is required",
                // confirmPassword: "Confirm password is required",
                // gender: "Please select the gender",
                // dateOfBirth: "Date of birth is required",
                // address: "Address is required",
                // city: "City is required",
                // state: "State is required",
                // zipcode: "Zipcode is required",
            }
        });
    });
</script>

{{-- </x-auth-card>
</x-guest-layout> --}}
@include('layouts.footer')
