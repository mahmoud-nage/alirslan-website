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

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="name">{{ __('lang.ar_name') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" id="ar_name" placeholder="{{ __('lang.ar_name') }}" name="ar_name" value="@if(old('ar_name') != null){{ old('ar_name') }}@elseif(isset($category)){{$category->ar_name}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('ar_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('ar_name') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>

  <div class="col col-md-6">
    <div class="white-box">
      <div class="form-group">
          <label for="category">{{ __('lang.category') }} @isset($category) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <select name="parent" id="" style="width:100%">
                @if(!isset($category->parent))
              <option disabled selected>{{ __('lang.categories')}}</option>
              @endif
              <option value="0" @if (isset($category->parent)&&$category->parent==0) selected @endif>{{__('lang.articles')}}</option>
              <option value="1" @if (isset($category->parent)&&$category->parent==1) selected @endif>{{__('lang.video')}}</option>
              <option value="2" @if (isset($category->parent)&&$category->parent==2) selected @endif>{{__('lang.audio')}}</option>
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
  <div class="col col-md-12">
    <div class="white-box">
      <div class="form-group">
          <label style="height:16px;"></label>
          <button type="submit" class="btn btn-success btn-block waves-effect waves-light mt-25">{{ __('lang.save') }}</button>
      </div>
    </div>
  </div>
</div>
