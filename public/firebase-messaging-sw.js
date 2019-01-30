importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');
var config = {
    apiKey: "AIzaSyB8SajOEHvnvQANd9k5lRPOHBmnMXrbVT4",
    authDomain: "service-worker-88880.firebaseapp.com",
    databaseURL: "https://service-worker-88880.firebaseio.com",
    projectId: "service-worker-88880",
    storageBucket: "service-worker-88880.appspot.com",
    messagingSenderId: "48970969123"
};
firebase.initializeApp(config);

var messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    var notificationTitle = 'Background Message Title';
    var notificationOptions = {
        body: 'Background Message body.',
        icon: 'https://images.techhive.com/images/article/2016/06/messages-ios-icon-100667645-large.jpg'
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});