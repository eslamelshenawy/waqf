@inject("page","\App\Page")

<section class="biography__sheikh">
    <div class="">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                <div class="biography__sheikh--img">
                    <img src="img/about1.png" alt="">
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
                <div class="biography__sheikh--info">
                    <h2 class="info-h2">
                        <span class="title_span">سيرة الشيخ</span>
                        <span class="name">محمد محمود الفاضل رحمة الله</span>
                    </h2>
                    <p class="info-p">
                        
{!! $page->where('slug','سيرة الشيخ محمد محمود الفاضل رحمة الله')->first()->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>