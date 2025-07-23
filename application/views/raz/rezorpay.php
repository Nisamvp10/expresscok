<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?=RAZOR_KEY_ID?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?=$order['amount']?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "DHL Kochi",
    "description": "Test Transaction",
    "image": "https://www.expresscok.com/resource/frontend/images/logo.png",
    "order_id": "<?=$order['id']?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?=base_url('payment/paymentsuccess');?>",
    "prefill": {
        "name": "<?=$userdata->name;?>",
        "email": "<?=$userdata->email;?>",
        "contact": "<?=$address->contact_number?>"
    },
    "notes": {
        "address": "<?=$address->address.'-'.$address->postal_code.'-'.$address->city.'-'.$address->country?>"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
