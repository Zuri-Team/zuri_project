<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
</head>

<body>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
    @elseif (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1>Your Polytechnic Diploma Awaits</h1>
    <form action="{{ route('student') }}" method="post" autocomplete="off">
        @csrf
        <div>
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" placeholder="e.g.john" required><br>

            @error('firstname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div><br><br>

        <div>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" placeholder="e.g.doe" required><br>
            @error('lastname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div><br><br>

        <div>
            <label for="Email">Email</label>
            <input type="email" name="email" placeholder="e.g.johndoe@gmail.com" required><br>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div><br><br>

        <div>
            <label for="phone">Phone Number</label>
            <input type="number" name="phone_number" placeholder="e.g.+1(555)0000-0000" required><br>
            @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div><br><br>
        <div>
            <label for="degree">Which Degree are you interested in?</label>
            <select type="text" name="degree" id="">
                <option value="none">Select one....</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Computer Engineering">Computer Engineering</option>
                <option value="Software Engineering">Software Engineering</option>
            </select><br>

            @error('degree')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div><br><br>

        <div>
            <label for="requirement">Do you have all the enrollment requirement?</label>
            <select type="text" name="requirement" id="">
                <option value="none">Select one....</option>
                <option value="Yes, i do">Yes, i do</option>
                <option value="No, i Dont">No, i Dont</option>
            </select><br>
            @error('requirement')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div><br><br>

        <button type="submit" name="register">Submit</button>
    </form>
</body>

</html>
