    $(document).ready(function (){
        $('.stripe_pay_btn').click(function (e){
            e.preventDefault();
            // alert("hello");


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method:"POST",
                url:"/stripe",
                success: function (response){
                    alert("hello")


                }
            });


        });
    });

$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});

// $(function() {
//     var $form = $(".require-validation");
//     $('form.require-validation').bind('submit', function(e) {
//         var $form = $(".require-validation"),
//             inputSelector = ['input[type=email]',
//                 'input[type=password]',
//                 'input[type=text]',
//                 'input[type=file]',
//                 'textarea'].join(', '),
//             $inputs       = $form.find('.required').find(inputSelector),
//             $errorMessage = $form.find('.inp-error'),
//             valid         = true;
//         $errorMessage.addClass('d-none');
//         $('.has-error').removeClass('has-error');
//
//         $inputs.each(function(i, el) {
//             var $input = $(el);
//             if ($input.val() === '') {
//                 $input.parent().addClass('has-error');
//                 $errorMessage.removeClass('d-none');
//                 e.preventDefault();
//             }
//         });
//
//         if (!$form.data('cc-on-file')) {
//             var StripeKey = "pk_test_51KDWRyJgMXX31ceYFbxhjt2jLfSOQq4gkw9RzMZzVLjqydFiVbW97LzYJ4cdp2ngjac7JsdrCaw6YgWgrhKZy1Qc00LYt2ogMf";
//
//             e.preventDefault();
//             Stripe.setPublishableKey(StripeKey);
//             Stripe.createToken({
//                 number: $('.card-number').val(),
//                 cvc: $('.card-cvc').val(),
//                 exp_month: $('.card-expiry-month').val(),
//                 exp_year: $('.card-expiry-year').val()
//             }, stripeResponseHandler);
//         }
//
//     });
//
//     function stripeResponseHandler(status, response) {
//         if (response.error) {
//             $('.stripe-error').text(response.error.message);
//         } else {
//             var token = response['id'];
//             $form.find('input[type=text]').empty();
//             $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
//             $form.get(0).submit();
//         }
//     }
//
// });


// var fname = $('.fname').val();
// var lname = $('.lname').val();
// var email = $('.email').val();
// var phone = $('.phone').val();
// var address1 = $('.address1').val();
// var address2 = $('.address2').val();
// var city = $('.city').val();
// var state = $('.state').val();
// var country = $('.country').val();
// var pincode = $('.pincode').val();
//
// if(!fname)
// {
//     fname_error = "First name is required";
//     $('#fname_error').html('');
//     $('#fname_error').html(fname_error);
// }
// else {
//     fname_error = "";
//     $('#fname_error').html('');
// }
// if(!lname)
// {
//     lname_error = "Last name is required";
//     $('#lname_error').html('');
//     $('#lname_error').html(lname_error);
// }
// else {
//     lname_error = "";
//     $('#lname_error').html('');
// }
// if(!email)
// {
//     email_error = "Email is required";
//     $('#email_error').html('');
//     $('#email_error').html(email_error);
// }
// else {
//     email_error = "";
//     $('#email_error').html('');
// }
// if(!phone)
// {
//     phone_error = "Phone no is required";
//     $('#phone_error').html('');
//     $('#phone_error').html(phone_error);
// }
// else {
//     phone_error = "";
//     $('#phone_error').html('');
// }
// if(!address1)
// {
//     address1_error = "Address 1 is required";
//     $('#address1_error').html('');
//     $('#address1_error').html(address1_error);
// }
// else {
//     address1_error = "";
//     $('#address1_error').html('');
// }
// if(!address2)
// {
//     address2_error = "Address 2 is required";
//     $('#address2_error').html('');
//     $('#address2_error').html(address2_error);
// }
// else {
//     address2_error = "";
//     $('#address2_error').html('');
// }
// if(!city)
// {
//     city_error = "City name is required";
//     $('#city_error').html('');
//     $('#city_error').html(city_error);
// }
// else {
//     city_error = "";
//     $('#city_error').html('');
// }
// if(!state)
// {
//     state_error = "State name is required";
//     $('#state_error').html('');
//     $('#state_error').html(state_error);
// }
// else {
//     state_error = "";
//     $('#state_error').html('');
// }
// if(!country)
// {
//     country_error = "Country name is required";
//     $('#country_error').html('');
//     $('#country_error').html(country_error);
// }
// else {
//     country_error = "";
//     $('#country_error').html('');
// }
// if(!pincode)
// {
//     pincode_error = "Pin code is required";
//     $('#pincode_error').html('');
//     $('#pincode_error').html(pincode_error);
// }
// else {
//     pincode_error = "";
//     $('#pincode_error').html('');
// }
