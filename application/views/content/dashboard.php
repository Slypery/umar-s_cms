<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the navbar links
        const navLinks = document.querySelectorAll(".nav-link");

        // Attach a click event listener to each navbar link
        navLinks.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default anchor click behavior
                const targetId = this.getAttribute("href"); // Get the target section's ID
                const target = document.querySelector(targetId); // Find the target section element
                if (target) {
                    scrollToTarget(target); // Scroll to the target section
                }
            });
        });

        // Function to smoothly scroll to a target element
        function scrollToTarget(target) {
            const offset = target.offsetTop - 50; // Adjust this value based on your navbar's height
            window.scrollTo({
                top: offset,
                behavior: "smooth"
            });
        }
    });
</script>
<script>
    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) {
            document.getElementById('navbar').classList.remove("bg-opacity-20");
            document.getElementById('navbar').classList.add("bg-opacity-100");
        } else {
            document.getElementById('navbar').classList.add("bg-opacity-20");
            document.getElementById('navbar').classList.remove("bg-opacity-100");
        }
    });

    setInterval(() => {
        const navbar = document.getElementById('navbar');
        if (document.getElementById('navbarSupportedContent1').classList.contains("hidden")) {
            navbar.classList.add("bg-opacity-20");
        } else {
            navbar.classList.remove("bg-opacity-20");
        }
    }, 10);
</script>

<!-- Main navigation container -->
<nav id="navbar" class="bg-slate-900 bg-opacity-20 transition-all duration-500 flex-no-wrap fixed flex w-full items-center justify-between py-2 shadow-md shadow-black/5 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4 z-10">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <!-- Hamburger button for mobile view -->
        <button class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 sm:hidden" type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Collapsible navigation container -->
        <div class="!visible hidden flex-grow basis-[100%] items-center sm:!flex sm:basis-auto" id="navbarSupportedContent1" data-te-collapse-item>
            <!-- Logo -->
            <a class=" nav-link mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="#dashboard">
                <img src="<?= base_url('assets/img/brand.png') ?>" class="h-[25px]" alt="CMS" loading="lazy" />
            </a>
            <!-- Left navigation links -->
            <ul class="list-style-none mr-auto flex flex-col pl-0 sm:flex-row" data-te-navbar-nav-ref>
                <li class="mb-4 sm:mb-0 sm:pr-2" data-te-nav-item-ref>
                    <!-- Dashboard link -->
                    <a class="nav-link text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 sm:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400" href="#dashboard" data-te-nav-link-ref>Dashboard</a>
                </li>
                <!-- Team link -->
                <li class="mb-4 sm:mb-0 sm:pr-2" data-te-nav-item-ref>
                    <a class="nav-link text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 sm:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="#about" data-te-nav-link-ref>About</a>
                </li>
                <!-- Projects link -->
                <li class="mb-4 sm:mb-0 sm:pr-2" data-te-nav-item-ref>
                    <a class="nav-link text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 sm:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="#content" data-te-nav-link-ref>Content</a>
                </li>
            </ul>
        </div>

        <!-- Right elements -->
        <div class="relative flex items-center">


            <!-- Second dropdown container -->
            <div class="relative" data-te-dropdown-ref data-te-dropdown-alignment="end">
                <!-- Second dropdown trigger -->
                <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none" href="#" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
                    <!-- User avatar -->
                    <img src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg" class="rounded-full" style="height: 25px; width: 25px" alt="" loading="lazy" />
                </a>
                <!-- Second dropdown menu -->
                <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                    <!-- Second dropdown menu items -->
                    <li>
                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="<?= base_url('admin') ?>" data-te-dropdown-item-ref>login</a>
                    </li>
                    <li>
                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="<?= base_url('auth/sign_up') ?>" data-te-dropdown-item-ref>sign up</a>
                    </li>
                    <li>
                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="<?= base_url('feedback') ?>" data-te-dropdown-item-ref>give us feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div>
    <div id="dashboard" class="relative" data-te-carousel-init data-te-ride="carousel">
        <!--Carousel indicators-->
        <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
            <button type="button" data-te-target="#dashboard" data-te-slide-to="0" data-te-carousel-active class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-current="true" aria-label="Slide 1"></button>
            <!-- <button type="button" data-te-target="#dashboard" data-te-slide-to="1" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 2"></button>
            <button type="button" data-te-target="#dashboard" data-te-slide-to="2" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 3"></button>
            <button type="button" data-te-target="#dashboard" data-te-slide-to="3" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 4"></button> -->
            <?php
            $count = count($carousel_data);
            for ($i = 1; $i < $count; $i++) {
                echo '<button type="button" data-te-target="#dashboard" data-te-slide-to="' . $i . '" class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide ' . ($i + 1) . '"></button>';
            }
            ?>
        </div>

        <!--Carousel items-->
        <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
            <?php
            $hidden = '';
            $data_te_carousel_active = 'data-te-carousel-active';
            foreach ($carousel_data as $i) {
                echo
                '<div class="relative float-left -mr-[100%] ' . $hidden . ' w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" ' . $data_te_carousel_active . ' data-te-carousel-item style="backface-visibility: hidden">
                    <img src="' . base_url('./assets/img/carousel/') . $i['picture'] . '" class="block w-full h-[750px] max-2xl:h-[650px] max-xl:h-[580px] max-lg:h-[550px] max-md:h-[450px] max-sm:h-[350px] object-cover" alt="..." />
                    <div class="absolute inset-x-[15%] bottom-5 py-5 text-center text-white md:block">
                        <h5 class="text-xl">' . $i['title'] . '</h5>
                        <p>' . $i['subtitle'] . '</p>
                    </div>
                </div>';
                $hidden = 'hidden';
                $data_te_carousel_active = '';
            }
            ?>
        </div>

        <!--Carousel controls - prev item-->
        <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#dashboard" data-te-slide="prev">
            <span class="inline-block h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
        </button>
        <!--Carousel controls - next item-->
        <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#dashboard" data-te-slide="next">
            <span class="inline-block h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
        </button>
    </div>


    <div id="about" class="px-6 py-6 bg-slate-500">
        <div class="flex">
            <p class="mx-auto font-semibold text-5xl text-white mb-6"><?= $config_data['about_title'] ?></p>
        </div>
        <p class="text-center text-slate-800"><?= $config_data['about'] ?></p>
        <div class="flex gap-6 mt-5">
            <a href="<?= $config_data['instagram'] ?>" target="/blank" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="rgb(255,255,255)" viewBox="0 0 24 24" id="instagram">
                    <path d="M12,9.52A2.48,2.48,0,1,0,14.48,12,2.48,2.48,0,0,0,12,9.52Zm9.93-2.45a6.53,6.53,0,0,0-.42-2.26,4,4,0,0,0-2.32-2.32,6.53,6.53,0,0,0-2.26-.42C15.64,2,15.26,2,12,2s-3.64,0-4.93.07a6.53,6.53,0,0,0-2.26.42A4,4,0,0,0,2.49,4.81a6.53,6.53,0,0,0-.42,2.26C2,8.36,2,8.74,2,12s0,3.64.07,4.93a6.86,6.86,0,0,0,.42,2.27,3.94,3.94,0,0,0,.91,1.4,3.89,3.89,0,0,0,1.41.91,6.53,6.53,0,0,0,2.26.42C8.36,22,8.74,22,12,22s3.64,0,4.93-.07a6.53,6.53,0,0,0,2.26-.42,3.89,3.89,0,0,0,1.41-.91,3.94,3.94,0,0,0,.91-1.4,6.6,6.6,0,0,0,.42-2.27C22,15.64,22,15.26,22,12S22,8.36,21.93,7.07Zm-2.54,8A5.73,5.73,0,0,1,19,16.87,3.86,3.86,0,0,1,16.87,19a5.73,5.73,0,0,1-1.81.35c-.79,0-1,0-3.06,0s-2.27,0-3.06,0A5.73,5.73,0,0,1,7.13,19a3.51,3.51,0,0,1-1.31-.86A3.51,3.51,0,0,1,5,16.87a5.49,5.49,0,0,1-.34-1.81c0-.79,0-1,0-3.06s0-2.27,0-3.06A5.49,5.49,0,0,1,5,7.13a3.51,3.51,0,0,1,.86-1.31A3.59,3.59,0,0,1,7.13,5a5.73,5.73,0,0,1,1.81-.35h0c.79,0,1,0,3.06,0s2.27,0,3.06,0A5.73,5.73,0,0,1,16.87,5a3.51,3.51,0,0,1,1.31.86A3.51,3.51,0,0,1,19,7.13a5.73,5.73,0,0,1,.35,1.81c0,.79,0,1,0,3.06S19.42,14.27,19.39,15.06Zm-1.6-7.44a2.38,2.38,0,0,0-1.41-1.41A4,4,0,0,0,15,6c-.78,0-1,0-3,0s-2.22,0-3,0a4,4,0,0,0-1.38.26A2.38,2.38,0,0,0,6.21,7.62,4.27,4.27,0,0,0,6,9c0,.78,0,1,0,3s0,2.22,0,3a4.27,4.27,0,0,0,.26,1.38,2.38,2.38,0,0,0,1.41,1.41A4.27,4.27,0,0,0,9,18.05H9c.78,0,1,0,3,0s2.22,0,3,0a4,4,0,0,0,1.38-.26,2.38,2.38,0,0,0,1.41-1.41A4,4,0,0,0,18.05,15c0-.78,0-1,0-3s0-2.22,0-3A3.78,3.78,0,0,0,17.79,7.62ZM12,15.82A3.81,3.81,0,0,1,8.19,12h0A3.82,3.82,0,1,1,12,15.82Zm4-6.89a.9.9,0,0,1,0-1.79h0a.9.9,0,0,1,0,1.79Z"></path>
                </svg>
            </a>
            <a href="<?= $config_data['facebook'] ?>" target="/blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="rgb(255,255,255)" viewBox="0 0 24 24" id="facebook">
                    <path d="M20.9,2H3.1A1.1,1.1,0,0,0,2,3.1V20.9A1.1,1.1,0,0,0,3.1,22h9.58V14.25h-2.6v-3h2.6V9a3.64,3.64,0,0,1,3.88-4,20.26,20.26,0,0,1,2.33.12v2.7H17.3c-1.26,0-1.5.6-1.5,1.47v1.93h3l-.39,3H15.8V22h5.1A1.1,1.1,0,0,0,22,20.9V3.1A1.1,1.1,0,0,0,20.9,2Z"></path>
                </svg>
            </a>
            <a href="<?= $config_data['twitter'] ?>" target="/blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-11 h-11" fill="rgb(255,255,255)" viewBox="0 0 24 24" id="twitter">
                    <path d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z"></path>
                </svg>
            </a>
            <a href="mailto:<?= $config_data['email'] ?>" target="/blank" class="mr-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="rgb(255,255,255)" viewBox="0 0 24 24" id="google">
                    <path d="M22.60229,10.00391a1.00005,1.00005,0,0,0-.98388-.82227H12.2a.99974.99974,0,0,0-1,1V14.0498a.99974.99974,0,0,0,1,1h3.9624a3.65162,3.65162,0,0,1-1.13183,1.1875A5.0604,5.0604,0,0,1,12.2,17.02246a4.93525,4.93525,0,0,1-4.64624-3.4378L7.55347,13.583a4.90382,4.90382,0,0,1,0-3.167l.00024-.00165A4.9356,4.9356,0,0,1,12.2,6.97754,4.37756,4.37756,0,0,1,15.3313,8.19531a1.00053,1.00053,0,0,0,1.39844-.01562L19.5979,5.31152a.99918.99918,0,0,0-.02539-1.43847A10.62342,10.62342,0,0,0,12.2,1,10.949,10.949,0,0,0,2.37134,7.05878l-.00147.00177A10.92175,10.92175,0,0,0,1.2,12a11.07862,11.07862,0,0,0,1.16992,4.93945l.00147.00177A10.949,10.949,0,0,0,12.2,23a10.5255,10.5255,0,0,0,7.29468-2.687l.00073-.00049.00079-.00085.00019-.00013.00006-.00012a10.78575,10.78575,0,0,0,3.30365-8.08386A12.51533,12.51533,0,0,0,22.60229,10.00391ZM12.2,3a8.68219,8.68219,0,0,1,5.2085,1.67285L15.95483,6.126A6.46322,6.46322,0,0,0,12.2,4.97754,6.88648,6.88648,0,0,0,6.21069,8.52832L5.14148,7.69958l-.585-.45367A8.95257,8.95257,0,0,1,12.2,3ZM3.67944,14.90332a9.02957,9.02957,0,0,1,0-5.80664l1.78223,1.38184a6.85381,6.85381,0,0,0,0,3.042ZM12.2,21A8.9528,8.9528,0,0,1,4.5564,16.75391l.37841-.29352,1.27588-.98969A6.88482,6.88482,0,0,0,12.2,19.02246a7.27662,7.27662,0,0,0,3.30573-.75079L17.19739,19.585A8.88989,8.88989,0,0,1,12.2,21Zm6.52588-2.76074-.183-.142L17.16553,17.028a5.60626,5.60626,0,0,0,1.39966-2.79553.9998.9998,0,0,0-.9834-1.18262H13.2V11.18164h7.54883c.03418.3457.05127.69531.05127,1.0459A9.05156,9.05156,0,0,1,18.72583,18.23926Z"></path>
                </svg>
            </a>
        </div>
        <div class="w-full text-center text-sm">address: <?= $config_data['address'] ?></div>
    </div>

    <div id="content" class="bg-slate-100 p-6 text-neutral-800">
        <h1 class="font-medium text-3xl mb-2">Content</h1>
        <div class="flex max-md:block">
            <div>
                Search by title:&nbsp;
                <input type="text" id="search_input" class="border-neutral-300 border-[1px] rounded-md mb-2 mr-2">
            </div>
            <div>
                Sort by:&nbsp;
                <select id="input_sort_by_date" class="border-neutral-300 bg-white border-[1px] h-[26px] pb-1 rounded-md mb-2 mr-2">
                    <option value="newest">newest</option>
                    <option value="oldest">oldest</option>
                    <option value="most_viewed">most viewed</option>
                </select>
            </div>
            <div>
                Category:&nbsp;
                <select id="input_filter_by_category" class="border-neutral-300 bg-white border-[1px] h-[26px] pb-1 rounded-md mb-2">
                    <option value="all">all</option>
                    <?php
                    foreach ($category_data as $i) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="contents_container" class="grid grid-cols-4 max-lg:grid-cols-3 max-md:grid-cols-2 gap-4">

        </div>
        <div id="pagination_navigator" class="flex w-full mt-2 text-gray-500">
            <div class="ml-auto flex">
                <label for="num_of_content" class="mr-2">contents per page:</label>
                <select id="numb_of_contents_to_show" class="border-gray-200 border-[1px] rounded-sm mr-5">

                </select>
                <div class="mr-1" id="pagination_position">showing: 1-6 of 40</div>
                <div class="bg-white border-gray-200 border-[1px] rounded-sm flex select-none">
                    <button class="px-2 pb-[1px] rounded-l-sm hover:bg-neutral-200 duration-300 hidden w-[30px]" id="btn_prev">
                        &laquo;
                    </button>
                    <button class="px-2 pb-[1px] rounded-l-sm bg-neutral-200 text-neutral-300 cursor-default w-[30px]" id="btn_prev_disabled">
                        &laquo;
                    </button>
                    <button class="px-2 pb-[1px] rounded-r-sm hover:bg-neutral-200 duration-300 w-[30px]" id="btn_next">
                        &raquo;
                    </button>
                    <button class="px-2 pb-[1px] rounded-r-sm bg-neutral-200 text-neutral-300 cursor-default hidden w-[30px]" id="btn_next_disabled">
                        &raquo;
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="contents_data" class="hidden">
        <?php
        foreach ($contents_data as $i) {
            echo '<div>';
            echo '<img src="' . base_url('assets/img/content/' . $i['picture']) . '" class="w-full h-[175px] object-cover rounded-t-lg" alt="">';
            echo '<div class="p-4 h-[calc(100%-175px)] flex flex-col">';
            echo '<div class="category">' . $category_data[$i['category_id']] . '</div>';
            echo '<h1 class="content-title text-xl font-semibold">' . $i['title'] . '</h1>';
            echo '<div class="flex text-sm text-neutral-400 mb-3"><div class="views">' . $i['view_count'] . '</div>&nbsp;views</div>';
            echo '<div class="text-sm sm:flex mt-auto">' . DateTime::createFromFormat('Y-m-d', $i['date'])->format('d M Y') . '<div class="ml-auto">Creator: ' . $i['creator'] . '</div></div>';
            echo '<div class="date hidden">' . $i['date'] . '</div>';
            echo '<a class="text-sm text-blue-700 underline hover:text-purple-500" href="content?content_id=' . $i['content_id'] . '">read full page...</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let card_content_prefix = '<div class="bg-white drop-shadow-lg rounded-lg text-black">';
            let card_content_suffix = '</div>';
            var numb_of_contents_to_show = 8;

            let contents_container = document.getElementById('contents_container');
            let contents_data_source = Array.from(document.querySelectorAll('#contents_data > div'));
            let contents_data = contents_data_source;

            document.getElementById('contents_data').remove();
            var contents_to_show_index = 0;

            let btn_next = document.getElementById('btn_next');
            let btn_next_disabled = document.getElementById('btn_next_disabled');
            let btn_prev = document.getElementById('btn_prev');
            let btn_prev_disabled = document.getElementById('btn_prev_disabled');
            let pagination_position = document.getElementById('pagination_position');
            let numb_of_contents_to_show_input = document.getElementById('numb_of_contents_to_show');

            function show_contents(contents_array_to_show) {
                var contents_to_show = [];
                var contents_length = contents_array_to_show.length;
                if (contents_length == 0) {
                    contents_container.innerHTML = 'no results found';
                } else {
                    var length = numb_of_contents_to_show;
                    for (let i = 0; i < length; i++) {
                        if (contents_array_to_show[i + contents_to_show_index] != null) {
                            contents_to_show.push(card_content_prefix + contents_array_to_show[i + contents_to_show_index].innerHTML + card_content_suffix);
                        };
                    };
                    contents_container.innerHTML = contents_to_show.join(' ');
                    var showed_end_position = contents_to_show_index + numb_of_contents_to_show;
                    if (contents_to_show_index == 0) {
                        btn_prev.classList.add('hidden');
                        btn_prev_disabled.classList.remove('hidden');
                        if (numb_of_contents_to_show >= contents_length) {
                            btn_next.classList.add('hidden');
                            btn_next_disabled.classList.remove('hidden');
                        } else {
                            btn_next.classList.remove('hidden');
                            btn_next_disabled.classList.add('hidden');
                        };
                    } else if (contents_to_show_index + numb_of_contents_to_show >= contents_length) {
                        btn_next.classList.add('hidden');
                        btn_next_disabled.classList.remove('hidden');
                        showed_end_position = contents_length;
                    };

                    if (numb_of_contents_to_show >= contents_length) {
                        showed_end_position = contents_length;
                    };
                    pagination_position.innerHTML = 'showing: ' + (contents_to_show_index + 1) + '-' + showed_end_position + ' of ' + contents_length;
                };
            };

            show_contents(contents_data);

            // search system
            let search_input = document.getElementById('search_input');
            var filtered_contents = [];
            var search_status = 0;

            function search(element) {
                var keyword = element.value;
                filtered_contents = contents_data.filter(element2 => {
                    const contentTitle = element2.querySelector('.content-title').textContent.toLowerCase();
                    const lowercaseKeyword = keyword.toLowerCase();
                    return contentTitle.includes(lowercaseKeyword);
                });
                if (filtered_contents.length <= numb_of_contents_to_show) {
                    btn_next.classList.add('hidden');
                    btn_next_disabled.classList.remove('hidden');
                } else {
                    btn_next.classList.remove('hidden');
                    btn_next_disabled.classList.add('hidden');
                };
                contents_to_show_index = 0;
                show_contents(filtered_contents);
            }
            search_input.addEventListener('keyup', element => {
                search(element.currentTarget);
                search_status = 1;
            });

            // pagination system

            btn_next.addEventListener('click', () => {
                contents_to_show_index += numb_of_contents_to_show;
                btn_prev.classList.remove('hidden');
                btn_prev_disabled.classList.add('hidden');
                if (search_status == 0) {
                    show_contents(contents_data);
                } else {
                    show_contents(filtered_contents);
                };
            });
            btn_prev.addEventListener('click', () => {
                contents_to_show_index -= numb_of_contents_to_show;
                btn_next.classList.remove('hidden');
                btn_next_disabled.classList.add('hidden');
                if (search_status == 0) {
                    show_contents(contents_data);
                } else {
                    show_contents(filtered_contents);
                };
            });

            // numb of contents to show
            function change_numb_of_contents_to_show(value) {
                numb_of_contents_to_show = value;
                contents_to_show_index = 0;
                if (search_status == 0) {
                    show_contents(contents_data);
                } else {
                    show_contents(filtered_contents);
                };
            };

            numb_of_contents_to_show_input.addEventListener('change', element => {
                change_numb_of_contents_to_show(parseInt(element.currentTarget.value));
            })

            const breakpoint1 = window.matchMedia('(min-width: 1024px)');
            const breakpoint2 = window.matchMedia('(min-width: 768px)');

            function handleScreenChange(breakpoint1, breakpoint2) {
                if (breakpoint1.matches) {
                    change_numb_of_contents_to_show(8);
                    numb_of_contents_to_show_input.innerHTML =
                        `
                    <option value="8">8</option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                    <option value="20">20</option>
                    `;
                } else if (breakpoint2.matches) {
                    change_numb_of_contents_to_show(6);
                    numb_of_contents_to_show_input.innerHTML =
                        `
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                    <option value="15">15</option>
                    `;
                } else {
                    change_numb_of_contents_to_show(6);
                    numb_of_contents_to_show_input.innerHTML =
                        `
                    <option value="6">6</option>
                    <option value="10">10</option>
                    <option value="14">14</option>
                    `;
                }
            }

            handleScreenChange(breakpoint1, breakpoint2);

            breakpoint1.addListener(() => handleScreenChange(breakpoint1, breakpoint2));
            breakpoint2.addListener(() => handleScreenChange(breakpoint1, breakpoint2));


            // sorting by date and views
            document.getElementById('input_sort_by_date').addEventListener('change', element => {
                contents_to_show_index = 0;
                if (element.currentTarget.value == 'newest') {
                    contents_data_source.sort((element1, element2) => {
                        const date1String = element1.querySelector('.date').textContent;
                        const date2String = element2.querySelector('.date').textContent;

                        return date2String.localeCompare(date1String);
                    });
                    contents_data.sort((element1, element2) => {
                        const date1String = element1.querySelector('.date').textContent;
                        const date2String = element2.querySelector('.date').textContent;

                        return date2String.localeCompare(date1String);
                    });
                } else if (element.currentTarget.value == "oldest") {
                    contents_data_source.sort((element1, element2) => {
                        const date1String = element1.querySelector('.date').textContent;
                        const date2String = element2.querySelector('.date').textContent;

                        return date1String.localeCompare(date2String);
                    });
                    contents_data.sort((element1, element2) => {
                        const date1String = element1.querySelector('.date').textContent;
                        const date2String = element2.querySelector('.date').textContent;

                        return date1String.localeCompare(date2String);
                    });
                } else if (element.currentTarget.value == "most_viewed") {
                    contents_data_source.sort((element1, element2) => {
                        const views1String = element1.querySelector('.views').textContent;
                        const views2String = element2.querySelector('.views').textContent;

                        return views2String.localeCompare(views1String);
                    });
                    contents_data.sort((element1, element2) => {
                        const views1String = element1.querySelector('.views').textContent;
                        const views2String = element2.querySelector('.views').textContent;

                        return views2String.localeCompare(views1String);
                    });
                };


                if (search_status == 0) {
                    show_contents(contents_data);
                } else {
                    if (element.currentTarget.value == 'newest') {
                        filtered_contents.sort((element1, element2) => {
                            const date1String = element1.querySelector('.date').textContent;
                            const date2String = element2.querySelector('.date').textContent;

                            return date2String.localeCompare(date1String);
                        });
                    } else {
                        filtered_contents.sort((element1, element2) => {
                            const date1String = element1.querySelector('.date').textContent;
                            const date2String = element2.querySelector('.date').textContent;

                            return date1String.localeCompare(date2String);
                        });
                    };
                    show_contents(filtered_contents);
                };
            });

            // filtering by category
            document.getElementById('input_filter_by_category').addEventListener('change', element => {
                if (element.currentTarget.value == 'all') {
                    contents_to_show_index = 0;
                    contents_data = contents_data_source;
                    if (search_status == 0) {
                        show_contents(contents_data);
                    } else {
                        search(document.getElementById('search_input'));
                    };
                } else {
                    contents_data = contents_data_source.filter(element2 => {
                        return element2.querySelector('.category').textContent.includes(element.currentTarget.value);
                    });
                    if (search_status == 0) {
                        contents_to_show_index = 0;
                        show_contents(contents_data);
                    } else {
                        search(document.getElementById('search_input'));
                    }
                }
            })
        });
    </script>

</div>
<footer class="flex flex-col items-center bg-slate-900 text-center text-white">
    <div class="flex flex-col items-center container p-6">
        <div class="max-md:block flex">
            <div class="mx-3 flex max-md:mb-2 flex-col items-center justify-center">
                <span class="">Help to make us better</span>
                <a href="<?= base_url('feedback') ?>">
                    <button type="button" class="inline-block rounded-full border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        give us feedback!!
                    </button>
                </a>
            </div>
            <div class="mx-3 flex flex-col items-center justify-center">
                <span class="">Contribute to our content</span>
                <a href="<?= base_url('auth/sign_up') ?>">
                    <button type="button" class="inline-block rounded-full border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-ripple-color="light">
                        sign up for free!!
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="w-full p-4 text-center" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Copyright:
        <a class="text-whitehite" href="https://tw-elements.com/">Slypery</a>
    </div>
</footer>