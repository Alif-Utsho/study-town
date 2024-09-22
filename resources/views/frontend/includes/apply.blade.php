<div class="row mt-4 gapp">
    <div class="col-lg-7 m-auto">
        <div class="form-container">



            <form action="{{ route('application.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Enter your name:*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Enter your email address:*</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number*</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="UK Number">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="city">Which City?</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" placeholder="Your city name">
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Your Current Status in UK*</label><br>
                    @foreach(['British', 'Settlement', 'Pre-settlement', 'Refugee'] as $status)
                    <div class="form-check">
                        <input class="form-check-input @error('resident') is-invalid @enderror" type="radio" id="{{ strtolower($status) }}" value="{{ $status }}" name="resident" {{ old('resident') == $status ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ strtolower($status) }}">{{ $status }}</label>
                    </div>
                    @endforeach
                    @error('resident')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Which course are you interested in?</label><br>
                    @foreach($application_courses as $course)
                    <div class="form-check">
                        <input class="form-check-input @error('course') is-invalid @enderror" type="radio" id="{{ $loop->iteration }}" value="{{ $course->name }}" name="course" {{ old('course') == $course->name ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $loop->iteration }}">{{ $course->name }}</label>
                    </div>
                    @endforeach
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="other" value="other" name="course" onclick="toggleOtherField()" {{ old('course') == 'other' ? 'checked' : '' }}>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    @error('course')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div id="otherField" style="display: none; margin-top: 10px;" class="form-group">
                    <label for="calltime">Specify your desired course</label>
                    <input type="text" class="form-control" placeholder="Please specify" name="other_course">
                </div>
                <div class="form-group">
                    <label for="message">Enter your message:</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Your message here"></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

</div>