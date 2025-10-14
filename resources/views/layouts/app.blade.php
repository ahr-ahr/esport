<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Esport Platform')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    @stack('styles')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Pakai compat version (UMD Global Namespace) -->
    <!-- Firebase SDK (modular version) -->
    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/12.0.0/firebase-app.js";
        import {
            getMessaging,
            getToken,
            onMessage
        } from "https://www.gstatic.com/firebasejs/12.0.0/firebase-messaging.js";

        const firebaseConfig = {
            apiKey: "AIzaSyB3DuuKqTwsgWST2UmNz3MLfj8rN32vA3E",
            authDomain: "e-sport-5e83a.firebaseapp.com",
            projectId: "e-sport-5e83a",
            storageBucket: "e-sport-5e83a.appspot.com",
            messagingSenderId: "266396771778",
            appId: "1:266396771778:web:ddcfb1cd27ddadfa14e25b",
            measurementId: "G-1DDJSJ145M"
        };

        const app = initializeApp(firebaseConfig);
        const messaging = getMessaging(app);

        // Daftarkan service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/firebase-messaging-sw.js')
                .then(async (registration) => {
                    console.log('✅ Service Worker registered');

                    const permission = await Notification.requestPermission();
                    if (permission === 'granted') {
                        const token = await getToken(messaging, {
                            vapidKey: "BJL0R9-8i9CllH64t0jkeeQ7fp5eTWYL7BMYj7RKz-Re-P7Wravzabc_MnzPcQAlLOO3sWUkFa3AgxS2NK2Rep0",
                            serviceWorkerRegistration: registration
                        });

                        console.log('✅ FCM Token:', token);
                        // TODO: Kirim token ke server
                    } else {
                        console.warn('🚫 Izin notifikasi ditolak');
                    }
                })
                .catch(err => {
                    console.error('❌ Gagal register service worker:', err);
                });

            // Opsional: tangani pesan saat tab aktif
            onMessage(messaging, (payload) => {
                console.log("📩 Pesan diterima saat foreground:", payload);
            });
        }
    </script>

    <style>
        body {
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>

<body class="bg-[#1e1e1e] font-sans">
    @include('components.header')

    <main class="bg-[#1e1e1e]">
        @yield('content')
    </main>

    @include('components.navbar')

    @include('components.footer')
</body>

</html>