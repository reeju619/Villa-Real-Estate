
@extends('frontend.layouts.main')

@section('main-container')

<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
        <h3>Properties</h3>
      </div>
    </div>
  </div>
</div>

<div class="section properties">
  <div class="container">
    <ul class="properties-filter">
      <li><a class="is_active" href="#!" data-filter="*">Show All</a></li>
      <li><a href="#!" data-filter=".apartment">Apartment</a></li>
      <li><a href="#!" data-filter=".luxury-villa">Luxury Villa</a></li>
      <li><a href="#!" data-filter=".penthouse">Penthouse</a></li>
      <li><a href="#!" data-filter=".modern-condo">Modern Condo</a></li>
    </ul>
    <div class="filters">
      <!-- Price Filter -->
      <div class="filter-item">
        <label for="priceRange">Price Range:</label>
        <input type="range" id="priceRange" min="500" max="3000" value="500" class="slider">
        <span id="priceValue">$500</span>
    </div>


      <!-- Parking Lots Filter -->
      <div class="filter-item">
          <label>Parking Spots:</label>
          <div>
              @foreach([3, 6, 8, 10] as $spots)
              <input type="radio" id="parking{{ $spots }}" name="parkingSpots" value="{{ $spots }}">
              <label for="parking{{ $spots }}">{{ $spots }} spots</label>
              @endforeach
          </div>
      </div>

      <!-- BHK Filter -->
      <div class="filter-item">
          <label for="bhk">BHK:</label>
          <select id="bhk" class="form-select">
              <option value="*">All</option>
              @foreach([2, 3, 4] as $bhk)
              <option value="{{ $bhk }}">{{ $bhk }} BHK</option>
              @endforeach
          </select>
      </div>
  </div>

    <div class="row properties-box">
      @foreach ($properties as $property)
      <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items {{ strtolower(str_replace(' ', '-',   $property->category_name)) }}"
        data-price="{{ $property->price }}"
        data-bhk="{{ $property->bhk }}"
        data-parking="{{ $property->parking }}">

        <div class="item">
            <a href="{{ route('property-details', $property->id) }}"><img src="{{ asset('storage/' . $property->property_image) }}" alt=""></a>
            <span class="category">{{ $property->category_name }}</span>
            <h6>{{ $property->price }}</h6>
            <h4><a href="{{ route('property-details', $property->id) }}">{{$property->property_name}}</a></h4>
            <ul>
                <li>Address: <span><a href="{{ route('property-details', $property->id) }}">{{ $property->address }}</a></span></li>
                <li><span>{{ $property->bhk }} BHK</span></li>
                <li>Area: <span>{{ $property->area }}</span></li>
                @if (in_array($property->category_name, ["Apartment", "Penthouse", "Modern Condo"]))
                <li>Floor: <span>{{ $property->floor }}th</span></li>
                @else
                <li>Floor: <span>{{ $property->floor }}</span></li>
                @endif
                <li>Parking: <span>{{ $property->parking }}</span></li>
            </ul>
            <div class="main-button">
                <a href="{{ route('property-details', $property->id) }}">View Details</a>
            </div>
        </div>
    </div>
@endforeach
</div>
    </div>
  </div>
</div>

    @endsection

    @section('title')
    Property
    @endsection
