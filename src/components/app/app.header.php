<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!defined("routeMain")) define("routeMain", "http://localhost/joboffer-project/");
?>

<div class="border-b-[1px] sticky top-0 z-50 bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8  ">
        <div class="flex lg:flex-1">
            <a href="<?php echo routeMain; ?>index.php" class="-m-1.5 p-1.5">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" id="btn-open">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="#" class="text-base font-semibold leading-6 text-gray-900">Ofertas</a>
            <a href="#" class="text-base font-semibold leading-6 text-gray-900">Blog</a>
            <a href="#" class="text-base font-semibold leading-6 text-gray-900">Contáctanos</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-5">

            <?php if (!isset($_SESSION['id_rol_user']) || (isset($_SESSION['id_rol_user']) && $_SESSION['id_rol_user'] != 3)) : ?>
                <a href="<?php echo routeMain; ?>src/components/auth/login.php" class="inline-flex items-center rounded-md bg-white px-5 py-3 text-sm font-semibold text-gray-900 shadow-lg ring-1 ring-inset ring-gray-300 hover:bg-gray-50 cursor-pointer">
                    Acceder
                </a>
                <a href="<?php echo routeMain; ?>src/components/auth/signup.php" class="inline-flex items-center rounded-md bg-indigo-600 px-8 py-3 text-sm font-semibold text-white shadow-lg hover:bg-indigo-500 cursor-pointer">
                    Registrar
                </a>
            <?php endif; ?>
            <?php if (isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated'] === true && $_SESSION['id_rol_user'] === 3) : ?>

                <button class=" flex  items-center">
                    <ion-icon name="mail-outline" class="text-[28px]"></ion-icon>
                </button>
                <div class="flex">
                    <div class="flex items-center">
                        <img class="rounded-full h-10 w-10" src="https://loremflickr.com/g/600/600/boy">
                        <div class="ml-2 flex flex-col">
                            <div class="leading-snug text-sm text-gray-900 font-bold"><?php echo $_SESSION["username_user"] ?></div>
                            <div class="leading-snug text-xs text-gray-600"><?php echo $_SESSION["name_rol_user"] ?></div>
                        </div>
                    </div>
                    <!-- -------------------- -->
                    <div class="hs-dropdown relative inline-flex">
                        <button id="btn-dorpdown-open" class="ml-4 py-3 px-1 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-white text-gray-800 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="flex-none size-6 text-gray-600 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="5" r="1" />
                                <circle cx="12" cy="19" r="1" />
                            </svg>
                        </button>

                        <div id="dropdown-menu" class="dropdown-menu hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200">
                            <div class="py-2 first:pt-0 last:pb-0">
                                <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-500">
                                    Settings
                                </span>
                                <a class="btn-items flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                                    </svg>
                                    Newsletter
                                </a>
                                <a class="btn-items flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="8" cy="21" r="1" />
                                        <circle cx="19" cy="21" r="1" />
                                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                    </svg>
                                    Purchases
                                </a>
                                <a class="btn-items flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                        <path d="M12 12v9" />
                                        <path d="m8 17 4 4 4-4" />
                                    </svg>
                                    Downloads
                                </a>
                                <a class="btn-items flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    Team Account
                                </a>
                            </div>
                            <div class="py-2 first:pt-0 last:pb-0">
                                <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-500">
                                    Contacts
                                </span>
                                <a href="<?php echo routeMain; ?>src/services/auth-service/logout-service.php" class="btn-items flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                        <line x1="9" x2="15" y1="10" y2="10" />
                                        <line x1="12" x2="12" y1="7" y2="13" />
                                    </svg>
                                    Contact support
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


        </div>
    </nav>
</div>

<!-- Mobile menu, show/hide based on menu open state. -->
<div class="hidden" id="menu-mobile">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 z-10 bg-gray-500 opacity-25 "></div>
    <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 ">
        <div class="flex items-center justify-between">
            <a href="#" class="-m-1.5 p-1.5">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" id="btn-cloce">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                    <div class="-mx-3">
                        <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" id="btn-drop-togle">
                            Product
                            <div class="rotation-icon">
                                <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" />
                                </svg>
                            </div>
                        </button>
                        <!-- 'Product' sub-menu, show/hide based on menu state. -->
                        <div class="hidden mt-2 space-y-2" id="drop-mobile">
                            <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>
                            <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>
                            <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>
                        </div>
                    </div>
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                </div>
                <div class="py-6 flex items-center justify-center mx-auto">
                    <div class="flex flex-col sm:flex-row  items-center justify-between w-full  gap-5">
                        <a type="button" class="text-center rounded-md bg-white px-12 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 cursor-pointer">
                            Acceder
                        </a>

                        <a type="button" class="text-center rounded-md bg-indigo-600 px-12 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">
                            Registrar
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .rotation-icon {
        transition: all 0.2s ease;
    }

    .rotation-icon.active {
        transform: rotate(180deg);
    }

    #menu-mobile {
        position: sticky;
        top: 0;
        z-index: 50;
        /* Ajusta el valor según sea necesario para que el menú esté por encima de otros elementos */
    }

    .dropdown-menu {
        position: absolute;
        top: 50px;
        right: 16px;
    }

    .dropdown-menu.drop {
        display: block;
        opacity: 1;
    }

    .tab-button.active {
        background-color: #fff;
        color: rgb(67 56 202);
        border-color: rgb(67 56 202);
    }
</style>
<script>
    // funtions - menu mobile
    const buttonOpen = document.getElementById('btn-open');
    const buttonClose = document.getElementById('btn-cloce');
    const menuMobile = document.getElementById('menu-mobile');

    buttonOpen.addEventListener('click', openMenuMobile);
    buttonClose.addEventListener('click', closeMenuMobile);

    function openMenuMobile() {
        menuMobile.classList.remove('hidden');
        menuMobile.classList.add('block');
    }

    function closeMenuMobile() {
        menuMobile.classList.remove('block');
        menuMobile.classList.add('hidden');
    }

    // funtions - dropMenu
    const btnDropTogle = document.getElementById('btn-drop-togle');
    const dropMobile = document.getElementById('drop-mobile');
    const icon = document.querySelector('.rotation-icon');

    btnDropTogle.addEventListener('click', togleDropDown);

    function togleDropDown() {
        dropMobile.classList.toggle('hidden')
        icon.classList.toggle('active');
    }



    let btnDropdownOpen = document.getElementById('btn-dorpdown-open');
    let dropdownMenu = document.getElementById('dropdown-menu');

    if (btnDropdownOpen !== null && btnDropdownOpen !== undefined) {
        btnDropdownOpen.addEventListener('click', () => {
            dropdownMenu.classList.toggle('drop');
        });
        let btnItems = document.querySelectorAll('.btn-items');
        btnItems.forEach(itembtn => {
            itembtn.addEventListener('click', () => {
                dropdownMenu.classList.remove('drop');
            })
        })
    }
</script>