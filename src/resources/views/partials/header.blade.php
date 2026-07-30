<header id="menu-bar">
    <a href="/">
        <div class="logo">
            <img src="{{ asset('logo.png') }}" alt="logo" style="width: var(--logo-width);">
            <p>Cineteatro</br>A. Manzoni</p>
        </div>
    </a>

    <div class="mobile-cta">
        <button id="open-menu-btn" class="text-button">
            Menù
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-menu-icon lucide-menu">
                <path d="M4 5h16" />
                <path d="M4 12h16" />
                <path d="M4 19h16" />
            </svg>
        </button>
        <button id="close-menu-btn" class="text-button">
            Chiudi
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-x-icon lucide-x">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
    </div>


    @include('partials.navbar')
</header>
