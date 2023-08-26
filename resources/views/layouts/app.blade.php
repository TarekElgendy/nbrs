<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title_page') | {{ $setting->title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('des_seo'){{ $setting->seo_des }}">
    <meta name="keywords" content="@yield('key_seo'){{ $setting->seo_key }}">
    <meta name="author" content="{{ $setting->title }}">
    {{-- start share button --}}
    <meta property="og:image" content="@yield('image_url_share')" />
    <meta property="og:title" content="@yield('title_share')">
    <meta property="og:description" content="@yield('description_share')" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    {{-- end share button --}}
    <link rel="icon" href="{{ $setting->image_icon }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ $setting->image_icon }}" type="image/x-icon">
    <link href="{{ url('/') }}/frontend/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/dist/css/all.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/dist/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/dist/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/dist/css/selectric.css" rel="stylesheet">
    <link href="{{ url('/') }}/frontend/dist/css/main.css" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
    @else
        <link href="{{ url('/') }}/frontend/dist/css/ltr.css" rel="stylesheet">
    @endif
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    @livewireStyles
</head>

<body>

    @include('partials._errors')



    <!-- Preloader -->
    {{-- <div class="preloader">
        <img src="{{ url('/') }}/frontend/dist/imgs/loaders/08.gif" alt="" />
    </div> --}}
    <!-- //Preloader -->
    <!-- START => HEADER -->
    <header>
        <div class="container">
            <div class="top-header">
                <div class="top-header_left d-flex align-items-center">

                    @if (app()->getLocale() == 'en')
                        <a rel="alternate" class=" txt_off" hreflang="ar"
                            href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                            <span>العربية</span> <i class="fas fa-globe"></i></a>
                    @else
                        <a rel="alternate" class=" txt_off" hreflang="en"
                            href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"> <i
                                class="fas fa-globe"></i> <span>English</span> </a>
                    @endif
                    <p class="mb-0 txt_off">{{ $setting->email }}</p>
                    <a href="tel:{{ $setting->num1 }}"><i class="fas fa-headset"></i>
                        <span>{{ $setting->num1 }}</span></a>
                </div>

                <div class="top-header_right d-flex align-items-center">

                    @auth
                        <div><a href="{{ route('user.profile') }}"><i class="far fa-user"></i> <span> @lang('site.welcome')
                                </span> {{ auth()->user()->name }} </a></div>
                        <div><a href="{{ route('logout') }}"><i class="far fa-user"></i> <span> @lang('site.logout') </span>
                            </a></div>
                    @else
                        <div><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> <span> @lang('site.login') /
                                    @lang('site.register') </span></a></div>
                    @endauth
                </div>
            </div>
            <div class="middle-header row g-0 align-items-center">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="logo-img"><img src="{{ $setting->image_logo }}"
                                class="img-fluid" alt="LOGO"></a>
                        <span class="toggle-menu"><i class="fas fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav>
                        <div class="overlay-bg"></div>
                        <a href="{{ route('home') }}" class="logo-menu"><img src="{{ $setting->image_logo }}"
                                class="img-fluid" alt="LOGO"></a>
                        <ul class="d-flex align-items-center justify-content-center">
                            <li><a href="{{ route('home') }}"> @lang('site.home') </a></li>

                            <li><a href="javascript:void(0)">المنتج <i class="fas fa-chevron-down fa-2xs"></i></a>
                                <ul>
                                    <li><a href="product(left-sidebar).html"> قائمة جانبية - يسار </a></li>
                                    <li><a href="product(right-sidebar).html"> قائمة جانبية - يمين </a></li>
                                    <li><a href="product(no-sidebar).html"> بدون قائمة جانبية </a></li>
                                    <li><a href="product(thumbnail-left).html"> صور مصغرة - يسار </a></li>
                                    <li><a href="product(thumbnail-right).html"> صور مصغرة - يمين </a></li>
                                    <li><a href="product(thumbnail-bottom).html"> صور مصغرة - اسفل </a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> صفحات <i class="fas fa-chevron-down fa-2xs"></i> <span
                                        class="new_soon">
                                        قريبا </span></a>
                                <ul>
                                    <li><a href="register.html"> حسابى </a></li>
                                    <li><a href="about-us.html"> من نحن </a></li>
                                    <li><a href="compare.html"> مقارنات </a></li>
                                    <li><a href="collection.html"> مجموعة منتجات </a></li>
                                    <li><a href="404-not-found.html"> صفحة خطأ 404 </a></li>
                                    <li><a href="">قريبا <span class="new_soon"> قريبا </span></a></li>
                                    <li><a href="faq.html"> الأسئلة الشائعة </a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> أكواد سريعه <i
                                        class="fas fa-chevron-down fa-2xs"></i></a>
                                <ul>
                                    <li><a href="shortcode-title.html"> عناوين </a></li>
                                    <li><a href="shortcode-collection.html"> مجموعه منتجات </a></li>
                                    <li><a href="shortcode-categories.html"> اقسام </a></li>
                                    <li><a href="shortcode-services.html"> خدمات </a></li>
                                    <li><a href="terms-conditions.html"> شروط وأحكام </a></li>
                                    <li><a href="shortcode-tabs.html"> تبويبات </a></li>
                                    <li><a href="shortcode-pricing.html"> جداول أسعار </a></li>
                                    <li><a href="shortcode-counter.html"> عداد </a></li>
                                    <li><a href="shortcode-team.html"> فريقنا </a></li>
                                    <li><a href="shortcode-testimonials.html"> أراء العملاء </a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0)"> مدونة <i class="fas fa-chevron-down fa-2xs"></i></a>
                                <ul>
                                    <li><a href="blog.html"> مدونة </a></li>
                                    <li><a href="blog-single.html"> تفاصيل المدونة </a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html"> تواصل معنا </a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2 header-actions d-flex align-items-center justify-content-end">
                    <div class="compare no_mobile"><a href="compare.html"><i class="fas fa-arrows-rotate"></i> <span
                                class="count">4</span></a></div>
                    <div class="wishlist"><a href="whishlist.html"><i class="far fa-heart"></i> <span
                                class="count">+9</span></a>
                    </div>
                    <livewire:frontend.cart />

                    <div class="icon_mobile icon_call">
                        <a href="tel:0000" aria-label="tel"><i class="fas fa-headset"></i></a>
                    </div>
                    <div class="search"><a href="" class="btn-search" aria-label="search"><i
                                class="fas fa-search"></i></a>
                        <div class="box-search">
                            <div class="overlay-bg"></div>
                            <strong class="h4 d-block"> عن ماذا تبحث؟ </strong>
                            <i class="fas fa-times close_search"></i>
                            <form action="shop(left-sidebar).html" class="d-flex">
                                <input type="search" name="search" required class="input-search"
                                    placeholder=" اكتب بحثك ... ">
                                <button type="submit" aria-label="submit"><i
                                        class="fas fa-search fa-lg"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="icon_mobile">
                        <a href="register.html" aria-label="btn_register"><i class="far fa-user"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //END => HEADER -->
    <!-- START => Main -->

    @yield('content')

    <!-- START => Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="wedget-footer">
                        <a href="{{ route('home') }}"><img src="{{ $setting->image_footer }}" alt="Logo"
                                class="logo-footer img-fluid"></a>
                        <p>
                        </p>
                        <ul class="social-media">

                            <li style="display:{{ $setting->facebook == '' ? 'none' : '' }}"><a
                                    href="{{ $setting->facebook }}" aria-label="facebook"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li style="display:{{ $setting->twitter == '' ? 'none' : '' }}"><a
                                    href="{{ $setting->twitter }}" aria-label="twitter"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li style="display:{{ $setting->linkedin == '' ? 'none' : '' }}"><a
                                    href="{{ $setting->linkedin }}" aria-label="linkedin"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                            <li style="display:{{ $setting->youtube == '' ? 'none' : '' }}"><a
                                    href="{{ $setting->youtube }}" aria-label="youtube"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li style="display:{{ $setting->instagram == '' ? 'none' : '' }}"><a
                                    href="{{ $setting->instagram }}" aria-label="instagram"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li style="display:{{ $setting->tiktok == '' ? 'none' : '' }}"><a
                                    href="{{ $setting->tiktok }}" aria-label="tiktok"><i
                                        class="fab fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="wedget-footer">
                        <h6 class="title-footer"> روابط سريعه </h6>
                        <ul class="links-footer">
                            <li><a href="{{ route('home') }}"> الرئيسية </a></li>
                            <li><a href="about-us.html"> من نحن </a></li>
                            <li><a href="contact-us.html"> تواصل معنا </a></li>
                            <li><a href="terms-conditions.html"> الشروط والأحكام </a></li>
                            <li><a href="faq.html"> الأسئلة الشائعة </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="wedget-footer">
                        <h6 class="title-footer"> متابعه الحساب </h6>
                        <ul class="links-footer">
                            <li><a href="profile-orders.html"> طلباتى </a></li>
                            <li><a href="profile-orders.html"> متابعه الطلبات </a></li>
                            <li><a href="terms-conditions.html"> الإرجاع والاستبدال </a></li>
                            <li><a href="profile-dashboard.html"> حسابى </a></li>
                            <li><a href="profile-dashboard.html"> معلوماتى </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="wedget-footer">
                        <h6 class="title-footer"> ابقى على تواصل </h6>
                        <div class="contacts-footer">
                            <p><i class="fas fa-map-marker-alt"></i> 123 شارع مصر القاهرة </p>
                            <p><i class="far fa-envelope"></i> info@sitename.com</p>
                            <p><i class="fas fa-mobile-alt"></i> +2010-12-345-678</p>
                            <p><i class="fas fa-phone-volume"></i> +2-123-456-789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">&copy;
            <script>
                document.write(new Date().getFullYear());
            </script>, شوبنج - قالب HTML, جميع الحقوق محفوظة
        </div>
    </footer>
    <!-- //END => Footer -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{ url('/') }}/frontend/dist/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/frontend/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/frontend/dist/js/swiper-bundle.min.js"></script>
    <script src="{{ url('/') }}/frontend/dist/js/jquery.fancybox.min.js"></script>
    {{-- <script src="{{ url('/') }}/frontend/dist/js/jquery.selectric.js"></script> --}}
    <script src="{{ url('/') }}/frontend/dist/js/numscroller-1.0.js"></script>
    <script src="{{ url('/') }}/frontend/dist/js/main.js" defer></script>
    @livewireScripts
    @include('sweetalert::alert')

</body>

</html>
