
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

<script src="https://cdn.ckeditor.com/4.4.3/full/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>
@endsection

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="ar_title">{{ __('lang.ar_title') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="ar_title" placeholder="{{ __('lang.ar_title') }}" name="ar_title" value="@if(old('ar_title') != null){{ old('ar_title') }}@elseif(isset($articles)){{$articles->ar_title}}@endif" required="required">
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
          <label for="image">{{ __('lang.image') }} @isset($articles) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <input type="file" class="form-control" id="image" name="image">
              <input type="hidden" name="type" value="1">
          </div>
          @isset($articles)
            <img src="{{ $articles->image }}" alt="{{ $articles->name }}" class="thumb-image">
          @endisset
          <div class="input-group">
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
          </div>
      </div>
    </div>
  </div>

  <div class="col col-md-6">
    <div class="white-box">
      <div class="form-group">
          <label for="category">{{ __('lang.category') }} @isset($articles) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <select name="category_id" id="" style="width:100%">
              <option value="{{isset($articles->category_id)?$articles->category_id:''}}" disabled selected>{{ isset($articles->category_id)?$categories->where('id', $articles->category_id)->pluck('ar_name')[0]: __('lang.categories')}}</option>
              @foreach ($categories->where('parent', 0)->get() as $category)
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
  <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <label for="ar_details">{{ __('lang.ar_details') }} *</label>
                <textarea id="editor1" name="ar_details" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.ar_details') }}">@if(old('ar_details') != null){{ old('ar_details') }}@elseif(isset($articles->ar_details)){{$articles->ar_details}}@endif</textarea>
                @if ($errors->has('ar_details'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ar_details') }}</strong>
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
    <button type="button" class="btn btn-primary" onclick="loadNewsSeoInfo();return false;" style="display: block;margin: 20px auto;">Generate SEO Info</button>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="permalink">{{ __('lang.permalink') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" id="permalink" placeholder="{{ __('lang.permalink') }}" name="permalink" value="@if(old('permalink') != null){{ old('permalink') }}@elseif(isset($articles)){{$articles->permalink}}@endif" required="required">
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
                <input type="text" class="form-control" id="keywords" placeholder="{{ __('lang.keywords') }}" name="keywords" value="@if(old('keywords') != null){{ old('keywords') }}@elseif(isset($articles)){{$articles->keywords}}@endif" required="required">
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
                <textarea name="description" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.description') }}">@if(old('description') != null){{ old('description') }}@elseif(isset($articles->description)){{$articles->description}}@endif</textarea>
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
