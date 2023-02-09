@extends('front.layouts.master')
@if(isset($car))
    @section('title',$slugTag.' '.$car->name.' في مدينة الكويت على مدار 24 ساعة في اليوم ')
    @section('seo_keyword',$slugTag.' '.$car->name)
    @section('seo_description',' نقدم لك افضل خدمة '.$slugTag.' '.$car->name. ' في جميع مدن الكويت على مدار 24 ساعة في اليوم اتصل لنصل  ')
    @section('seo_image',$car->photo)
    @section('seo_url', URL::route('car.index',str_replace(' ', '-', $slugTag).'/'.$car ->slug))
@endif
@section('content')
    <style>

        .big-posts-box .posts-items li:nth-child(2n+1) {
            clear: none;
        }
        .mag-box .posts-items li {
            width: 20%;
             margin-top: 0px;
        }
        @media (max-width: 670px) {
            .big-posts-box .posts-items li {
                width:33%
            }
            .big-posts-box .posts-items li .post-title {
                font-size: 18px;

            }
        }
        @media (max-width: 670px) {
            .mag-box .posts-items li:not(:first-child) {
                margin-top: 0px
            }
        }

        .big-posts-box .posts-items li .post-title {
            font-size: 18px;

        }

    </style>

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        <nav id="breadcrumb">
                            <a href="{{ URL::route('site.index')}}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('cars.index')}}" title="جميع السيارات">جميع السيارات</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('car.index',$car ->slug)}}" title="{{$car ->name}}" >{{$car ->name}}</a><em class="delimiter">/</em>
                            <a href="{{ URL::route('subcar.index',['slugSubcar' => $subCar->slug, 'slugcar' => $car -> slug])}}" title="{{$subCar ->name}}" >{{$subCar ->name}}</a><em class="delimiter">/</em>
                            <span  title="{{$slugTag.' '.$car ->name}}" >{{$slugTag.' '.$car ->name.' '.$subCar ->name}}</span><em class="delimiter"></em>

                        </nav>
                        {{--Imgage of the car--}}
                        <div class="featured-area">
                            <div class="featured-area-inner">
                                <figure class="single-featured-image">
                                    <img
                                        width="780"
                                        height="470"
                                        src="{{$subCar ->photo}}"
                                        class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                        alt="{{$subCar ->name}}"
                                        title="{{$subCar ->name}}"
                                        decoding="async"
                                        data-main-img="1"
                                        loading="lazy"
                                    />
                                </figure>
                            </div>
                        </div>
                        {{--title of the car--}}
                        <header class="entry-header-outer">

                        </header>
                        {{--Content of the article--}}
                        <div class="entry-content entry clearfix">

                                <h2 class="entry-sub-title margin-bottom">خدمة {{$slugTag.' '.$car ->name.' '.$subCar ->name}} في مدينة {{get_default_country()}}  بين يديك على مدارالـ 24 ساعة لجميع مدن الكويت</h2>
                                
                                <p>ورشة صيانة متنقلة تحتوي على افضل خدمة {{$slugTag.' '.$car ->name.' '.$subCar ->name}} في مدينة الكويت  لجميع  سيارات {{$car ->name.' '.$subCar ->name}} حيث لدينا كل وسائل الصيانة الحديثة والإصلاح، ويقودها فنيون مختصون وميكانيكيون ذو خبرة عالية. نستطيع أن نصل اليك أينما كنت وبسرعة عالية</p>
                                <p>{{$slugTag.' '.$car ->name.' '.$subCar ->name}} لخدمتك على مدار الـ 24 ساعة وانت على الطريق او عند البيت يتم ارسل اليك اقرب فني صيانة اليك. خدمة صيانة سيارات متنقلة بارخص الاسعار اطلب الفني الأن في الكويت .</p>
                                <p>ستجد معنا في {{$slugTag}} الكويت  كافة خدمات صيانة السيارات، مهما كان نوع العطل الذي يواجهك؛ ستجد لدينا الحل الأمثل، مع أفضل {{$slugTag}} سيارات في الكويت . والقادر على التعامل مع أي جزء من أجزاء السيارة، والتخلص من التوصيلات، أو الأجزاء التالفة، واستبدالها بآخرى سليمة في غضون فترة وجيزة.</p>
                                <p>تقدم هذه الشركة خدمة {{$slugTag.' '.$car ->name.' '.$subCar ->name}} في الكويت  إما في المنزل أو في مكان العمل أو أينما كنت بشكل سريع ومُتقن، وهي توفر أفضل الخدمات بأفضل الأسعار، حيث تتميز بفريق فني ماهر وعلى استعداد لخدمتك مهما كان نوع سيارتك،</p>
                                
                                <h3 class="entry-sub-title margin-bottom">رقم {{$slugTag.' '.$car ->name.' '.$subCar ->name}} في الكويت </h3>

                                <p>إن كنت متواجدًا في دولة {{get_default_country()}}.. فبإمكانك الاستفادة من خدمة {{$slugTag}} الكويت  حيث تتيح لك تلك الخدمة إمكانية تصليح سيارتك،على اكمل وجه على الطرق.. وكذلك إمكانية الاستفادة من حلول إصلاح المركبات التي تعرضت إلى الأعطال، وإليك أهم المراكز التي تقدم تلك الخدمات عبر الآتي:</p>
                                
                                <ul>
                                    <li class="maker-list-inside-article">
                                        <p>المتميز لخدمات {{$slugTag}}: يمكنك الحصول على خدمات {{$slugTag}} من خلال هذا المركز على أعلى مستوى من الدقة.. وكذلك بالاعتماد على خبرات الموظفين ممن يملكون الخبرة في مجال تصليح المركبات وصيانتها، ومن هنا نشير إلى أنه يقدم خدمات {{$slugTag}} .. بالإضافة إلى إمكانية  معالجة أعطال الكهرباء على مدار اليوم، وللتواصل قم بالاتصال على مدارالساعة .</p>
                                    </li>
                                    <li class="maker-list-inside-article">
                                        <p>ورشة {{$slugTag}} لإصلاح وقطر المركبات: تقدم لك تلك الورشة إمكانية الحصول على خدمة {{$slugTag}} المتنقلة.. بالإضافة إلى إمكانية إصلاح المركبات في حال أن كنت متواجدًا في منطقة  الكويت  ، حيث تملك الخبرة في صيانة المركبات.. ويمكنها معالجة الأعطال في العديد من المركبات والتي تتمثل في الماركات الأمريكية والكورية واليابانية والألمانية وخاصة سيارات  {{$car ->name.' '.$subCar ->name}}  ..ويقدم خدماته على مدار اليوم الواحد، وبإمكانك التواصل معه من خلال الاتصال</p>
                                    </li>
                                </ul>
                                <br>
                                <h3 class="entry-sub-title margin-bottom">ماهو {{$slugTag.' '.$car ->name.' '.$subCar ->name}} ووظيفتها:</h3>
                        
                                <p>صيانة سيارات {{$car ->name.' '.$subCar ->name}}  يتميز لدينا بالدقة والسرعة والإحترافية في العمل كما لديه القدرة على مراعاة المواعيد المتفق عليها مع العملاء، لذلك يمكنك الاعتماد عليه في الحصول على خدمة صيانة شاملة لتستلم سيارتك بالموعد دون تأخير بافضل سعر وجودة حيث سيارات {{$car ->name.' '.$subCar ->name}}  مصنفة من السيارات الفارهة التي تتطلب عناية خاصة ودقة متناهية في التعامل معها؛ وبعيداً عن مراكز صيانة السيارات الاخرى التي تقدم خدماتها بأسعار مبالغ فيها؛ قم بالاتصال  </p>
                                
                                <h3 class="entry-sub-title margin-bottom">اقرب {{$slugTag.' '.$car ->name.' '.$subCar ->name}} من موقعك:</h3>
                                
                                <p>مرحبًا بكم في افضل مركز {{$slugTag}}  سيارات {{$car->name}}  ، حيث نقدم بفخر خدمات إصلاح وصيانة السيارات والشاحنات الخفيفة الخبيرة لعملاء منطقة الكويت , كراج تصليح سيارات المانية , كورية , امريكية , يابانية , اوروبية والكثير الكثبر,</p>
                                <p>يمكنك عبر خدمة {{$slugTag}} على الطريق التواصل مع مركز المساعدة الطارئة والذي يعمل على مدار 24 ساعة طوال ايام السنة من خلال نخبة فنية متخصصة في كافة المجالات الكهربائية والميكانيكية بالاضافة لمتخصصين في دهان وحدادة السيارات.</p>
                                <h3 class="entry-sub-title margin-bottom">سعر خدمة {{$slugTag.' '.$car ->name.' '.$subCar ->name}} عند البيت:</h3>
                                <p>{{$slugTag.' '.$car ->name.' '.$subCar ->name}} لديه أسرع خدمة طرق في {{get_default_country()}}  لسيارت {{$car ->name.' '.$subCar ->name}} الكثير من الأشخاص على حل المشكلات التي يتعرضون لها الطرق من خلال تقديم {{$slugTag}}  الذي يعد واحدًا من أفضل الوسائل بالوقت الحالي يتمثل في إمكانية سحب السيارة والعمل على إصلاحها بأحدث المعدات وعلى يد خبراء ومتخصصين لديهم القدرة على التعامل مع أي عطل قد يحدث للسيارة، بواسطة مقال اليوم نتحدث معًا عن جميع المميزات الخاصة بتلك الخدمة.</p>
                                <strong><center>شاهد ايضا: للمزيد حول {{$slugTag.' '.$car ->name.' '.$subCar ->name}} و رقم افضل {{$slugTag.' '.$car ->name.' '.$subCar ->name}}  <a href="{{get_default_social_link_instagram()}}" rel="nofollow" target="_blank">اضغط هنا</a> </center></strong>
                                
                                <h4 class="entry-sub-title margin-bottom">خطوات {{$slugTag.' '.$car ->name.' '.$subCar ->name}}</h4>
                                <p>خطوات {{$slugTag.' '.$car ->name.' '.$subCar ->name}} على الرغم من بساطتها، إلى أنها أحيانا تحتاج إلى متخصص للقيام بتلك الخطوات بدقة وبشكل صحيح، يمكننا توضيح تلك الخطوات لمساعدة من يرغب في محاولة {{$slugTag}} بنفسه، إذا لم تنجح في {{$slugTag}}    يمكنك التواصل معنا وطلب المساعدة، تابع معنا قراءة السطور التالية للتعرف على الخطوات:</p>

                                <h4 class="entry-sub-title margin-bottom" >مميزات خدمة {{$slugTag.' '.$car ->name.' '.$subCar ->name}}</h4>
                                <p>مميزات {{$slugTag}} هي ما جعلتنا الأفضل مقارنة بالكراجات الأخرى، فنحن نمتلك الخبرة التي كونها على مدار سنين عملنا في هذا المجال، كما نمتلك ماديات تسمح لنا باقتناء الأجهزة والأدوات الحديثة لصيانة جميع أنواع سيارات {{$car->name}} ، ولهذا نحن مميزين بخدماتنا عالية الجودة، وإليك بعض مميزاتنا والتي جعلتنا نتصدر قائمة أصحاب الكراجات {{get_default_country()}} :</p>
                                <ul>
                                    <li class="maker-list-inside-article">لدينا ورشة صيانة {{$car ->name.' '.$subCar ->name}} مجهزة على أعلى مستوى، وبها كل الماكينات والمعدات التي تستخدم في الكشف وصيانة السيارات.</li>
                                    <li class="maker-list-inside-article">لدينا فريق عمل ذو خبرة ومهارة كبيرة، ويتم تدريبهم بشكل دوري لمدهم بكافة المعلومات الجديدة الخاصة بصيانة السيارات.</li>
                                    <li class="maker-list-inside-article">نقدم خدماتنا في وقت قياسي وبدقة عالية، كما نقدم خدماتنا في أي مكان وفي أي وقت في محافظات الكويت المختلفة.</li>
                                    <li class="maker-list-inside-article">خدمة الدعم الفني تعمل على مدار الساعة، وذلك للرد على استفسارات العملاء وتلقي الطلبات وتسجيل البيانات الخاصة بالعميل.</li>
                                </ul>
                                <br>
                                <h5 class="entry-sub-title margin-bottom"> {{$slugTag}}  فني {{$car ->name.' '.$subCar ->name}} متنقل خدمة طريق:</h5>
                                <p>تصل سيارات {{$slugTag.' '.$car ->name.' '.$subCar ->name}} إليكم أينما كنتم في {{get_default_country()}} ، والأندلس، واشبيلية، وأبرق خيطان، وخيطان، والعارضية، والعارضية الصناعية، والري الصناعية. وبالتأكيد نصل إليكم في الفردوس، وضاحية صباح الناصر، وضاحية عبد الله المبارك، والضجيج، الشدادية، والعمرية، والرابية، والرحاب، والرقعي، وجليب الشيوخ. ولابد لنا من نصيحتك في أن تحتفظ برقمنا&nbsp;على جوالك فلا تدري أين ومتى تحتاج خدماتنا.</p>

                                <h5 class="entry-sub-title margin-bottom" >خدمة عملاء {{$slugTag.' '.$car ->name.' '.$subCar ->name}}  في الكويت  :</h5>
                                <p>{{$slugTag}} سيارات {{$car ->name.' '.$subCar ->name}} يقدم لكم جمِيع الضمانات والكفالات اللازمة وذَلك لعدم حدوث أي أضرار أو أخطاء لسيارتك {{$car ->name.' '.$subCar ->name}} تحدث بعد ذلك قد تتسبب في توقف السّيارة عن السير، بهدف تحقيق الأمن والسلام والحماية إلى جمِيع أفراد العائلة والأطفال وجميع عملائنا الكرام على الطرق الصحراوية السّريعة.</p>
                                <strong><h6><center>خدمة {{$slugTag}} تقوم بها الورشة المتنقلة بأسرع الإمكانيات  <a href="{{get_default_social_link_facebook()}}" rel="nofollow" target="_blank">للاستفسار هنا</a></center></h6></strong>
                                <p>وورشة صيانة كراج سيارات {{$car ->name.' '.$subCar ->name}} تتميز أيضا بالتجديد الكامل والمستمر في كل ما يتعلق بخدمات الصيانة. سواء كان التجديد المستمر إما في معدات الورشة أو في الخدمات الرائعة والعروض الممتازة المقدمة كل يوم في مدينة الكويت ، كراج متنقل الكويت لتصليح سيارات . فني يرسل دوما لكل عميل تتعطل سيارته في أي وقت ورشة تصل لحيث مكانه وتصلح له سيارته في أي أقل وقت وأيضا خلال وقت قصير. فورشة صيانة السيارات مجهزة تماما فني بنتلي وجميع قطع الغيار والسوائل والعاملين بالورشة أصبحوا من الخبراء فهم مهندسين وفنيين ميكانيكيين يعرفون تماما في كل ما يتعلق بأي أعطال في السيارة أو المركبة. ولكي يحصل أي زبون على الصيانة لأي سيارة يملكها عليه في أي وقت عليه فقط الاتصال على رقم فني.</p>
                                {{-- dynamic content --}}
                                <p>{!! $car ->description !!} </p>

                        </div>
                    </div>
                    @include('front.includes.first-main-sidebar')
                    @include('front.includes.second-main-sidebar')
                    @include('front.pages.articles.featured-articles')
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
