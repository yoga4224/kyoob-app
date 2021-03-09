$(function () {
  var where = window.location.host;
  if(where == 'localhost:8888'){
      var base_url = window.location.protocol + "//" + window.location.host + "/kyoob-app/";
  }
  else{
      var base_url = window.location.protocol + "//" + window.location.host + "/";
  }

    $('#modaldownload').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $('#dwnloadbtn').attr('href', base_url + 'workspace/downloadzip/' + id)
    });    
    
});

