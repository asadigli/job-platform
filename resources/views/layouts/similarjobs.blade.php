<section id="featured" class="section bg-gray pb-45">
    <div class="container">
        <h4 class="small-title text-left">{{__('app.Similar_jobs')}}</h4>
        <div class="row">
            @foreach($vacs = App\Vacancy::where('category',$vac->category)->get() as $vac)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="job-featured">
                    <div class="icon">
                        <img src="/img/features/img1.png" alt="">
                    </div>
                    <div class="content">
                        <h3><a href="/job/{{$vac->vac_id}}">{{$vac->title}}</a></h3>
                        <p class="brand">{{$vac->company}}</p>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i> {{$vac->location}}</span>
                            @if($vac->type == 1)
                            <span class="btn-full-time">{{__('app.Part_time')}}</span>
                            @elseif($vac->type == 3)
                            <span class="btn-full-time">{{__('app.Remote')}}</span>
                            @elseif($vac->type == 0)
                            <span class="btn-full-time">{{__('app.Intern')}}</span>
                            @elseif($vac->type == 2)
                            <span class="btn-full-time">{{__('app.Full_time')}}</span>
                            @endif
                        </div>
                        <span>
                          @if($vac->salary_type == 1) {{__('app.Hourly')}}
                          @elseif($vac->salary_type == 2) {{__('app.Daily')}}
                          @elseif($vac->salary_type == 3) {{__('app.Weekly')}}
                          @elseif($vac->salary_type == 4) {{__('app.Monthly')}}
                          @else {{__('app.Annual')}}
                          @endif : {{$vac->salary}}AZN</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
