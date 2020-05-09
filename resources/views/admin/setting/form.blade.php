@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/css/jquery-gmaps-latlon-picker.css')}}"/>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.4.3/full/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
  });
</script>
@endsection

<div class="row">
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="phone">{{ __('lang.phone') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                    <input type="text" class="form-control" id="phone" placeholder="{{ __('lang.phone') }}" name="phone" value="@if(old('phone') != null){{ old('phone') }}@elseif(isset($setting)){{$setting->phone}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="email">{{ __('lang.email') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                    <input type="text" class="form-control" id="email" placeholder="{{ __('lang.email') }}" name="email" value="@if(old('email') != null){{ old('email') }}@elseif(isset($setting)){{$setting->email}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="phone">{{ __('lang.address') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                    <input type="text" class="form-control" id="address_ar" placeholder="address Arabic" name="address_ar" value="@if(old('address') != null){{ old('address') }}@elseif(isset($setting)){{$setting->address_ar}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('address_ar'))
                        <span class="help-block">
                    <strong>{{ $errors->first('address_ar') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="phone">{{ __('lang.facebook') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                    <input type="text" class="form-control" id="facebook" placeholder="{{ __('lang.facebook') }}" name="facebook" value="@if(old('facebook') != null){{ old('facebook') }}@elseif(isset($setting)){{$setting->facebook}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('facebook'))
                        <span class="help-block">
                    <strong>{{ $errors->first('facebook') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="soundcloud">{{ __('lang.soundcloud') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-soundcloud"></i></div>
                    <input type="text" class="form-control" id="soundcloud" placeholder="{{ __('lang.soundcloud') }}" name="soundcloud" value="@if(old('soundcloud') != null){{ old('soundcloud') }}@elseif(isset($setting)){{$setting->soundcloud}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('soundcloud'))
                        <span class="help-block">
                    <strong>{{ $errors->first('soundcloud') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="phone">{{ __('lang.twitter') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                    <input type="text" class="form-control" id="twitter" placeholder="{{ __('lang.twitter') }}" name="twitter" value="@if(old('twitter') != null){{ old('twitter') }}@elseif(isset($setting)){{$setting->twitter}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('twitter'))
                        <span class="help-block">
                    <strong>{{ $errors->first('twitter') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="instagram">{{ __('lang.instagram') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-instagram"></i></div>
                    <input type="text" class="form-control" id="instagram" placeholder="{{ __('lang.instagram') }}" name="instagram" value="@if(old('instagram') != null){{ old('instagram') }}@elseif(isset($setting)){{$setting->instagram}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('instagram'))
                        <span class="help-block">
                    <strong>{{ $errors->first('instagram') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="phone">{{ __('lang.youtube') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-youtube"></i></div>
                    <input type="text" class="form-control" id="youtube" placeholder="{{ __('lang.youtube') }}" name="youtube" value="@if(old('youtube') != null){{ old('youtube') }}@elseif(isset($setting)){{$setting->youtube}}@endif">
                </div>
                <div class="input-group">
                    @if ($errors->has('youtube'))
                        <span class="help-block">
                    <strong>{{ $errors->first('youtube') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>




<div class="row">
  <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <label for="word_ar">{{ __('lang.word') }} *</label>
                <textarea id="editor1" name="word_ar" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.word_ar') }}">@if(old('word_ar') != null){{ old('word_ar') }}@elseif(isset($setting->word_ar)){{$setting->word_ar}}@endif</textarea>
                @if ($errors->has('word_ar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('word_ar') }}</strong>
                    </span>
                @endif
              </div>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <label for="about_us">{{ __('lang.about') }} *</label>
                <textarea id="editor2" name="about_us" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.about_us') }}">@if(old('about_us') != null){{ old('about_us') }}@elseif(isset($setting->about_us)){{$setting->about_us}}@endif</textarea>
                @if ($errors->has('about_us'))
                    <span class="help-block">
                        <strong>{{ $errors->first('about_us') }}</strong>
                    </span>
                @endif
              </div>
          </div>
      </div>
  </div>
</div>
{{-- 
<div class="row">
    <div class="seo col-sm-12">
        <h1>SEO INFO</h1>
        <button type="button" class="btn btn-primary" onclick="loadEnSeoInfo();return false;" style="display: block;margin: 20px auto;">Generate SEO Info</button>
    </div>
</div> --}}

<div class="row">
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="permalink">{{ __('lang.permalink') }} *</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" class="form-control" id="permalink" placeholder="{{ __('lang.permalink') }}" name="permalink" value="@if(old('permalink') != null){{ old('permalink') }}@elseif(isset($setting)){{$setting->permalink}}@endif" required="required">
                </div>
                <div class="input-group">
                    @if ($errors->has('permalink'))
                        <span class="help-block">
                    <strong>{{ $errors->first('permalink') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col col-md-6">
        <div class="white-box">
            <div class="form-group">
                <label for="keywords">{{ __('lang.keywords') }} *</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" class="form-control" id="keywords" placeholder="{{ __('lang.keywords') }}" name="keywords" value="@if(old('keywords') != null){{ old('keywords') }}@elseif(isset($setting)){{$setting->keywords}}@endif" required="required">
                </div>
                <div class="input-group">
                    @if ($errors->has('keywords'))
                        <span class="help-block">
                    <strong>{{ $errors->first('keywords') }}</strong>
                </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <label for="description">{{ __('lang.description') }} *</label>
                    <textarea name="description" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.description') }}">@if(old('description') != null){{ old('description') }}@elseif(isset($setting->description)){{$setting->description}}@endif</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-md-12">
        <div class="white-box">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block waves-effect waves-light mt-25">{{ __('lang.save') }}</button>
            </div>
        </div>
    </div>
</div>
