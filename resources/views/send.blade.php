<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeNest SMS App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('send.sms') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="provider" class="form-label">Provider</label>
                        <select id="provider" name="provider" class="form-select" required>
                            <option value="twilio">Twilio</option>
                            <option value="nexmo">Nexmo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Send SMS</button>
                </form>

                @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('status') }}
                </div>
    @endif

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>