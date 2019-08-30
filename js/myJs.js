

$(document).on('click', 'button[class="showDesc"]', function () {
   $(this).next("div").toggle("slow");
});

$(document).on('click', '.addGrade', function () {

   var div = $(this).parents('.modal:first');
   var id = div.data('id');
   var grade = div.find('input[name="grade"]').val();
   var type = div.data('type');


   if ((grade<1) || (grade>10))
   {
      div.find('.response').text("Ocena powinna mieścić się w przedziale 1-10");
      return;
   }

   var baseUrl = window.location.origin + "/Books-Library/";

   if (type == 'author')
   {
      var url = "Authors/authorGradeAdd/" + id;
   }
   else if (type == 'book')
   {
      var url = "Books/bookGradeAdd/" + id;
   }

   url = baseUrl + url;
   // alert(url);
   // die;


   $.post({
      url: url,
      data: {grade: grade},
      success: function (data) {
         alert("succes");
      },
      error: function (data) {
         console.log(data);
         div.find('.response').text(data.responseText);

      },
      dataType: "JSON"
   });
});


$(document).on('click', '.delete-url', function () {

   var result = confirm("Czy na pewno chcesz usunąć?");
   if (result) {
      var tr = $(this).closest('tr')
      var url_id = $(this).val();
      var type = $(this).data('id');

      if (type == 'author')
      {
         var url = 'Authors/authorDelete/'
      }
      else if (type == 'book')
      {
         var url = 'Books/deleteBook/'
      }
      else if (type == 'bookUserDelete')
      {
         var url = 'User/deleteBook/'
      }

      url = window.location.origin + "/Books-Library/" + url + url_id;

      $.post({
         url: url,
         data: {},
         success: function (data) {
            alert("succes");
         },
         error: function (data) {

            if (data.responseText == 'usunieto')
            {
               tr.fadeOut(1000, function () {
                  $(this).remove();
               });
            }
         },
         dataType: "JSON"
      });
   }
});

$(document).on('click', '.read', function () {

   var div = $(this).parents('.modal:first');
   var id = div.data('id');
   var type = $(this).data('id');

   var baseUrl = window.location.origin + "/Books-Library/";

   if (type == 'toRead')
   {
      var read = 0;
      var url = "User/books/" + id;
   }
   else if (type == 'read')
   {
      var read = 1;
      var url = "User/books/" + id;
   }

   url = baseUrl + url;
   // alert(url);

   $.post({
      url: url,
      data: {read: read},
      success: function (data) {
         alert("succes");
      },
      error: function (data) {
         console.log(data);
         div.find('.response1').text(data.responseText);

      },
      dataType: "JSON"
   });
});