

$(document).on('click', 'button[class="showDesc"]', function () {
   $(this).next("div").toggle("slow");
});

$(document).on('click', '.addGrade', function () {

   //
   // var div = $(this).parents('.modal:first');
   // var authorid = div.data('authorid');
   // var grade = div.find('input[name="authorGrade"]').val();
   //
   // var url = "Authors/authorGradeAdd/" + authorid;
   //
   // $.post({
   //    url: url,
   //    data: {grade: grade},
   //    success: function (data) {
   //       alert("succes");
   //    },
   //    error: function (data) {
   //       console.log(data);
   //       div.find('.response').text(data.responseText);
   //
   //    },
   //    dataType: "JSON"


   var div = $(this).parents('.modal:first');
   var id = div.data('id');
   var grade = div.find('input[name="grade"]').val();
   var type = div.data('type');


   var baseUrl = window.location.origin + "/ksiazki/";

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

