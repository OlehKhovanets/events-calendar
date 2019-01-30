@extends('layouts.main')
<script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.1.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.1.0/firebase-messaging.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyB8SajOEHvnvQANd9k5lRPOHBmnMXrbVT4",
        authDomain: "service-worker-88880.firebaseapp.com",
        databaseURL: "https://service-worker-88880.firebaseio.com",
        projectId: "service-worker-88880",
        storageBucket: "service-worker-88880.appspot.com",
        messagingSenderId: "48970969123"
    };
    firebase.initializeApp(config);

    const messaging = firebase.messaging();
    messaging.requestPermission()
        .then(function () {
            console.log('Have permission');
            return messaging.getToken();
        })
        .then(function (token) {
            console.log(token);

            $.ajax({url: "/save-fcm",
                data: {
                    'token' : token
                },
                method: 'post',
                success: function(result){

                }});
        })
        .catch(function (err) {
            console.log(err);
        });

    messaging.onMessage(function (payload) {
        console.log('onMessage: ', payload.data);

    });
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form action="/home" method="GET">
                        <label>Search</label>
                        <input type="text" name="search">
                        <button type="submit">search</button>
                    </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! $calendar->script() !!}
@stop