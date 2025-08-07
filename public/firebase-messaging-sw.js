importScripts(
    "https://www.gstatic.com/firebasejs/10.3.0/firebase-app-compat.js"
);
importScripts(
    "https://www.gstatic.com/firebasejs/10.3.0/firebase-messaging-compat.js"
);

firebase.initializeApp({
    apiKey: "AIzaSyB3DuuKqTwsgWST2UmNz3MLfj8rN32vA3E",
    authDomain: "e-sport-5e83a.firebaseapp.com",
    projectId: "e-sport-5e83a",
    storageBucket: "e-sport-5e83a.appspot.com",
    messagingSenderId: "266396771778",
    appId: "1:266396771778:web:ddcfb1cd27ddadfa14e25b",
});

const messaging = firebase.messaging();

// ✅ Notifikasi ketika halaman TIDAK AKTIF
messaging.onBackgroundMessage(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Background message received:",
        payload
    );

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: "/icon.png", // ganti dengan icon kamu jika perlu
        data: payload.data,
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
});

// ✅ Tangani klik notifikasi (opsional)
self.addEventListener("notificationclick", function (event) {
    event.notification.close();
    event.waitUntil(
        clients.openWindow("/") // redirect ke home, bisa diganti rute lain
    );
});
