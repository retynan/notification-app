<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Notifications - Update Notification</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand" href={{ route('notification.index') }}>Notifications</a>
    </div>
</nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Notification</h3>
            <form action="{{ route('notification.update', $notification->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label class="mb-2" for="title">To</label>
                    <input type="text" class="form-control" id="to" name="to"
                           value="{{ $notification->to }}" required>
                </div>
                <div class="form-group mb-2">
                    <label class="mb-2" for="body">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="3" required>{{ $notification->body }}</textarea>
                </div>
                <div class="form-group mb-2">
                    <label class="mb-2" for="type">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option @if ($notification->type == 'sms') selected @endif value="sms">SMS</option>
                        <option @if ($notification->type == 'telegram') selected @endif value="telegram">Telegram</option>
                    </select>
                </div>
                <button type="submit" class="btn mt-3 btn-primary">Update Notification</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
