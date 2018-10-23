$( document ).ready(function() {
  // waitingreview();
});

function rating() {
  $('input.check').on('change', function () {
      alert('Rating: ' + $(this).val());
  });
  $('.rating-tooltip').rating({
      extendSymbol: function (rate) {
          $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              title: 'Rate ' + rate
          });
      }
  });
  $('.rating-tooltip-manual').rating({
      extendSymbol: function () {
          var title;
          $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              trigger: 'manual',
              title: function () {
                  return title;
              }
          });
          $(this).on('rating.rateenter', function (e, rate) {
              title = rate;
              $(this).tooltip('show');
          })
              .on('rating.rateleave', function () {
                  $(this).tooltip('hide');
              });
      }
  });
  $('.rating').each(function () {
      $('<span class="label label-default"></span>')
          .text($(this).val() || ' ')
          .insertAfter(this);
  });
  $('.rating').on('change', function () {
      $(this).next('.label').text($(this).val());
  });
}

function waitingreview() {
  $.ajax({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
    },
    method:'get',
    url:location.origin+'/review/waitingreview',
    success:function (data) {
      $('.table-review').html(data);
      rating();
      }
    });
}

$('.myreview').on('click', function(e){
e.preventDefault();
  $.ajax({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
    },
    method:'get',
    url:location.origin+'/review/showreview',
    success:function (data) {
      $('.table-review').html(data);
      rating();
      }
    });
});

$('.waitingreview').on('click', function(e){
e.preventDefault();
  waitingreview();
});


$(document).on('click','.submit_review',function () {
    $('.submit_review').submit();
});
