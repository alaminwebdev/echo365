@extends('admin.layouts.master')

@section('title', 'Ticker')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.ticker.update') }}" method="post">
                @csrf
                <input type="hidden" name="tickers_id" value="{{ $tickers->id }}">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <i class="icon fas fa-check"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- Show all field error in one section --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-8 ">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">News Ticker</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>How many news you want to dispaly as latest news ?</label>
                                    <input type="number" class="form-control @error('ticker_count') is-invalid @enderror"
                                        name="ticker_count" value="{{ $tickers->ticker_count }}">
                                </div>
                                <div class="form-group">
                                    <label>Ticker Status</label>
                                    <select class="form-control" name="ticker_status">
                                        <option value="show" @if ($tickers->ticker_status == 'show') selected @endif>
                                            Show
                                        </option>
                                        <option value="hide" @if ($tickers->ticker_status == 'hide') selected @endif>
                                            Hide
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
