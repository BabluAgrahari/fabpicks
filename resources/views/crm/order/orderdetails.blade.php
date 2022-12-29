@extends('crm.layout.app')
@section('content')

<div class="page-container">
    <div class="order-info-container">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="order-wrapper">
                        <div class="order-detail-left-side">
                            <span class="order-nav"><a href="#"><i class="ri-arrow-left-line"></i> Orders</a></span>
                            <div class="order-info">
                                <h2 class="order-number">
                                    #<span>{{$show->order_number}}</span>
                                </h2>
                                <button class="btn btn-sm paid-btn">Paid</button>
                                <button class="btn btn-sm unfulfilled-btn">{{$show->status}}</button>

                                <div class="order-date-group">
                                    <i class='bx bxs-calendar'></i>
                                    <p>{{date('d-m-Y',$show->order_date)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="order-detail-right-side">
                            <button class="btn btn-sm fulfill-btn">{{$show->order_status}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="order-detail-container">
        <div class="row">
            <div class="col-md-8">
                <div class="order-product-info-details">
                    <p class="unfulfilled-bedge"> <span class="unfulfilled-icon"></span> <span class=" Unfulfilled-text">Products Details</span></p>
                    <div class="order-product-table">
                        <table class="table">
                            @foreach($show->products as $product)
                            <?php $product = (object)$product; ?>
                            <tr>
                                <td>
                                    <div class="order-product-info">
                                        <div class="order-product-img">
                                            <img src="{{$product->image ?? defaultImg()}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="order-product-details">
                                            <p class="product-name">{{$product->name}}</p>
                                            <div class="order-product-specification">
                                                <!-- <p>Color: Black</p>
                                                <p>Size: US10</p> -->
                                                <p>{{$product->sku}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="order-product-price">
                                        <span class="new-price">{{$product->price}}</span>
                                        <span class="old-price">{{($product->price)*1.5}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="order-product-quantity">
                                        <p>{{$product->qty}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="order-total-price">
                                        <p>{{($product->qty)*($product->price)}}</p>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                          
                        </table>
                    </div>
                </div>

                <div class="order-delivery-details">
                    <h5>Delivery</h5>
                    <div class="order-devlivery-group">
                        <div class="order-delivery">
                            <div class="order-delivery-icon">
                                <img src="{{$show->thumbnail ?? defaultImg()}}" alt="">
                            </div>
                            <div class="order-delivery-title">
                                <h4>FedEx</h4>
                                <span>First class package</span>
                            </div>
                        </div>

                        <div class="order-delivery-price">
                            <h5>$20.00</h5>
                        </div>
                    </div>
                </div>

                <div class="order-payment-summary">
                    <h5>
                        Payment Summary
                    </h5>
                    <div class="order-payment-summary-table">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Subtotal <span>(2 items)</span></td>
                                    <td>$314.00</td>
                                </tr>
                                <tr>
                                    <td>Delivery </td>
                                    <td>$20.00</td>
                                </tr>
                                <tr>
                                    <td>Tax </td>
                                    <td>$000.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total paid by customer</td>
                                    <td>$334.00</td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>


                <div class="order-tracking-box">
                    <h5>Tracking</h5>

                    <div class="order-tracking-timeline">
                        <div class="horizontal timeline">
                            <div class="steps">
                                <div class="step current">
                                    <span>To be prepared</span>
                                </div>
                                <div class="step">
                                    <span>Sent to logistics</span>
                                </div>
                                <div class="step ">
                                    <span>In preparation</span>
                                </div>
                                <div class="step">
                                    <span>Shipped</span>
                                </div>
                                <div class="step">
                                    <span>{{$show->status}}</span>
                                </div>
                            </div>

                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="customer-details">
                    <h5>
                        Customer
                    </h5>

                    <div class="customer-profile">
                        <div class="customer-profile-box">
                            <div class="customer-profile-group">
                                <div class="customer-profile-icon">
                                    <img src="{{$show->User->profile_img ?? defaultImg()}}" alt="">
                                </div>
                                <div class="customer-profile-name">
                                    <p>{{$show->User->name}}</p>
                                </div>
                            </div>
                            <div class="customer-profile-link">
                                <a href="#"><i class='bx bx-right-arrow-alt'></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="customer-order-number">
                        <div class="customer-order-group">
                            <div class="customer-order-icon">
                                <i class="fa-solid fa-rectangle-list"></i>
                            </div>
                            <div class="customer-order-number-box">
                                <span>5 Orders</span>
                            </div>
                        </div>
                        <div class="customer-order-link">
                            <a href="#"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>

                    <div class="customer-info-box">
                        <h6>Costomer Info</h6>

                        <div class="cutomer-info-group">
                            <i class='bx bx-envelope'></i> <a href="mailto:abc@gmail.com">{{$show->User->email}}</a>
                        </div>
                        <div class="cutomer-info-group">
                            <i class='bx bx-phone'></i> <a href="tel:+918888888888">{{$show->User->mobile_no}}</a>
                        </div>
                    </div>

                    <div class="customer-address">
                        <h6>Shipping Address</h6>
                        <address>
                            <p>{{$show->shipping_details['name']}}</p>
                            <p>{{$show->shipping_details['email']}}</p>
                            <p>{{$show->shipping_details['city']}}</p>
                            <p>{{$show->shipping_details['phone']}}</p>
                            <p>{{$show->shipping_details['state']}}</p>
                            <p>{{$show->shipping_details['pincode']}}</p>
                            <p>{{$show->shipping_details['address']}}</p>
                        </address>
                    </div>
                    <div class="customer-address">
                        <h6>Billing Address</h6>
                        <address>
                        <p>{{$show->shipping_details['name']}}</p>
                            <p>{{$show->billing_details['email']}}</p>
                            <p>{{$show->billing_details['city']}}</p>
                            <p>{{$show->billing_details['phone']}}</p>
                            <p>{{$show->billing_details['state']}}</p>
                            <p>{{$show->billing_details['pincode']}}</p>
                            <p>{{$show->billing_details['address']}}</p>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection