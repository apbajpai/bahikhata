// A $( document ).ready() block.
$(document).ready(function () {

  if($('#mode').val() == 'Purchase') {
    add_items('purchase');
  }

  var substringMatcher = function (strs) {
    return function findMatches(q, cb) {
      var matches, substrRegex;

      // an array that will be populated with substring matches
      matches = [];

      // regex used to determine if a string contains the substring `q`
      substrRegex = new RegExp(q, 'i');

      // iterate through the pool of strings and for any string that
      // contains the substring `q`, add it to the `matches` array
      $.each(strs, function (i, str) {
        if (substrRegex.test(str)) {
          // the typeahead jQuery plugin expects suggestions to a
          // JavaScript object, refer to typeahead docs for more info
          matches.push({
            value: str
          });
        }
      });

      cb(matches);
    };
  };


  var party_call_url = $('#party_call_url').val();
  var name_randomizer = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('party_name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // You can also prefetch suggestions
    // prefetch: 'data/typeahead-generate.php',
    remote: party_call_url+'/%QUERY'
  });

  name_randomizer.initialize();

  $('#party_name').typeahead({
    hint: true,
    highlight: true
  }, {
    name: 'string-randomizer',
    displayKey: 'party_name',
    source: name_randomizer.ttAdapter()
  });

  var item_page_url = $('#get_item_url').val();
  var name_randomizer = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('item_names'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // You can also prefetch suggestions
    // prefetch: 'data/typeahead-generate.php',
    remote: item_page_url+'/%QUERY'
  });

  name_randomizer.initialize();

  $('#items').typeahead({
    hint: true,
    highlight: true
  }, {
    name: 'string-randomizer',
    displayKey: 'item_names',
    source: name_randomizer.ttAdapter()
  });

  var get_unit_url = $('#get_unit_url').val();
  var name_randomizer = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('units'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // You can also prefetch suggestions
    // prefetch: 'data/typeahead-generate.php',
    remote: get_unit_url+'/%QUERY'
  });

  name_randomizer.initialize();

  $('#units').typeahead({
    hint: true,
    highlight: true
  }, {
    name: 'string-randomizer',
    displayKey: 'units',
    source: name_randomizer.ttAdapter()
  });

  $("#party_name").blur(function () {
    //alert("This input field has lost its focus.");
    //});
    var page_url = $('#get_customer_details').val();
    $.ajax({
      type: "POST",
      url: page_url,
      data: {
        keyword: $("#party_name").val()
      },
      dataType: "json",
      success: function (data) { //alert(data);
        if (data.length == 0) {
          $('#party_phone').val();
        }
        $.each(data, function (key, value) {
          if (data.length >= 0)
            //$('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['party_name'] + '</a></li>');
            $('#party_phone').val('91'+value['phone']);
          $('#party_mobile').val('91'+value['mobile']);
          $('#party_add').val(value['partyadd']);
          $('#sup_pan').val(value['sup_pan']);
          $('#tin_no').val(value['sup_tin']);
          $('#party_email').val(value['email']);
        });
      }
    });
  });

  /* start check duplicate mobile no. */
  $("#user_mobile").change(function () {
    var base_url = $('#base_url').val();
    $.ajax({
      type: "POST",
      url: base_url + "/auth/checkMobile",
      data: { user_mobile: $(this).val() },
      dataType: "text",
      success: function (data) {
        console.log(data);
        var count = $('#error_count').val();
        if (data == '0') {
          $('#error_count').val(count + 1);
          $('#user_mobile').attr('style', 'border-color: red !important');
          api_type('danger', 'Mobile Number already exist.');
        } else {
          $('#error_count').val(0);
          $('#user_mobile').attr('style', '');
          $.notify('Available', 'success');
        }
      }
    });
  });
  /* end check duplicate mobile no. */

  $('#billing_type').change(function(){
     var base_url = $('#base_url').val();
     var billing_type = $(this).val();
     if(billing_type =='sgst') {
        var img_url = base_url+'/public/assets/assets/images/st.gif'
        $('#gst_label').html('GST<b><img src="'+img_url+'" alt=""></b>');
        $('#tin_no').attr('required', true);
        $('#gst_percent').html('GST (%)<b><img src="'+img_url+'" alt=""></b>');
        $('#vat').attr('required', true);
        $('#gst_amount_label').html('GST Amount<b><img src="'+img_url+'" alt=""></b>');
        $('#vat_amount').attr('required', true);
     }
  });
});
/* signup validation start  */

function validate(form) {
  var message = 'Please fill the right value in red marked checkboxs. \n';
  var msg = validateAllVal();
  message += msg;
  if ($('#error_count').val() > 0) {
    api_type('danger', message);
    return false;
  } else {
    var ckb_status = $("#terms").prop('checked');
    if (!ckb_status) {
      api_type('danger', 'You must agree to terms and conditions before submitting the form');
      return false;
    }
    form.submit()
  }
}

function validateAllVal() {
  var fname = $("#user_fname").val();
  var lname = $("#user_lname").val();
  var email = $("#user_email").val();
  var mobile = $("#user_mobile").val();
  //var username = $("#user_name").val();
  var pwd = $("#user_pass").val();
  var confirmPwd = $("#user_confirm_pass").val();
  var count = $('#error_count').val();
  $('#user_fname').attr('style', '');
  $('#user_lname').attr('style', '');
  $('#user_email').attr('style', '');
  $('#user_mobile').attr('style', '');
  //$('#user_name').attr('style', '');
  $('#user_pass').attr('style', '');
  $('#user_confirm_pass').attr('style', '');
  $('#error_count').val(0);

  $msg = '';
  if (fname == '') {
    $('#error_count').val(count + 1);
    $('#user_fname').attr('style', 'border-color: red !important');
    $msg += 'Please enter first name.\n';
  }

  if (lname == '') {
    $('#error_count').val(count + 1);
    $('#user_fname').attr('style', 'border-color: red !important');
    $msg += 'Please enter last name.\n';
  }

  var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
  if (!pattern.test(email)) {
    $('#error_count').val(count + 1);
    $('#user_email').attr('style', 'border-color: red !important');
    $msg += 'Please enter valid email address.\n';
  }

  var pattern = /^\d{10}$/;
  if (!pattern.test(mobile)) {
    $('#error_count').val(count + 1);
    $('#user_mobile').attr('style', 'border-color: red !important');
    $msg += 'It is not valid mobile number.input 10 digits number!\n';
  }

  /*if(username == ''){
    $('#error_count').val(count+1);
    $('#user_name').attr('style', 'border-color: red !important');
    $msg +='Please enter vaid user name.\n';
  }*/

  if (pwd == '') {
    $('#error_count').val(count + 1);
    $('#user_pass').attr('style', 'border-color: red !important');
    $msg += 'Please enter vaid password.\n';
  }

  var pwd_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/
  if (!pwd_pattern.test(pwd)) {
    $('#error_count').val(count + 1);
    $('#user_pass').attr('style', 'border-color: red !important');
    $msg += 'Password must contain at least one number and one uppercase and lowercase letter, and at least 8 characters. \n';
  }

  if (pwd != confirmPwd) {
    $('#error_count').val(count + 1);
    $('#user_pass').attr('style', 'border-color: red !important');
    $msg += 'Password and Confirm Password does not match!\n';
  }

  return $msg;
}

/* signup validation end */


/* notify function start */
function api_type(type, message) {
  $.notify(message, { type: type, position: "bottom" });
}
/* notify function end */

function cal_grand_total() {
  var page = $('#grand_total_page').val();
  $.ajax({
    type: "POST",
    url: page,
    data: {
      mode: "add",
      final_discount: $("#final_discount").val(),
      bill_date: $("#bill_date").val(),
      bill_no: $("#bill_no").val(),
      add_type: $("#type").val()

    },
    success: function (data) {
      response = data;
      res = response.split("###");
      $("#grand_total").val(res[1]);
      test_skill();
    }
  });
}

function cal_amount() {
  var quantity = $("#quantity").val();
  var rate = $("#rate").val();

  //alert(quantity);
  if (quantity <= 0 || rate <= 0) {
    if (quantity <= 0) {
      api_type('error', "Quantity Or Rate Cannot Be Less Than Zero.");
      $("#quantity").focus();
    }
    else {
      $("#rate").select();
    }
  }
  else {
    if (quantity != "" && rate != "") {
      var amount = quantity * rate;
      $("#amount").val(amount);
      $("#final_total").val(amount);
    } else {
      $("#amount").val(0);
    }
  }
}

function show_vat_amount() {
  var quantity = $("#quantity").val();
  var rate = $("#rate").val();
  var vat = $("#vat").val();
  var total_amount = $("#total_amount").val();
  if (quantity != "" && rate != "" && vat != "") {
    var vat_amounts = (total_amount * vat) / 100;
    $("#vat_amount").val(vat_amounts);
  } else if (vat == "" || vat == "0") {
    $("#vat").val(0);
    $("#vat_amount").val(0);
  } else {
    $("#vat_amount").val(0);
  }
}

function cal_final_amount(str) {
  var total_amount = $("#amount").val();
  var discount = $("#discount").val();
  var chk = $("#INR").val();
  if (chk == false) {
    if (discount > 100) {
      api_type('error', "Please Enter less than 100");
      $("#discount").val(0);
      $("#discount").focus();
      return false;
    }
    else
      var discount_val = ((total_amount * discount) / 100);
  } else {
    var discount_val = discount;
  }
  if (discount != "") {
    var amount_final = total_amount - discount_val;
  } else {
    var amount_final = total_amount;
  }
  $("#total_amount").val(amount_final);
  $("#final_total").val(amount_final);

}

function cal_total_amount1() {
  var total_amount = $("#total_amount").val();
  $("#final_total").val(total_amount);
}

function cal_total_amount() {
  var total_amount = $("#total_amount").val();
  var vat_amount = $("#vat_amount").val();
  var final_total = parseFloat(total_amount, 10) + parseFloat(vat_amount, 10);
  $("#final_total").val(final_total);
}

function ValidateData() {
  item_num = '<?php $row_bd_num?>';
  if (item_num == '0' || item_num < 0) {
    alert("Please add atleast one item.");
    $("#items").focus();
    return false;
  }
  party_name = $("#party_name").val();
  if (party_name == "") {
    api_type('error', "Please Enter Party name");
    $("#party_name").focus();
    return false;
  }
  address = $("#address").val();

  if (address == "") {
    api_type('error', "Please Enter Address ");
    $("#address").focus();
    return false;
  }

  billing_date = $("#billing_date").val();
  if (billing_date == "") {
    api_type('error', "Please Enter Billing Date.");
    $("#billing_date").focus();
    return false;
  }

}

function test_skill() {
  var junkVal = $('#grand_total').val();
  junkVal = Math.floor(junkVal);
  var obStr = new String(junkVal);
  numReversed = obStr.split("");
  actnumber = numReversed.reverse();

  if (Number(junkVal) >= 0) {
    //do nothing
  }
  else {
    api_type('error', 'Wrong Number cannot be converted');
    return false;
  }
  if (Number(junkVal) == 0) {
    $('#container').html(obStr + '' + '&#x20B9; Zero Only');
    return false;
  }
  if (actnumber.length > 9) {
    api_type('error', 'Oops!!!! the Number is too big to covertes');
    return false;
  }

  var iWords = ["Zero", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine"];
  var ePlace = ['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
  var tensPlace = ['dummy', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety'];

  var iWordsLength = numReversed.length;
  var totalWords = "";
  var inWords = new Array();
  var finalWord = "";
  j = 0;
  for (i = 0; i < iWordsLength; i++) {
    switch (i) {
      case 0:
        if (actnumber[i] == 0 || actnumber[i + 1] == 1) {
          inWords[j] = '';
        }
        else {
          inWords[j] = iWords[actnumber[i]];
        }
        inWords[j] = inWords[j] + ' Only';
        break;
      case 1:
        tens_complication();
        break;
      case 2:
        if (actnumber[i] == 0) {
          inWords[j] = '';
        }
        else if (actnumber[i - 1] != 0 && actnumber[i - 2] != 0) {
          inWords[j] = iWords[actnumber[i]] + ' Hundred and';
        }
        else {
          inWords[j] = iWords[actnumber[i]] + ' Hundred';
        }
        break;
      case 3:
        if (actnumber[i] == 0 || actnumber[i + 1] == 1) {
          inWords[j] = '';
        }
        else {
          inWords[j] = iWords[actnumber[i]];
        }
        if (actnumber[i + 1] != 0 || actnumber[i] > 0) {
          inWords[j] = inWords[j] + " Thousand";
        }
        break;
      case 4:
        tens_complication();
        break;
      case 5:
        if (actnumber[i] == 0 || actnumber[i + 1] == 1) {
          inWords[j] = '';
        }
        else {
          inWords[j] = iWords[actnumber[i]];
        }
        if (actnumber[i + 1] != 0 || actnumber[i] > 0) {
          inWords[j] = inWords[j] + " Lakh";
        }
        break;
      case 6:
        tens_complication();
        break;
      case 7:
        if (actnumber[i] == 0 || actnumber[i + 1] == 1) {
          inWords[j] = '';
        }
        else {
          inWords[j] = iWords[actnumber[i]];
        }
        inWords[j] = inWords[j] + " Crore";
        break;
      case 8:
        tens_complication();
        break;
      default:
        break;
    }
    j++;
  }
  function tens_complication() {
    if (actnumber[i] == 0) {
      inWords[j] = '';
    }
    else if (actnumber[i] == 1) {
      inWords[j] = ePlace[actnumber[i - 1]];
    }
    else {
      inWords[j] = tensPlace[actnumber[i]];
    }
  }
  inWords.reverse();
  for (i = 0; i < inWords.length; i++) {
    finalWord += inWords[i];
  }
  $('#container').html(finalWord);
  $('#payment_word').val(finalWord);
}

function add_items(mode) {
  if ($("#percent").is(':checked')) {
    var dis_type = "%";
  } else {
    var dis_type = "&#x20B9;";
  }
  var page_url = $('#add_item_page').val();
  $.ajax({
    type: "POST",
    url: page_url,
    data: {
      mode: mode,
      pname: $("#party_name").val(),
      item_name: $("#items").val(),
      unit: $("#units").val(),
      quantity: $("#quantity").val(),
      rate: $("#rate").val(),
      dis_type: dis_type,
      discount: $("#discount").val(),
      amount: $("#amount").val(),
      vat: $("#vat").val(),
      total_amount: $("#total_amount").val(),
      final_amount: $("#final_total").val(),
      bill_date: $("#bill_date").val(),
      bill_no: $("#bill_no").val(),
      item: $("#items").val(),
      vatt: $("#vat_amount").val(),
      add_type: $("#type").val()
    },
    success: function (data) {
      $("#item_display").html(data);
      cal_grand_total();
      $("#items").val("");
      $("#units").val("");
      $("#quantity").val("0");
      $("#amount").val("0");
      $("#vat").val("0");
      $("#vat_amount").val("0");
      $("#total_amount").val("0");
      $("#final_total").val("0");
      $("#discount").val("0");
      $("#rate").val("0");
      $("#items").focus();
    }
  });
}

function delete_item(item_id) {
  var page_url = $('#delete_item_page').val();
  $.ajax({
    type: "POST",
    url: page_url,
    data: {
      mode: "purchase",
      item_id: item_id,
      add_type: $("#type").val(),

    },
    success: function (data) {
      add_items(data);
    }
  });
}

function validate_date() {
  var page_url = $('#check_date_page').val();
  $.ajax({
    type: "POST",
    url: page_url,
    data: {
      mode: $("#mode").val(),
      bill_date: $("#bill_date").val(),
    },
    success: function (data) {
      res = data.split("###");
      if (res[1] == "no") {
        api_type('error', "Billing Date Should be greater than previous billing date.");
        $("#bill_date").focus();
        return false;
      }
    }
  });
}

function validate_item() {
  var items = $("#items").val();
  var final_total = $("#final_total").val();
  var item_count = 0;

  $msg = '';
  if (items == '') {
    item_count++;
    $('#items').attr('style', 'border-color: red !important');
    $msg += 'Please enter item name.\n';
  }

  if (final_total <= 0) {
    item_count++;
    $('#final_total').attr('style', 'border-color: red !important');
    $msg += 'Please add item Details.\n';
  }

  var billing_type = $(this).val();
  if(billing_type =='sgst') {
     var vat = $("#vat").val();
     if(vat <= 0) {
        item_count++;
        $('#vat').attr('style', 'border-color: red !important');
        $msg += 'Please add Gst Percentage.\n';
     }
  }

  if (item_count > 0) {
    //api_type('danger', $msg);
    $.notify($msg, { type: "error", position: "bottom" });
    return false;
  }
 
}