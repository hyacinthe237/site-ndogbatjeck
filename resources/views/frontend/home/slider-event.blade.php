<section class="_home-slider">
    <div class="container">
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:992px;height:300px;overflow:hidden;visibility:hidden;">

            {{-- Loader  --}}
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/assets/slider/spin.svg" />
            </div>

            {{-- Slides  --}}
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:992px;height:300px;overflow:hidden;">
                @foreach ($events as $even)
                    @if ($even->isPast === 'Passé')
                        <div class="card text-white bg-danger">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <img src="{{ $even->image}}" style="width:100%;height:300px;" class="img-responsive" />
                                      </div>
                                      <div class="col-sm-8">
                                          <h5 class="card-title bold" style="padding-right:15px;">{{ $even->title }}</h5>
                                          <div class="card-text">
                                              <p><i class="ion-calendar"></i> {{ date('d/m/Y', strtotime($even->date_activity)) }}</p>
                                              <p><i class="ion-clock"></i> {{ date('h:i', strtotime($even->time_activity)) }} </p>
                                              <p><i class="ion-flag"></i> {{ $even->location }}</p>
                                              <span style="padding-right:15px;text-align:justify;position:relative;display:inline-block;word-wrap:break-word;overflow:hidden;max-height:3.6em;line-height:1.2em;">
                                                  {!! $even->excerpt !!}
                                              </span>
                                          </div>
                                          <div class="plus" style="padding-top:10px;">
                                              <a href="{{ route('activites.show', $even->slug) }}" class="btn btn-primary bold">Plus</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                    @endif

                    @if ($even->isPast === 'Aujourd\'hui')
                        <div class="card text-white bg-warning">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <img src="{{ $even->image}}" style="width:100%;height:300px;" class="img-responsive" />
                                      </div>
                                      <div class="col-sm-8">
                                          <h5 class="card-title bold" style="padding-right:15px;text-align:justify;position:relative;display:inline-block;word-wrap:break-word;overflow:hidden;max-height:1.6em;line-height:1.2em;">{{ $even->title }}</h5>
                                          <div class="card-text">
                                              <p><i class="ion-calendar"></i> {{ date('d/m/Y', strtotime($even->date_activity)) }}</p>
                                              <p><i class="ion-clock"></i> {{ date('h:i', strtotime($even->time_activity)) }} </p>
                                              <p><i class="ion-flag"></i> {{ $even->location }}</p>
                                              <span style="padding-right:15px;text-align:justify;position:relative;display:inline-block;word-wrap:break-word;overflow:hidden;max-height:3.6em;line-height:1.2em;">
                                                  {!! $even->excerpt !!}
                                              </span>
                                          </div>
                                          <div class="plus" style="padding-top:10px;">
                                              <a href="{{ route('activites.show', $even->slug) }}" class="btn btn-primary bold">Plus</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                    @endif

                    @if ($even->isPast === 'A venir')
                        <div class="card text-white bg-success">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <img src="{{ $even->image}}" style="width:100%;height:300px;" class="img-responsive" />
                                      </div>
                                      <div class="col-sm-8">
                                          <h5 class="card-title bold" style="padding-right:15px;">{{ $even->title }}</h5>
                                          <div class="card-text">
                                              <p><i class="ion-calendar"></i> {{ date('d/m/Y', strtotime($even->date_activity)) }}</p>
                                              <p><i class="ion-clock"></i> {{ date('h:i', strtotime($even->time_activity)) }} </p>
                                              <p><i class="ion-flag"></i> {{ $even->location }}</p>
                                              <span style="padding-right:15px;text-align:justify;position:relative;display:inline-block;word-wrap:break-word;overflow:hidden;max-height:3.6em;line-height:1.2em;">
                                                  {!! $even->excerpt !!}
                                              </span>
                                          </div>
                                          <div class="plus" style="padding-top:10px;">
                                              <a href="{{ route('activites.show', $even->slug) }}" class="btn btn-primary bold">Plus</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
        </div>
    </div>
</section>
