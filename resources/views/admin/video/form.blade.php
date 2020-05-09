
@inject('categories', 'App\Category')
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

@section('js')

@endsection

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="ar_title">{{ __('lang.ar_title') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="ar_title" placeholder="{{ __('lang.ar_title') }}" name="ar_title" value="@if(old('ar_title') != null){{ old('ar_title') }}@elseif(isset($video)){{$video->ar_title}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('ar_title'))
                <span class="help-block">
                    <strong>{{ $errors->first('ar_title') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>

  <div class="col col-md-6">
    <div class="white-box">
      <div class="form-group">
          <label for="source">{{ __('lang.source') }} @isset($video) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <input type="text" class="form-control" id="source" name="source" value="@if(old('ar_title') != null){{ old('source') }}@elseif(isset($video)){{$video->source}}@endif">
              <input type="hidden" name="type" value="0">
          </div>
          @isset($video)
          <iframe width="177" height="100" src="{{$video->source}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          @endisset
          <div class="input-group">
            @if ($errors->has('source'))
                <span class="help-block">
                    <strong>{{ $errors->first('source') }}</strong>
                </span>
            @endif
          </div>
      </div>
    </div>
  </div>

  <div class="col col-md-6">
    <div class="white-box">
      <div class="form-group">
          <label for="category">{{ __('lang.category') }} @isset($video) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <select name="category_id" id="" style="width:100%">
              <option value="{{isset($video->category_id)?$video->category_id:''}}" disabled selected>{{ isset($video->category_id)?$categories->where('id', $video->category_id)->pluck('ar_name')[0]: __('lang.categories')}}</option>
              @foreach ($categories->where('parent', 1)->get() as $category)
              <option value="{{$category->id}}">{{$category->ar_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-group">
            @if ($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
          </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="seo col-sm-12">
    <h1>SEO INFO</h1>
    <button type="button" class="btn btn-primary" onclick="loadMediaSeoInfo();return false;" style="display: block;margin: 20px auto;">Generate SEO Info</button>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="permalink">{{ __('lang.permalink') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" id="permalink" placeholder="{{ __('lang.permalink') }}" name="permalink" value="@if(old('permalink') != null){{ old('permalink') }}@elseif(isset($video)){{$video->permalink}}@endif" required="required">
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
                <input type="text" class="form-control" id="keywords" placeholder="{{ __('lang.keywords') }}" name="keywords" value="@if(old('keywords') != null){{ old('keywords') }}@elseif(isset($video)){{$video->keywords}}@endif" required="required">
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
                <textarea name="description" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.description') }}">@if(old('description') != null){{ old('description') }}@elseif(isset($video->description)){{$video->description}}@endif</textarea>
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
