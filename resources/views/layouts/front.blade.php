@php
    use App\Models\Backend\Category;
    use App\Models\Backend\Subcategory;
    use App\Models\Backend\Setting\Seo;
    use App\Models\Backend\Setting\Social;
    use App\Models\Backend\Setting\Notice;
    use App\Models\Backend\Post;

    $category = Category::all()->take(8);
    $morecategory = Category::all()->skip(8);
    $seo = Seo::all();
    $social = Social::all();
    $notice = Notice::all();
    $Headline = Post::where('headline', '1')->orderBy('id', 'desc')->get();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> News24 </title>
    @foreach ($seo as $row)
        <meta property="og:author" content="{{$row->meta_author}}" />
        <meta property="og:title" content="{{$row->meta_title}}" />
        <meta property="og:description" content="{{$row->meta_description}}" />
        <meta property="og:google-analytics" content="{{$row->google_analytics}}" />
        <meta property="og:google-analytics" content="{{$row->google_verification}}" />
        <meta property="og:alexa-analytics" content="{{$row->alexa_analytics}}" />
    @endforeach
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:image" content="{{asset('upload/templateimage/63c40b6354b51.jpg')}}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="This Is Twitter Share Title" />
    <meta name="twitter:description" content="Popular Online Newspaper of Bangladesh" />
    <meta name="twitter:image" content="public/templateimage/63c40b68e7996.jpg" />
    <meta name="brand_name" content="This Is Twitter Share Title" />
    <meta name="twitter:creator" content="@themesbazar">
    <meta name="twitter:site" content="@themesbazar">


    <link rel="icon" href="{{asset('upload/templateimage/63bbda7630384.gif')}}">

    <!-- Css Link Start    -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/stellarnav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/style.css')}}">
    <script src="https://bangla.plus/scripts/bangladatetoday.min.js"></script>
    <script>dateToday('date-today', 'bangla');</script>
    <script src="https://cdn.jsdelivr.net/gh/abdul-mannan/bengali-date/dist/bengali-date.min.js"></script>


</head>

<body>


    <script>
        setInterval(displayTime, 1000);

        function displayTime() {
            const timeNow = new Date();

            // সময় বের করা
            let hoursOfDay = timeNow.getHours();
            let minutes = timeNow.getMinutes();
            let seconds = timeNow.getSeconds();
            let period = "পিএম";

            if (hoursOfDay < 12) {
                period = "এএম";
            }
            if (hoursOfDay > 12) {
                hoursOfDay -= 12;
            }
            if (hoursOfDay === 0) {
                hoursOfDay = 12;
            }

            hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;

            // তারিখ বের করা
            let weekDay = ["রবিবার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার", "শনিবার"];
            let today = weekDay[timeNow.getDay()];
            let months = ["জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
            let month = months[timeNow.getMonth()];
            let date = timeNow.getDate();
            let year = timeNow.getFullYear();

            // বঙ্গাব্দ ক্যালকুলেশন (সাধারণ নিয়ম)
            let banglaMonths = ["বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ", "পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র"];
            let banglaYear = year - 593; // Approximate conversion
            let banglaMonthIndex = timeNow.getMonth();
            let banglaMonth = banglaMonths[banglaMonthIndex];
            let banglaDate = date; // Simplified (Real calculation requires Bengali calendar logic)

            let fullDate = today + ", " + date + " " + month + " " + year + " , " + banglaDate + " " + banglaMonth + " " + banglaYear + " বঙ্গাব্দ";

            // ইংরেজি সংখ্যা → বাংলা সংখ্যা পরিবর্তন
            var chars = { '1': '১', '2': '২', '3': '৩', '4': '৪', '5': '৫', '6': '৬', '7': '৭', '8': '৮', '9': '৯', '0': '০' };

            let timeBn = time.replace(/[1234567890]/g, m => chars[m]);
            let dateBn = fullDate.replace(/[1234567890]/g, m => chars[m]);

            document.getElementById("ClockBn").innerHTML = timeBn;
            document.getElementById("Date").innerHTML = dateBn;
        }

        displayTime();
    </script>

    <script>
        setInterval(displayTimeen, 1000);

        function displayTimeen() {

            const timeNow = new Date();

            let hoursOfDay = timeNow.getHours();
            let minutes = timeNow.getMinutes();
            let seconds = timeNow.getSeconds();
            let weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
            let today = weekDay[timeNow.getDay()];
            let months = timeNow.toLocaleString("default", {
                month: "long"
            });
            let year = timeNow.getFullYear();
            let period = "AM";

            if (hoursOfDay > 12) {
                hoursOfDay -= 12;
                period = "PM";
            }

            if (hoursOfDay === 0) {
                hoursOfDay = 12;
                period = "AM";
            }

            hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            let time = hoursOfDay + ":" + minutes + ":" + seconds + " " + period;

            document.getElementById('Clocken').innerHTML = time;
        }
        displayTimeen();

    </script>






    <!--=========Faruk==============
        Header three section start
    =============Faruk=============-->
    <header class="header3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo3">
                        <a href="#"> <img src="{{asset('upload/templateimage/63c40b1c568b6.gif')}}" alt="News24"> </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="date">
                        <i class="las la-map-marker-alt"></i> ঢাকা <i class="lar la-calendar"></i>
                        <span id="ClockBn" onload="displayTime()"></span>,
                        <span id="Date"></span>


                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="header-social3">
                        @foreach ($social as $Social)
                            <a href="{{$Social->facebook}}" target="_blank" title="facebook"><i
                                    class="lab la-facebook-f"></i> </a>
                            <a href="{{$Social->twitter}}" target="_blank" title="twitter"><i class="lab la-twitter"> </i>
                            </a>
                            <a href="{{$Social->linkedin}}" target="_blank" title="linkedin"><i class="lab la-linkedin-in">
                                </i> </a>
                            <a href="{{$Social->youtube}}" target="_blank" title="youtube"><i class="lab la-youtube"> </i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--=========Faruk==============
        Header three section End
    =============Faruk=============-->




    <!--=========Faruk==============
            Menu-section-Start
    =============Faruk=============-->

    <div class="menu-section" id="myHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="mobile_logo">
                        <a href="#"> <img
                                src="{{asset('upload/templateimage/63c40b1c568b6.gif')}}" alt="LatestScript | Laravel">
                        </a>
                    </div>
                    <div class="stellarnav">
                        <ul>
                            @if (session()->get('language') == 'english')
                                <li class="current-menu-item"><a href="{{Route('frontend.index')}}"> <i
                                            class="las la-home"></i> Home</a>
                                </li>
                            @else
                                <li class="current-menu-item"><a href="{{Route('frontend.index')}}"> <i
                                            class="las la-home"></i> প্রচ্ছদ</a>
                                </li>
                            @endif

                            @foreach ($category as $row)
                                @php
                                $subcategory = Subcategory::all()->where('category_id', $row->id);
                                @endphp

                                <li>
                                    <a href="news/category/national.html">
                                        @if (session()->get('language') == 'english')
                                            {{$row->category_en}}
                                        @else
                                            {{$row->category_bn}}
                                        @endif
                                    </a>

                                    <ul>
                                        @foreach ($subcategory as $subcat)
                                            @if (session()->get('language') == 'english')
                                                <li><a href="#">{{$subcat->subcategory_en}}</a>
                                            @else
                                                <li><a href="#">{{$subcat->subcategory_bn}}</a>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li>
                                <a href="#">আরও</a>

                                <ul>
                                    @foreach ($morecategory as $Morecategory)
                                        @php
                                        $subcategory = Subcategory::where('category_id', $Morecategory->id);
                                        @endphp

                                        <li>
                                            <a href="news/category/national.html">
                                                @if (session()->get('language') == 'english')
                                                    {{$Morecategory->category_en}}
                                                @else
                                                    {{$Morecategory->category_bn}}
                                                @endif
                                            </a>

                                            <ul>
                                                @foreach ($subcategory as $subcat)
                                                    @if (session()->get('language') == 'english')
                                                        <li><a href="#">{{$subcat->subcategory_en}}</a>
                                                    @else
                                                        <li><a href="#">{{$subcat->subcategory_bn}}</a>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1">
                    <div class="version">
                        @if (session()->get('language') == 'bangla')
                                <a href="{{Route('language.english')}}" title="Eng"><i class="las la-globe"></i> Eng</a>
                            @elseif (session()->get('language') == 'english')
                                <a href="{{Route('language.bangla')}}" title="বাংলা"><i class="las la-globe"></i>
                                    বাংলা</a>
                            @else
                                <a href="{{Route('language.english')}}" title="Eng"><i class="las la-globe"></i> Eng</a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-1 col-md-1">
                    <div id="wrapper">
                        <div class="menuIcon">
                            <span> </span>
                            <div class="circle icon">

                            </div>
                        </div>
                    </div>

                    <div class="searchIcon">
                        <i class="las la-search"></i>
                    </div>


                    <form class="searchBar" method="get" action="#">
                        <input type="hidden" name="_token" value="XC4ILifOmfT3xq8cnA89uc2nGBl3TmhKmTS4steR"> <input
                            type="text" name="search" placeholder="এখানে লিখুন">
                        <button><input type="submit" value="খুজুন"></button>

                        <div class="remove">
                            <i class="las la-times"></i>
                        </div>

                    </form>

                </div>



            </div>



        </div>

    </div>

    <!--==========Faruk=============
            Menu-section-End
    ==============Faruk============-->



    <!--============Scroll 03 start==============-->

    <div class="top-scroll-section3">
        <div class="container">
            <div class="scroll-section3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="scroll3-left">
                            @if (session()->get('language') == 'english')
                                <span> Headline : </span>
                            @else
                                <span> সংবাদ শিরোনাম : </span>
                            @endif

                        </div>
                        <div class="scroll3-right rightCSS ">
                            <div>
                                @foreach ($Headline as $headline)
                                    @if (session()->get('language') == 'english')
                                        <a href="#"> <i class="las la-bullseye"></i>{{$headline->title_en}}</a>
                                    @else
                                        <a href="#"> <i class="las la-bullseye"></i>{{$headline->title_bn}}</a>
                                    @endif

                                @endforeach
                            </div><!-- End main div -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--============Scroll 03 End==============-->

    @yield('content')


    </div>



    <!--=======================
        Footer_section_Start
    ==========================-->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">


                    <div class="footer-menu footer_color">
                        <ul>
                            <li><a href="news/category/politics.html">রাজনীতি</a></li>
                            <li><a href="news/category/sport.html">খেলাধুলা</a></li>
                            <li><a href="news/category/entertainment.html">বিনোদন</a></li>
                            <li><a href="news/category/it.html">তথ্যপ্রযুক্তি</a></li>
                            <li><a href="news/category/bangladesh.html">সারাদেশ</a></li>
                            <li><a href="news/page/1.html">আমাদের সম্পর্কে</a></li>
                            <li><a href="sitemap.xml">সাইটম্যাপ</a></li>
                            <li><a href="feed">আরএসএস</a></li>
                            <li><a href="all/video/gallery.html">ভিডিও গ্যালারী</a></li>
                            <li><a href="all/photo/gallery.html">ফটোগ্যালারী</a></li>
                            <li><a href="all/reporter/list.html">আমাদের পরিবার</a></li>
                            <li><a href="all/latest/news/post.html">সকল নিউজ</a></li>
                        </ul>
                    </div><!--End Footer Menu-->





                    <div class="editorial_content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 footer_color">
                                <div class="row">
                                    <div class="themesBazar-2 themesBazar-m1">
                                        <div class="editorial-wrpp ">
                                            <p align="right">সম্পাদক ও প্রকাশক : আব্দুল হাসিম চৌধুরী</p>
                                            <p align="right">নির্বাহী সম্পাদক : আবু রায়হান<br></p>
                                            <p align="right">বার্তা সম্পাদক : আবু হুরায়রা চৌধুরী</p>
                                            <p align="right"><br></p>
                                        </div>
                                    </div>

                                    <div class="themesBazar-2 themesBazar-m1">
                                        <div class="editorial-wrpp2">
                                            <p align="left">অফিস : মিরপুর, ঢাকা, বাংলাদেশ-১২১৬</p>
                                            <p align="left">ইমেইল : youremail@gmail.com</p>
                                            <p align="left">মোবাইল : 01710-000000<br></p>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div><!--End editorial_content-->

                </div><!-- End Col-12 -->
            </div><!--End row-->
        </div><!--End container-->
    </footer><!-- End Footer-->




    <!--================================bottom-footer-start===============================-->
    <div class="bottom-footer-section">
        <div class="container">
            <div class="design-developed">
                © All rights reserved © News24 | News24 Developed BY <a href="#" target="_blank" title="news.com">
                    www.news24.com </a>
            </div>
            <a href="#" class="themesBazar_scroll"><i class="las la-level-up-alt"></i></a>
        </div>
    </div><!--End Bottom Footer-->





    <!--=======================Footer_section_End==========================-->

    <!--============Footer Scroll  start==============-->


    <div class="footer_scroll">
        <div class="row">
            <div class="col-md-12">
                <div class="footer_left">
                    @if (session()->get('language') == 'english')
                        <span> Notice </span>
                    @else
                        <span> নোটিশ </span>
                    @endif

                </div>
                <div class="footer_right rightCSS ">
                    <div>
                        @foreach ($notice as $Notice)
                            @if (session()->get('language') == 'english')
                                <a href="#"> <i class="las la-bullseye"></i>{{$Notice->notice}}</a>
                            @else
                                <a href="#"> <i class="las la-bullseye"></i>{{$Notice->notice}}</a>
                            @endif
                        @endforeach

                    </div><!-- End main div -->
                </div>

            </div>
        </div>

    </div>

    <!--============footer Scroll End==============-->

    <script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/stellarnav.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/assets/js/lazyload.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>

</html>
