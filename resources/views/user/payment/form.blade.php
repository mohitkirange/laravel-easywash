

<form action=" {{ route('user.cartreview', ['id' => $service->sp_id , 'service_id' => $service->id,'cart_id' => $carts->id] )}}" method="POST">
  {{ csrf_field() }}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_YkIoLJSd3ND9fhrhkWEbhf1n"
    data-amount="{{$billamount}}"
    data-name="Easywash"
    data-description="Wash your worries away"
    data-image="{{asset('app/img/logo-circle.jpg')}}"
    data-locale="auto">
  </script>
</form>
