app.controller('ContactController', function($scope, $http, API_URL){
  $http.get(API_URL + "contact").success(function(response){
    $scope.contacts = response;
  });

  // show modal form
  $scope.toggle = function(modalstate, id){
    $scope.modalstate = modalstate;
    switch (modalstate) {
      case 'add':
        $scope.form_title = "Add New Contact";
        break;
      case 'edit':
        $scope.form_title = "Contact Detail";
        $scope.id = id;
        $http.get(API_URL + 'contact/' + id).success(function(response){
          console.log(response);
          $scope.contact = response;
        });
        break;
      default:
      break;
    }
    console.log(id);
    $('#myModal').modal('show');
  }
// save and update record
  $scope.save = function(modalstate, id){
    var url = API_URL + "contact";
    if (modalstate === 'edit') {
      url += "/" + id;
    }
    $http({
      method: 'POST',
      url: url,
      data: $.param($scope.contact),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).success(function(response){
      console.log(response);
      location.reload();
    }).error(function(response){
      console.log(response);
      alert('This is embarassing. An error has occured. Please check the log for details');
    });
  }

  // delete record
  $scope.confirmDelete = function(id){
    var isConfirmDelete = confirm('Are you sure want this record?');
    if (isConfirmDelete) {
      $http({
        method: 'DELETE',
        url: API_URL + 'contact/' + id
      }).success(function(data){
        console.log(data);
        location.reload();
      }).error(function(data){
        console.log(data);
        alert('Unable to delete');
      });
    }else{
      return false;
    }
  }

});
