<form action="{{ route('appointment.submit') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="appointment-date" class="form-label">Preferred Appointment Date</label>
        <input type="date" class="form-control" id="appointment-date" name="date" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>