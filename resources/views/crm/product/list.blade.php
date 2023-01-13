@extends('crm.layout.app')
@section('content')

<style>
img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev1,
.next1 {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: #e22b2b;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next1 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev1:hover,
.next1:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
  .outer-remove{
        margin-top: -22px;
    text-align: right;
  }
  .inner-remove{
     background: #f8f9fb;
  }
</style>

<div class="card">
    <div class="card-header ">
        <div class="row">
            <div class="col-md-3">
                <h5><x-icon type="list" />All Products </h5>
            </div>
            <div class="col-md-9 product-btn-group d-flex justify-content-end">
                @if(!empty($filter))
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="far fa-times-circle"></i>&nbsp;Close</a>
                @else
                <a href="javascript:void(0);" class="btn btn-sm btn-success " id="filter-btn"><i class="fas fa-filter"></i>&nbsp;Filter</a>
                @endif
                <a href="{{url('crm/product/create')}}" class="btn btn-success btn-sm">
                    <x-icon type="add" /> Add
                </a>
            </div>
        </div>
    </div>



    <div class="card-body">
        @include('crm.product.filter')
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-responsive">
                    <table class="table products-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Trail Point</th>
                                <th>Sale Price</th>
                                <th>Rewards Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td><img src="{{$list->image ?? defaultImg()}}" style="height:50px; width:60px;"> </td>
                                <td>{{ucwords($list->name)}}</td>
                                <td>{{ucwords(str_replace('_',' ',$list->product_type))}}</td>
                                <td>{{!empty($list->SubCategory->Category->name)?$list->SubCategory->Category->name:''}}/{{ !empty($list->SubCategory->name)?$list->SubCategory->name:''}}</td>
                                <td>{{$list->trial_point}}</td>
                                <td>{{$list->sale_price}}</td>
                                <td>{{$list->rewards_point}}</td>
                                <td>
                                    <div class="action-group">
                                    
                                    <a href="javascript:void(0)" class="show text-info" _id="{{$list->_id}}" id="showImage">Image </a>
                                        <a href="javascript:void(0)" _id="{{$list->sub_category}}" product_id="{{$list->_id}}" class="view text-info"><i class="fa-solid fa-circle-plus"></i></a>
                                        <a href="{{url('crm/product/'.$list->_id)}}/edit" class="edit text-info">
                                            <x-icon type="edit" />
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{ $lists->appends($_GET)->links()}}

    </div>
</div>

@push('js')
<script>
    $('.view').click(function() {
        $('#relatedProducts').modal('show');
    })
</script>
@endpush
@push('modal')
<!-- related products start -->
<div class="modal fade" id="relatedProducts" tabindex="-1" aria-labelledby="related-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="related-product">Related products</h1>
                <button type="button" onclick="javascript:window.location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="message"></div>
                    <div class="col-md-12">
                        <table class="table table-light table-striped products-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Sort</th>

                                </tr>
                            </thead>
                            <tbody id="list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- related products End -->
@endpush

@push('modal')
<div class="modal fade" id="imageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 50% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="1image-body">
              
        
                <div class="container-flude">

                  <div id='first_img'>
                  <div class="mySlides">
                    <div class="numbertext"></div>
                    <img src="product" style="width:100%">
                  </div>
                  </div>

                  <a class="prev1" onclick="plusSlides(-1)">❮</a>
                  <a class="next1" onclick="plusSlides(1)">❯</a>

                  <hr />
                  <div class="row" id="second_img">
                    <div class="column">
                      <img class="demo cursor" src="product" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                    </div>

                  </div>

                </div>
              

              
                </div>

            </div>
            </div>
        </div>
@endpush


@push('js')

<script>
           let slideIndex = 1;
           showSlides(slideIndex);
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("demo");
          let captionText = document.getElementById("caption");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
         // captionText.innerHTML = dots[slideIndex-1].alt;
        }
        
        </script>
<script>

    //open modal

    // $(document).on('click', '#showImage', function(e) {
    //     e.preventDefault(0);
    //     $('#imageModal').modal('show');
    // });

    $('.show').click(function() {
        let id = $(this).attr('_id');
        $.ajax({
            url: '{{url("crm/image")}}/' + id,
            method: 'GET',
            dataType: "JSON",
            success: function(res) {
                $('#first_img').html(res.img1);
                $('#second_img').html(res.img2);
                showSlides(1);
                $('#imageModal').modal('show');
                $('[data-toggle="tooltip"]').tooltip();
            }
        })
    })

    // //for edit
    $(document).on('click', '.view', function(e) {
        e.preventDefault(0);

        let id = $(this).attr('_id');
        let product_id = $(this).attr('product_id');
        let url = "{{url('crm/product-view')}}/" + id;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: {
                'product_id': product_id
            },
            success: function(res) {

                if (res.status) {
                    let list = '';
                    $.each(res.record, (index, val) => {
                        list += `<tr><td>${++index}</td>
                        <td><img src="${val.image}" style="height:50px; width:60px;"></td>
                        <td>${val.name}</td>
                        <td> <input type="text" _id="${val._id}" value="${val.sort??0}" name="sort" class="updatesort form-control form-control-sm" > </td>
                        
                        </tr>`;
                    });
                    $('#list').html(list);

                }
            }
        });
    });

    $(document).on('keyup', '.updatesort', function(e) {
        e.preventDefault(0);
        let id = $(this).attr('_id');
        let sort = $(this).val();
        $.ajax({
            url: "{{url('crm/product-update')}}/" + id,
            type: 'post',
            datatype: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
                'sort': sort,
            },
            success: function(res) {
                if (res.status || !res.status) {
                    alertMsg(res.status, res.msg, 2000);
                }
            }

        });
    });
</script>
@endpush



@endsection