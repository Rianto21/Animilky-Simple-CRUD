$(document).ready(function() {

  // function editdata(rowid) {
  //   var message = 'edit';
  //   console.log('clicked!')
  //   $.ajax({
  //     url: 'ajax.php',
  //     method: 'POST',
  //     datatype: 'text',
  //     data: {
  //       key: message,
  //       film_id: rowid
  //     }, success: function(response){
  //       alert(response);
  //     }
  //   })
  // }


  load_data()
  function load_data(page){
    $.ajax({
      url: "pagination.php",
      method: "POST",
      data: {page: page},
      success: function(data){
        $("#data-container").html(data);
      }
    })
  }

  // $("#addnew").on('click', function(){
  //   $("#createdata").modal('show');
  // });

  $("#btt").on('click', function(){
    window.scrollTo(0, 0);
  })
  var pg = 1;
  $("#first").on('click', function(){
    pg = 1;
    load_data(pg);
  })
  $("#prev").on('click', function(){
    if(pg > 1){
      pg = pg - 1;
      load_data(pg);
    }
  })
  $("#next").on('click', function(){
    pg = pg + 1;
    load_data(pg);
  })
  $("#last").on('click', function(){
    var last_row = Math.ceil(parseInt($("#lastrow").text())/25);
    pg = last_row;
    load_data(pg);
  })
  
  $("#save").on('click', function(){
    var film_name = $("#film_name");
    var category = $("#category");
    var rating = $("#rating");

    if(film_name.val() == '' || category.val() == '' || rating.val() == ''){
      alert("Film Name or Category or Rating Shouldn't be empty!")
      return
    } else if (!$.isNumeric(category.val()) ||parseInt(category.val())< 1 || parseInt(category.val())>16 ){
      alert("Category must only contain number between 1-16!")
      return
    } else {
      var message = 'addnew';
      $.ajax({
        url: 'ajax.php',
        method: 'POST',
        datatype: 'text',
        data: {
          key: message,
          film_name: film_name.val(),
          category: category.val(),
          rating: rating.val()
        }, success: function(response){
          alert(response);
          load_data(pg);
          $('#createdata').modal('toggle');

        }
      })
    }
  });

  $(document).on('click', '#editbutton', function(){
    var film_id = $(this).attr("data-id");
    var film_name = $(this).attr("data-title");
    var category = $(this).attr("data-category");
    var rating = $(this).attr("data-rating");
    $("#film_id_up").val(film_id);
    $("#film_name_up").val(film_name);
    $("#category_up").val(category);
    $(`#rating_up option[value=${rating}]`).attr('selected','selected');
    });

  var film_id_del;
  $(document).on('click', '#deletebutton', function(){
    film_id_del = $(this).attr("data-id");
    $("#delete_id").html(`${film_id_del}?`);
    });


  $(document).on('click', "#delete_approve", function(){
    var message = 'delete';
    $.ajax({
      url: 'ajax.php',
      method: 'POST',
      datatype: 'text',
      data: {
        key: message,
        film_id: film_id_del
      }, success: function(response){
        alert(response);
        load_data(pg);
        $('#deletedata').modal('toggle');
      }
    });
  });

  $(document).on('click', "#delete_cancel", function(){
    alert("Be Careful Next Time!");
    $('#deletedata').modal('toggle');
  });

  $(document).on('click', '#update', function(){
    var film_id = $("#film_id_up").val();
    var film_name = $("#film_name_up").val();
    var category = $("#category_up").val();
    var rating = $("#rating_up").val();
    if(film_name == '' || category == '' || rating == ''){
      alert("Film Name or Category or Rating Shouldn't be empty!");
      return
    } else if (!$.isNumeric(category) ||parseInt(category) < 1 || parseInt(category) > 16 ){
      alert("Category must only contain number between 1-16!");
      return
    } else {
      var message = 'edit';
      $.ajax({
        url: 'ajax.php',
        method: 'POST',
        datatype: 'text',
        data: {
          key: message,
          film_id: film_id,
          film_name: film_name,
          category: category,
          rating: rating
        }, success: function(response){
          alert(response);
          load_data(pg);
          $('#updatedata').modal('toggle');
        }
      })
    }
  });

  

  // $("#editdata").on('click', function(){
  //   console.log("dd");
  // })
  
})
