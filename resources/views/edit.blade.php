@include('layouts.header')

<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-6 col-xl-5 order-2 order-lg-1">


                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">User Edit</p>
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form class="mx-3 my-3 mx-md-6 " method="POST"
                                    action="{{ route('users.update', $user->id) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0 col-6 me-3">
                                            <label class="form-label" for="form3Example1c" for="name">First
                                                Name</label>
                                            <x-input id="first_name" class="block mt-1 w-full form-control"
                                                type="text" value="{{ $user->first_name }}" name="first_name"
                                                autofocus />
                                            <div id="f_name_error"></div>


                                        </div>
                                        <div class="form-outline flex-fill mb-0 col-6">
                                            <label class="form-label" for="form3Example1c" for="name">Last
                                                Name</label>
                                            <x-input id="last_name" class="block mt-1 w-full form-control"
                                                type="text" value="{{ $user->last_name }}" name="last_name"
                                                autofocus />
                                            <div id="l_name_error"></div>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <x-input id="email" class="block mt-1 w-full form-control"
                                                type="email" value="{{ $user->email }}" name="email" />
                                            <div id="email_error"></div>

                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4 mx-5">

                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="exampleRadios1" value="Male"
                                                @if ($user->gender == 'Male') checked @endif>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="exampleRadios2" value="Female"
                                                @if ($user->gender == 'Female') checked @endif>
                                            <label class="form-check-label" for="Female">
                                                Female
                                            </label>
                                        </div>

                                    </div>
                                    <div id="gender_error"></div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-map fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-control" aria-label="Default select example"
                                                name="country">
                                                <option selected>Select country</option>
                                                <option value="India"
                                                    @if ($user->country == 'India') selected @endif>
                                                    India</option>
                                                <option value="USA"
                                                    @if ($user->country == 'USA') selected @endif>USA
                                                </option>
                                                <option value="UAE"
                                                    @if ($user->country == 'UAE') selected @endif>UAE
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="country_error"></div>

                                    <div class="d-flex justify-content-center ms-3 mb-3 mb-lg-4">
                                        <x-button type="submit" class="btn btn-primary col-12">{{ __('Save') }}
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
<script type="text/javascript">
    function validateForm() {
        var eL = document.forms["user_reg"]["email"].value
        var fN = document.forms["user_reg"]["first_name"].value
        var lN = document.forms["user_reg"]["last_name"].value
        var gR = document.forms["user_reg"]["gender"].value
        var cY = document.forms["user_reg"]["country"].value
        var atpos = eL.indexOf("@");
        var dotpos = eL.lastIndexOf(".");

        if (fN.length <= 2) {
            document.getElementById("f_name_error").innerHTML="Not a valid first name";
            return false;
        }

        if (lN.length <= 2) {
            document.getElementById("l_name_error").innerHTML="Not a valid last name";
            return false;
        }
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= eL.length) {
            document.getElementById("email_error").innerHTML = "Not a valid e-mail address";
            return false;
        }
        if (gR.length <= 2) {
            document.getElementById("gender_error").innerHTML = "Select gender";
            return false;
        }

        if (cY.length <= 2) {
            document.getElementById("country_error").innerHTML = "Select country";
            return false;
        }

    }

    {{-- </x-auth-card>
</x-guest-layout> --}}
    @include('layouts.footer')
